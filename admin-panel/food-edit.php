<?php 
	require_once '../include/acommon.inc.php';
	
	$err = '';
	$msg = '';
	$menu_list = array();
	$categories_list = array();
	$food_info = array();
	
	if (!empty($fid)) {
		$sql = "SELECT * FROM " . FOODS . " WHERE id = " . $fid;		
		if ( !($result = $db->sql_query($sql)) ) {
		  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
		}		
		$food_info = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
		$mid = !empty($food_info['menu_id']) ? $food_info['menu_id'] : 0;
	}
	
	if (isset($submit) && $submit == 'Submit') {
		$mand = array('menu_id', 'category_id', 'title', 'price');
		MyFormCheck::check_required($mand);
		$err .= $MyFormCheck->_err;
		
		if (empty($err)) {
			if (!empty($image_file_name)) {	
				$fsql = "SELECT * FROM " . FOODS . " WHERE id=".$fid;		
				if ( !($fresult = $db->sql_query($fsql)) ) {
				  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$fsql);
				}		
				$pre_food_info = $db->sql_fetchrow($fresult);
				$db->sql_freeresult($fresult);				
				
				$file_type = array('jpeg','gif','png','jpg');
				$image_file_rename = time() . '_' .$image_file_name;
				
				MyLoad::upload_rename("image_file", $atemp_upload ,$file_type, $image_file_rename);
				$err .= $MyLoad->_err;
				if ($err == '') {
				   $file_path = $atemp_upload . $image_file_rename;
				   $banner_save_path = $afood_img_dir . "banner/" . $image_file_rename;
				   $hover_save_path = $afood_img_dir . "hover/" . $image_file_rename;
				   $save_path = $afood_img_dir . $image_file_rename;
				   if(file_exists($file_path)) {
					   MyThumbnail::make_resize_save($file_path,918,346,$banner_save_path,0);
					   MyThumbnail::make_resize_save($file_path,207,207,$hover_save_path,0);
					   MyThumbnail::make_resize_save($file_path,69,69,$save_path,0);
					   @unlink($file_path);
				   }//end if
				}
				$image_file_name = $image_file_rename;
			}
			if (empty($err)) {
				$sequence = !empty($sequence) ? (int)$sequence : 0;
				MyQuery::update_values(FOODS, $fid, 0);
				$err .= $MyQuery->_err;
			}
		}
		if (empty($err)) {
			if (!empty($image_file_name) && !empty($pre_food_info) && !empty($pre_food_info['image_file'])) {
				$pre_banner_save_path = $afood_img_dir . "banner/" . $pre_food_info['image_file'];
				$pre_hover_save_path = $afood_img_dir . "hover/" . $pre_food_info['image_file'];
				$pre_save_path = $afood_img_dir . $pre_food_info['image_file'];
				@unlink($pre_banner_save_path);
				@unlink($pre_hover_save_path);
				@unlink($pre_save_path);
			}//end if
			
			$_SESSION['logout_msg'] = $HEADER_MSG['UPDATE'];
			header('Location: ' . ADMIN_BASE_URL . 'food-index.php');	
		}
	}
	
	$sql = "SELECT * FROM " . MENUS . " ORDER BY sequence, id";		
	if ( !($result = $db->sql_query($sql)) ) {
	  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
	}		
	$menu_list = $db->sql_fetchrowset($result);
	$db->sql_freeresult($result);
	
	if (!empty($mid)) {
		$csql = "SELECT * FROM " . CATEGORIES . " WHERE menu_id=".$mid." ORDER BY sequence, id";		
		if ( !($cresult = $db->sql_query($csql)) ) {
		  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$csql);
		}		
		$categories_list = $db->sql_fetchrowset($cresult);
		$db->sql_freeresult($cresult);	
	}
	
	
	$savant->assign("err",$err);
	$savant->assign("msg",$msg);
	$savant->assign("menu_list",$menu_list);
	$savant->assign("categories_list",$categories_list);
	$savant->assign("food_info",$food_info);
	$savant->assign("image_path",$afood_img_dir . "hover/");
	$savant->assign('action',$_SERVER['PHP_SELF']);
	$savant->display(TPL_DIR . 'food-edit.' . TPL_EXT);
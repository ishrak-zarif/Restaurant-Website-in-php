<?php 
	require_once '../include/acommon.inc.php';
	
	$err = '';
	$msg = '';
	$menu_list = array();
	$categories_list = array();
	
	if (isset($submit) && $submit == 'Submit') {
		$mand = array('menu_id', 'category_id', 'title', 'price');
		MyFormCheck::check_required($mand);
		$err .= $MyFormCheck->_err;
		
		if (empty($err)) {
			if (!empty($image_file_name)) {	
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
				   }
				}
				$image_file_name = $image_file_rename;
			}
			if (empty($err)) {
				$sequence = !empty($sequence) ? (int)$sequence : 0;
				MyQuery::insert_values(FOODS,0);
				$err .= $MyQuery->_err;
			}
		}
		if (empty($err)) {
			$msg = $HEADER_MSG['ADD'];	
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
	$savant->assign('action',$_SERVER['PHP_SELF']);
	$savant->display(TPL_DIR . 'food-add.' . TPL_EXT);
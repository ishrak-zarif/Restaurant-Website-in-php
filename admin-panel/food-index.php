<?php 
	require_once '../include/acommon.inc.php';
	$err = '';
	$msg = '';
	
	if (!empty($_SESSION['logout_msg'])) {
		$msg = $_SESSION['logout_msg'];
		$_SESSION['logout_msg'] = '';
	}
	
	if (!empty($del) && $del == 'y' && !empty($fid)) {
		$fsql = "SELECT * FROM " . FOODS . " WHERE id=".$fid;		
		if ( !($fresult = $db->sql_query($fsql)) ) {
		  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$fsql);
		}		
		$food_info = $db->sql_fetchrow($fresult);
		$db->sql_freeresult($fresult);
		if (!empty($food_info) && !empty($food_info['image_file'])) {
			$banner_save_path = $afood_img_dir . "banner/" . $food_info['image_file'];
			$hover_save_path = $afood_img_dir . "hover/" . $food_info['image_file'];
			$save_path = $afood_img_dir . $food_info['image_file'];
			@unlink($banner_save_path);
			@unlink($hover_save_path);
			@unlink($save_path);
		}
		
		$sql = "DELETE FROM " . FOODS . " WHERE id = " . $fid;		
		$db->sql_query($sql);
		$msg = $HEADER_MSG['DELETE'];
	}
	
	$sql = 'SELECT F.id as fid, f.title as ftitle, F.price as fprice, C.title as ctitle, M.title as mtitle, F.sequence as fseq FROM ' . CATEGORIES . ' as C, ' . MENUS . ' as M, ' . FOODS . ' as F WHERE C.menu_id = M.id AND C.id=F.category_id ORDER BY F.id';		
	if ( !($result = $db->sql_query($sql)) ) {
	  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
	}		
	$foods_list = $db->sql_fetchrowset($result);
	$db->sql_freeresult($result);
	//print_r($foods_list);exit;
	$savant->assign("err",$err);
	$savant->assign("msg",$msg);
	$savant->assign("foods_list",$foods_list);
	$savant->assign('action',$_SERVER['PHP_SELF']);
	$savant->assign('add_action', ADMIN_BASE_URL . 'food-add.php');
	$savant->assign('edit_action', ADMIN_BASE_URL . 'food-edit.php');
	$savant->display(TPL_DIR . 'food-index.' . TPL_EXT);
<?php 
	require_once '../include/acommon.inc.php';
	$err = '';
	$msg = '';
	
	if (!empty($_SESSION['logout_msg'])) {
		$msg = $_SESSION['logout_msg'];
		$_SESSION['logout_msg'] = '';
	}
	
	if (!empty($del) && $del == 'y' && !empty($cid)) {
		$sql = "DELETE FROM " . CATEGORIES . " WHERE id = " . $cid;		
		$db->sql_query($sql);
		$msg = $HEADER_MSG['DELETE'];
	}
	
	$sql = "SELECT C.id as cid, C.title as ctitle, M.title as mtitle, C.sequence as cseq FROM " . CATEGORIES . ' as C, ' . MENUS . " as M WHERE C.menu_id = M.id ORDER BY C.id";		
	if ( !($result = $db->sql_query($sql)) ) {
	  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
	}		
	$categories_list = $db->sql_fetchrowset($result);
	$db->sql_freeresult($result);
	//print_r($categories_list);exit;
	$savant->assign("err",$err);
	$savant->assign("msg",$msg);
	$savant->assign("categories_list",$categories_list);
	$savant->assign('action',$_SERVER['PHP_SELF']);
	$savant->assign('add_action', ADMIN_BASE_URL . 'category-add.php');
	$savant->assign('edit_action', ADMIN_BASE_URL . 'category-edit.php');
	$savant->display(TPL_DIR . 'category-index.' . TPL_EXT);
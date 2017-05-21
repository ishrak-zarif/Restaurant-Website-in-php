<?php 
	require_once '../include/acommon.inc.php';
	$err = '';
	$msg = '';
	
	if (!empty($_SESSION['logout_msg'])) {
		$msg = $_SESSION['logout_msg'];
		$_SESSION['logout_msg'] = '';
	}
	
	if (!empty($del) && $del == 'y' && !empty($mid)) {
		$sql = "DELETE FROM " . MENUS . " WHERE id = " . $mid;		
		$db->sql_query($sql);
		$msg = $HEADER_MSG['DELETE'];
	}
	
	$sql = "SELECT * FROM " . MENUS . " ORDER BY id";		
	if ( !($result = $db->sql_query($sql)) ) {
	  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
	}		
	$menu_list = $db->sql_fetchrowset($result);
	$db->sql_freeresult($result);
			
	$savant->assign("err",$err);
	$savant->assign("msg",$msg);
	$savant->assign("menu_list",$menu_list);
	$savant->assign('action',$_SERVER['PHP_SELF']);
	$savant->assign('add_action', ADMIN_BASE_URL . 'menu-add.php');
	$savant->assign('edit_action', ADMIN_BASE_URL . 'menu-edit.php');
	$savant->display(TPL_DIR . 'menu-index.' . TPL_EXT);
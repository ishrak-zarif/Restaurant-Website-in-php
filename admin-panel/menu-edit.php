<?php 
	require_once '../include/acommon.inc.php';
	
	$err = '';
	$msg = '';
	$menu_info = array();
	if (!empty($mid)) {
		$sql = "SELECT * FROM " . MENUS . " WHERE id = " . $mid;		
		if ( !($result = $db->sql_query($sql)) ) {
		  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
		}		
		$menu_info = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
	}
	if (isset($submit) && $submit == 'Submit') {
		$mand = array('title');
		MyFormCheck::check_required($mand);
		$err .= $MyFormCheck->_err;
		
		if (empty($err)) {
			$sequence = !empty($sequence) ? (int)$sequence : 0;
			MyQuery::update_values(MENUS, $mid, 0);
			$err .= $MyQuery->_err;
		}
		if (empty($err)) {
			$_SESSION['logout_msg'] = $HEADER_MSG['UPDATE'];
			header('Location: ' . ADMIN_BASE_URL . 'menu-index.php');	
		}
	}
	$savant->assign("err",$err);
	$savant->assign("msg",$msg);
	$savant->assign("menu_info",$menu_info);
	$savant->assign('action',$_SERVER['PHP_SELF']);
	$savant->display(TPL_DIR . 'menu-edit.' . TPL_EXT);
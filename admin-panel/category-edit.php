<?php 
	require_once '../include/acommon.inc.php';
	
	$err = '';
	$msg = '';
	//$user_info = array();
	if (!empty($cid)) {
		$sql = "SELECT * FROM " . CATEGORIES . " WHERE id = " . $cid;		
		if ( !($result = $db->sql_query($sql)) ) {
		  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
		}		
		$category_info = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
	}
	
	if (isset($submit) && $submit == 'Submit') {
		$mand = array('menu_id', 'title');
		MyFormCheck::check_required($mand);
		$err .= $MyFormCheck->_err;
		
		if (empty($err)) {
			$sequence = !empty($sequence) ? (int)$sequence : 0;
			MyQuery::update_values(CATEGORIES, $cid, 0);
			$err .= $MyQuery->_err;
		}
		if (empty($err)) {
			$_SESSION['logout_msg'] = $HEADER_MSG['UPDATE'];
			header('Location: ' . ADMIN_BASE_URL . 'category-index.php');	
		}
	}
	
	$sql = "SELECT * FROM " . MENUS . " ORDER BY sequence, id";		
	if ( !($result = $db->sql_query($sql)) ) {
	  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
	}		
	$menu_list = $db->sql_fetchrowset($result);
	$db->sql_freeresult($result);
	
	$savant->assign("err",$err);
	$savant->assign("msg",$msg);
	$savant->assign("menu_list",$menu_list);
	$savant->assign("category_info",$category_info);
	$savant->assign('action',$_SERVER['PHP_SELF']);
	$savant->display(TPL_DIR . 'category-edit.' . TPL_EXT);
<?php 
	require_once '../include/acommon.inc.php';
	
	$err = '';
	$msg = '';
	$menu_info = array();
	if (!empty($pid)) {
		$sql = "SELECT * FROM " . PAGES . " WHERE id = " . $pid;		
		if ( !($result = $db->sql_query($sql)) ) {
		  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
		}		
		$page_info = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
	}
	if (isset($submit) && $submit == 'Submit') {
		$mand = array('content');
		MyFormCheck::check_required($mand);
		$err .= $MyFormCheck->_err;
		
		if (empty($err)) {
			$sequence = !empty($sequence) ? (int)$sequence : 0;
			MyQuery::update_values(PAGES, $pid, 0);
			$err .= $MyQuery->_err;
		}
		if (empty($err)) {
			$sql = "SELECT * FROM " . PAGES . " WHERE id = " . $pid;		
			if ( !($result = $db->sql_query($sql)) ) {
			  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
			}		
			$page_info = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
			$msg = $HEADER_MSG['UPDATE'];
		}
	}
	$savant->assign("err",$err);
	$savant->assign("msg",$msg);
	$savant->assign("page_info",$page_info);
	$savant->assign('action',$_SERVER['PHP_SELF']);
	$savant->display(TPL_DIR . 'page-edit.' . TPL_EXT);
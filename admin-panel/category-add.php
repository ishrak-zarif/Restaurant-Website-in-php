<?php 
	require_once '../include/acommon.inc.php';
	
	$err = '';
	$msg = '';
	//$user_info = array();
	
	if (isset($submit) && $submit == 'Submit') {
		$mand = array('menu_id', 'title');
		MyFormCheck::check_required($mand);
		$err .= $MyFormCheck->_err;
		
		if (empty($err)) {
			$sequence = !empty($sequence) ? (int)$sequence : 0;
			MyQuery::insert_values(CATEGORIES,0);
			$err .= $MyQuery->_err;
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
	
	$savant->assign("err",$err);
	$savant->assign("msg",$msg);
	$savant->assign("menu_list",$menu_list);
	$savant->assign('action',$_SERVER['PHP_SELF']);
	$savant->display(TPL_DIR . 'category-add.' . TPL_EXT);
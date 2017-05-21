<?php 
	require_once '../include/acommon.inc.php';
	
	$err = '';
	$msg = '';
	//$user_info = array();
	
	if (isset($submit) && $submit == 'Submit') {
		$mand = array('title');
		MyFormCheck::check_required($mand);
		$err .= $MyFormCheck->_err;
		
		if (empty($err)) {
			$sequence = !empty($sequence) ? (int)$sequence : 0;
			MyQuery::insert_values(MENUS,0);
			$err .= $MyQuery->_err;
		}
		if (empty($err)) {
			$msg = $HEADER_MSG['ADD'];	
		}
	}
	$savant->assign("err",$err);
	$savant->assign("msg",$msg);
	//$savant->assign("user_info",$user_info);
	$savant->assign('action',$_SERVER['PHP_SELF']);
	$savant->display(TPL_DIR . 'menu-add.' . TPL_EXT);
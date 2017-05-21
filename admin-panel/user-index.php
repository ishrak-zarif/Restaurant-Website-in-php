<?php 
	require_once '../include/acommon.inc.php';
	
	$sql = "SELECT * FROM " . USERS . " ORDER BY id";		
	if ( !($result = $db->sql_query($sql)) ) {
	  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
	}		
	$user_info_list = $db->sql_fetchrowset($result);
	$db->sql_freeresult($result);
			
	
	$savant->assign("user_info_list",$user_info_list);
	$savant->assign('action',$_SERVER['PHP_SELF']);
	$savant->display(TPL_DIR . 'user-index.' . TPL_EXT);
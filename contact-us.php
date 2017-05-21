<?php 
	require_once './include/common.inc.php';
	$contact_info = array();
	$page_title = '';
	$sql = "SELECT * FROM " . PAGES . " WHERE id = 2";		
	if ( !($result = $db->sql_query($sql)) ) {
	  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
	}		
	$contact_info = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);
	
	
	$savant->assign("contact_info", $contact_info);
	$savant->assign("current_page_body_title", '<h1>Contact Us</h1>');		
	$savant->assign("current_page_name", 'Contact Us');		
	$savant->display(TPL_DIR . 'contact-us.' . TPL_EXT);
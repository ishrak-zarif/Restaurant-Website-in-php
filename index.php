<?php 
	require_once './include/common.inc.php';
	//echo session_id();
	//echo '<br />';
	//print_r($_SESSION);
	$fsql = "SELECT * FROM " . FOODS . " ORDER BY RAND() LIMIT 5";		
	if ( !($fresult = $db->sql_query($fsql)) ) {
	  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$fsql);
	}		
	$foods_info = $db->sql_fetchrowset($fresult);
	$db->sql_freeresult($fresult);
	
	$sql = "SELECT * FROM " . PAGES . " WHERE id = 1";		
	if ( !($result = $db->sql_query($sql)) ) {
	  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
	}		
	$welcome_info = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);
		
	$savant->assign("food_banner_img_dir",$food_img_dir . "banner/");
	$savant->assign("foods_info",$foods_info);		
	$savant->assign("welcome_info",$welcome_info);		
	$savant->assign("current_page_name", 'Home');		
	$savant->display(TPL_DIR . 'index.' . TPL_EXT);
	
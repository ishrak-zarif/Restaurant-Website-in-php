<?php 
	error_reporting(0);
	$acommon_dir_path = dirname(__FILE__);
	session_save_path($acommon_dir_path . '/../temp/session');
	session_start();
	$current_file_info = pathinfo($_SERVER['PHP_SELF']);
	
	require_once $acommon_dir_path . '/lib/Savant3.php';
	require_once $acommon_dir_path . '/constant.inc.php';
	require_once $acommon_dir_path . '/config.inc.php';
	require_once $acommon_dir_path . '/db_connection.inc.php';
	
	$savant = new Savant3();
	
	require_once $acommon_dir_path . '/retrieve.inc.php';
	require_once $acommon_dir_path . '/class/class.phpmailer.php';
	require_once $acommon_dir_path . '/class/class.MyQuery.php';
	require_once $acommon_dir_path . '/class/class.MyFormCheck.php';
	require_once $acommon_dir_path . '/class/class.MyLoad.php';
	require_once $acommon_dir_path . '/class/class.MyMail.php';
	require_once $acommon_dir_path . '/class/class.MyXml.php';
	require_once $acommon_dir_path . '/class/class.MyThumbnail.php';
	require_once $acommon_dir_path . '/class/class.MyReadDir.php';
	//require_once $acommon_dir_path . '/class/class.rss.php';
	
	require_once $acommon_dir_path . '/functions/admin-functions.inc.php';
	
	$atemp_upload = "../temp/uploads/";
	$afood_img_dir = '../uploads/food-images/';
	
	$savant->assign("current_file_info",$current_file_info);
	check_login();
<?php 
	require_once '../include/acommon.inc.php';
	$err = '';
	$msg = '';
	
	$_SESSION['login_id'] = '';
	$_SESSION['login_name'] = '';
	$_SESSION['login_code'] = '';
	$_SESSION['logout_msg'] = $HEADER_MSG['LOGOUT_USER'];
	header('Location: ' . ADMIN_BASE_URL . 'login.php');
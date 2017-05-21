<?php 
	require_once '../include/acommon.inc.php';
	$err = '';
	$msg = '';
	
	if (!empty($_SESSION['logout_msg'])) {
		$msg = $_SESSION['logout_msg'];
		$_SESSION['logout_msg'] = '';
	}
	
	if (isset($submit) && $submit == 'Sign In') {
		if (empty($username) || empty($password))
			$err .= $HEADER_MSG['ERR_INVALID_USER'];
		
		if (empty($err)) {
			$sql = "SELECT * FROM " . USERS . " WHERE username = '" . $username . "' AND password='" . md5($password) . "'";
			if ( !($result = $db->sql_query($sql)) ) {
			  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
			}		
			$user_info = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
			
			if (!empty($user_info) && is_array($user_info) && count($user_info)) {
				$_SESSION['login_name'] = $user_info['first_name'] . (!empty($user_info['last_name']) ? ' ' . $user_info['last_name'] : '');
				$_SESSION['login_id'] = $user_info['id'];
				$_SESSION['login_code'] = 'mYrEsTaUrAnTaDMiN';
				$cookire_exp_time = time()+60*60*24*30;
				if ($remember == 'on') {					
					setcookie('resLoginUsername', $username, (int)$cookire_exp_time);
					setcookie('resLoginPassword', $password, (int)$cookire_exp_time);
					setcookie('resLoginRemember', $remember, (int)$cookire_exp_time);
				} else {
					setcookie('resLoginUsername', '', (int)$cookire_exp_time);
					setcookie('resLoginPassword', '', (int)$cookire_exp_time);
					setcookie('resLoginRemember', '', (int)$cookire_exp_time);
				} 
				header('Location: ' . ADMIN_BASE_URL . 'index.php');
			} else {
				$err .= $HEADER_MSG['ERR_INVALID_USER'];	
			}
		}//end if empty $err
	}//end if $submit
	//print_r($_COOKIE);
	$resLoginUsername = isset($_COOKIE['resLoginUsername']) ? $_COOKIE['resLoginUsername'] : '';
	$resLoginPassword = isset($_COOKIE['resLoginPassword']) ? $_COOKIE['resLoginPassword'] : '';
	$resLoginRemember = isset($_COOKIE['resLoginRemember']) ? $_COOKIE['resLoginRemember'] : '';
	$savant->assign("err",$err);
	$savant->assign("msg",$msg);
	$savant->assign("resLoginUsername",$resLoginUsername);
	$savant->assign("resLoginPassword",$resLoginPassword);
	$savant->assign("resLoginRemember",$resLoginRemember);
	$savant->assign('action', $_SERVER['PHP_SELF']);
	$savant->display(TPL_DIR . 'login.' . TPL_EXT);
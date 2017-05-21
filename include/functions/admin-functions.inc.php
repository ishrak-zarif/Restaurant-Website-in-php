<?php
function check_customer_login() {
	global $db, $current_file_info ;
	
	$session_sec_code = (isset($_SESSION['cust_login_code']) ? $_SESSION['cust_login_code'] : '');
	$session_user_id = (isset($_SESSION['cust_login_id']) ? $_SESSION['cust_login_id'] : 0);
	$is_login_failed = true;
	
	if (!empty($session_user_id) && !empty($session_sec_code) && $session_sec_code == 'mYrEsTaUrAnTcUsToMeR') {
		$sql = "SELECT * FROM " . USERS . " WHERE id = " . $session_user_id ;
		if ( !($result = $db->sql_query($sql)) ) {
		  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
		}		
		$user_info = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
		
		if (!empty($user_info) && is_array($user_info) && count($user_info)) {
			$is_login_failed = false;
			//$login_validation_msg = '<p>Welcome ' . $_SESSION['cust_login_name']. ' <a href="'.$_SERVER['PHP_SELF'].'?custlogout=y">Logout</a>';
			// if login.php page then redirect to index.php
			/*if ($current_file_info['basename'] == 'reservation.php') {
				header('Location: ' . ADMIN_BASE_URL . 'index.php');
			}//end if not login.php
			*/
		}//end if $user_info
	} 
	
	if ($is_login_failed) {
		$_SESSION['cust_login_id'] = '';
		$_SESSION['cust_login_name'] = '';
		$_SESSION['cust_login_code'] = '';
		// if not login.php page then redirect to login.php
		if ($current_file_info['basename'] == 'reservation.php') {
			header('Location: ' . BASE_URL . 'index.php');
		}//end if not login.php
		
	}//end if $is_login_failed
}
function generatePossibleUsernames($check_customer_username = '') {
	
	$check_possible_username = array();
	$i=0;
	if (!empty($check_customer_username)) {		
		$check_customer_username_exploded = explode(' ', $check_customer_username);
		if (count($check_customer_username_exploded) == 1) {
			$check_possible_username[$i++]	= $check_customer_username_exploded[0];
		}
		if (count($check_customer_username_exploded) > 1) {
			$check_possible_username[$i++] = str_replace(' ', '', $check_customer_username);
			$check_possible_username[$i++] = str_replace(' ', '.', $check_customer_username);
			$check_possible_username[$i++] = str_replace(' ', '_', $check_customer_username);
		}
		if (count($check_customer_username_exploded) == 2) {
			$check_possible_username[$i++] = $check_customer_username_exploded[1] . $check_customer_username_exploded[0];
			$check_possible_username[$i++] = $check_customer_username_exploded[1] .'.'. $check_customer_username_exploded[0];
			$check_possible_username[$i++] = $check_customer_username_exploded[1] .'_'. $check_customer_username_exploded[0];
		}
		if (count($check_customer_username_exploded) == 3) {
			$check_possible_username[$i++] = $check_customer_username_exploded[0] . $check_customer_username_exploded[2] . $check_customer_username_exploded[1];			
			$check_possible_username[$i++] = $check_customer_username_exploded[1] . $check_customer_username_exploded[0] . $check_customer_username_exploded[2];
			$check_possible_username[$i++] = $check_customer_username_exploded[1] . $check_customer_username_exploded[2] . $check_customer_username_exploded[0];
			$check_possible_username[$i++] = $check_customer_username_exploded[2] . $check_customer_username_exploded[0] . $check_customer_username_exploded[1];
			$check_possible_username[$i++] = $check_customer_username_exploded[2] . $check_customer_username_exploded[1] . $check_customer_username_exploded[0];
			
			$check_possible_username[$i++] = $check_customer_username_exploded[0] .'.'. $check_customer_username_exploded[2] .'.'. $check_customer_username_exploded[1];			
			$check_possible_username[$i++] = $check_customer_username_exploded[1] .'.'. $check_customer_username_exploded[0] .'.'. $check_customer_username_exploded[2];
			$check_possible_username[$i++] = $check_customer_username_exploded[1] .'.'. $check_customer_username_exploded[2] .'.'. $check_customer_username_exploded[0];
			$check_possible_username[$i++] = $check_customer_username_exploded[2] .'.'. $check_customer_username_exploded[0] .'.'. $check_customer_username_exploded[1];
			$check_possible_username[$i++] = $check_customer_username_exploded[2] .'.'. $check_customer_username_exploded[1] .'.'. $check_customer_username_exploded[0];
			
			$check_possible_username[$i++] = $check_customer_username_exploded[0] .'_'. $check_customer_username_exploded[2] .'_'. $check_customer_username_exploded[1];			
			$check_possible_username[$i++] = $check_customer_username_exploded[1] .'_'. $check_customer_username_exploded[0] .'_'. $check_customer_username_exploded[2];
			$check_possible_username[$i++] = $check_customer_username_exploded[1] .'_'. $check_customer_username_exploded[2] .'_'. $check_customer_username_exploded[0];
			$check_possible_username[$i++] = $check_customer_username_exploded[2] .'_'. $check_customer_username_exploded[0] .'_'. $check_customer_username_exploded[1];
			$check_possible_username[$i++] = $check_customer_username_exploded[2] .'_'. $check_customer_username_exploded[1] .'_'. $check_customer_username_exploded[0];			
		}
		
		/***** generate with numbers *****/
		$tmp_array = $check_possible_username;
		for($j=0; $j<count($tmp_array); $j++) {
			for($ex=0; $ex<=5; $ex++) {
				$check_possible_username[$i++] = $tmp_array[$j] . $ex;
			}
		}
		/***** concat with year *****/
		$tmp_array = $check_possible_username;
		$year = date('Y');
		for($j=0; $j<count($tmp_array); $j++) {			
			$check_possible_username[$i++] = $tmp_array[$j] . $year;
		}
	}
	
	return $check_possible_username;
}
function check_login() {
	global $db, $current_file_info ;
	
	$session_sec_code = (isset($_SESSION['login_code']) ? $_SESSION['login_code'] : '');
	$session_user_id = (isset($_SESSION['login_id']) ? $_SESSION['login_id'] : 0);
	$is_login_failed = true;
	
	if (!empty($session_user_id) && !empty($session_sec_code) && $session_sec_code == 'mYrEsTaUrAnTaDMiN') {
		$sql = "SELECT * FROM " . USERS . " WHERE id = " . $session_user_id ;
		if ( !($result = $db->sql_query($sql)) ) {
		  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
		}		
		$user_info = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
		
		if (!empty($user_info) && is_array($user_info) && count($user_info)) {
			$is_login_failed = false;
			// if login.php page then redirect to index.php
			if ($current_file_info['basename'] == 'login.php') {
				header('Location: ' . ADMIN_BASE_URL . 'index.php');
			}//end if not login.php
		}//end if $user_info
	} 
	
	if ($is_login_failed) {
		$_SESSION['login_id'] = '';
		$_SESSION['login_name'] = '';
		$_SESSION['login_code'] = '';
		// if not login.php page then redirect to login.php
		if ($current_file_info['basename'] != 'login.php') {
			header('Location: ' . ADMIN_BASE_URL . 'login.php');
		}//end if not login.php
	}//end if $is_login_failed
}
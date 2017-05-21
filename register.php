<?php 
	require_once './include/common.inc.php';
	//$reg_info = array();
	/*$sql = "SELECT * FROM " . PAGES . " WHERE id = 3";		
	if ( !($result = $db->sql_query($sql)) ) {
	  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
	}		
	$reg_info = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);*/
	
	
	//$savant->assign("reg_info", $reg_info);
	if (!empty($cust_logout) && $cust_logout == 'y') {
		//print_r($_SERVER);
		$_SESSION['cust_login_id'] = '';
		$_SESSION['cust_login_name'] = '';
		$_SESSION['cust_login_code'] = '';
    setcookie('custLogOutStatus', 'true', (int)$cookire_exp_time);
		$ajax_response = array('redirect' =>'');
		$referer_file_info = pathinfo($_SERVER['HTTP_REFERER']);
		if ($referer_file_info['basename'] == 'reservation.php') {
			$ajax_response['redirect'] = BASE_URL . 'index.php';		
		}
		echo json_encode($ajax_response);
		exit;
	}
	
	if (!empty($check_cust_login_status) && $check_cust_login_status == 'y') {
		//print_r($_SESSION);
		//exit;
    $ajax_response = array('status' =>'err');
    $is_login_failed = true;
    
    $custLogOutStatus = isset($_COOKIE['custLogOutStatus']) ? $_COOKIE['custLogOutStatus'] : 'false';
    if ($custLoginRemember == 'on') {
      if ($custLogOutStatus == 'false') {
        if (!empty($custLoginUsername) && !empty($custLoginPassword)) {
    			$chk_sql = "SELECT * FROM " . CUSTOMERS . " WHERE customer_username = '" . $custLoginUsername . "' AND customer_password = '".md5($custLoginPassword)."'";	
    			if ( !($chk_result = $db->sql_query($chk_sql)) ) {
    				message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$chk_sql);
    			}		
    			$check_user_info = $db->sql_fetchrow($chk_result);
    			$db->sql_freeresult($chk_result);
          
          
          if (!empty($check_user_info) && is_array($check_user_info) && count($check_user_info)) {
            $is_login_failed = false;
    				$ajax_response = array('status' =>'ok');	
    				$ajax_response['msg'] ='Welcome <b>' . $check_user_info['customer_name']. '</b>.<br /><a href="javascript:void(0);" onclick="javascript:if (!cust_logout()) return false;">Logout</a>';
    				$ajax_response['menu_item'] ='<a href="'. BASE_URL.'reservation.php">Reservation</a>';
    				$ajax_response['name'] =$check_user_info['customer_name'];	
    				//echo session_id();exit;
    				
    				$_SESSION['cust_login_name'] = $check_user_info['customer_name'];
    				$_SESSION['cust_login_id'] = $check_user_info['id'];
    				$_SESSION['cust_login_code'] = 'mYrEsTaUrAnTcUsToMeR';
    				//print_r($_SESSION);
    				//exit;
    
    				
    				setcookie('custLogOutStatus', 'false', (int)$cookire_exp_time);
    				
            /*if (isset($remember) && $remember == 'on') {					
    					setcookie('custLoginUsername', $username, (int)$cookire_exp_time);
    					setcookie('custLoginPassword', $password, (int)$cookire_exp_time);
    					setcookie('custLoginRemember', $remember, (int)$cookire_exp_time);
    				} else {
    					setcookie('custLoginUsername', '', (int)$cookire_exp_time);
    					setcookie('custLoginPassword', '', (int)$cookire_exp_time);
    					setcookie('custLoginRemember', '', (int)$cookire_exp_time);
    				}*/ 
    			}
      
      
        }
      }
    }
    
		else {
  		$session_sec_code = (isset($_SESSION['cust_login_code']) ? $_SESSION['cust_login_code'] : '');
  		$session_user_id = (isset($_SESSION['cust_login_id']) ? $_SESSION['cust_login_id'] : 0);
  		
  		//exit;
  		if (!empty($session_user_id) && !empty($session_sec_code) && $session_sec_code == 'mYrEsTaUrAnTcUsToMeR') {
  			$sql = "SELECT * FROM " . CUSTOMERS . " WHERE id = " . $session_user_id ;
  			if ( !($result = $db->sql_query($sql)) ) {
  				message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
  			}		
  			$user_info = $db->sql_fetchrow($result);
  			$db->sql_freeresult($result);
  			if (!empty($user_info) && is_array($user_info) && count($user_info)) {
  				$is_login_failed = false;
  				$ajax_response['status'] = 'ok';		
  				$ajax_response['msg'] ='Welcome <b>' . $user_info['customer_name']. '</b>.<br /><a href="javascript:void(0);" onclick="javascript:if (!cust_logout()) return false;">Logout</a>';
  				$ajax_response['menu_item'] ='<a href="'. BASE_URL.'reservation.php">Reservation</a>';
  			}//end if $user_info
  		} 
    }
		
		if ($is_login_failed) {
			$_SESSION['cust_login_id'] = '';
			$_SESSION['cust_login_name'] = '';
			$_SESSION['cust_login_code'] = '';
			$ajax_response['msg'] = 'Login error';
			$referer_file_info = pathinfo($_SERVER['HTTP_REFERER']);	
			if ($referer_file_info['basename'] == 'reservation.php') {
				$ajax_response['redirect'] = BASE_URL . 'index.php';		
			}		
		}//end if $is_login_failed
		echo json_encode($ajax_response);
		exit;
	}
	
	if (!empty($login_cust) && $login_cust == 'y') {
		$ajax_response = array('status' =>'err');	
		$ajax_response['msg'] ='Login Failed';	
		if (!empty($username) && !empty($password)) {
			$chk_sql = "SELECT * FROM " . CUSTOMERS . " WHERE customer_username = '" . $username . "' AND customer_password = '".md5($password)."'";	
			if ( !($chk_result = $db->sql_query($chk_sql)) ) {
				message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$chk_sql);
			}		
			$check_user_info = $db->sql_fetchrow($chk_result);
			$db->sql_freeresult($chk_result);
			//print_r($check_user_info);
			//exit;
			//remember
			if (!empty($check_user_info) && is_array($check_user_info) && count($check_user_info)) {
				$ajax_response = array('status' =>'ok');	
				$ajax_response['msg'] ='Welcome <b>' . $check_user_info['customer_name']. '</b>.<br /><a href="javascript:void(0);" onclick="javascript:if (!cust_logout()) return false;">Logout</a>';
				$ajax_response['menu_item'] ='<a href="'. BASE_URL.'reservation.php">Reservation</a>';
				$ajax_response['name'] =$check_user_info['customer_name'];	
				//echo session_id();exit;
				
				$_SESSION['cust_login_name'] = $check_user_info['customer_name'];
				$_SESSION['cust_login_id'] = $check_user_info['id'];
				$_SESSION['cust_login_code'] = 'mYrEsTaUrAnTcUsToMeR';
				//print_r($_SESSION);
				//exit;

				
				setcookie('custLogOutStatus', 'false', (int)$cookire_exp_time);
				
        if (isset($remember) && $remember == 'on') {					
					setcookie('custLoginUsername', $username, (int)$cookire_exp_time);
					setcookie('custLoginPassword', $password, (int)$cookire_exp_time);
					setcookie('custLoginRemember', $remember, (int)$cookire_exp_time);
				} else {
					setcookie('custLoginUsername', '', (int)$cookire_exp_time);
					setcookie('custLoginPassword', '', (int)$cookire_exp_time);
					setcookie('custLoginRemember', '', (int)$cookire_exp_time);
				} 
			}
		}
		echo json_encode($ajax_response);
		exit;
	}
	
	if (!empty($check_customer_email)) {
		$ajax_response_is_exists = 'notexist';
		$chk_sql = "SELECT * FROM " . CUSTOMERS . " WHERE customer_eamil = '" . $check_customer_email . "'";	
		if ( !($chk_result = $db->sql_query($chk_sql)) ) {
		  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$chk_sql);
		}		
		$check_email_info = $db->sql_fetchrow($chk_result);
		$db->sql_freeresult($chk_result);
		if (!empty($check_email_info) && is_array($check_email_info) && count($check_email_info)) {
			$ajax_response_is_exists = 'exist';
		}//end if $check_email_info
		echo $ajax_response_is_exists;
		exit;
	}//end if $check_customer_email
	
	if (!empty($check_customer_username)) {		
		$ajax_response = array('ok');
		$chk_sql = "SELECT * FROM " . CUSTOMERS . " WHERE customer_username = '" . $check_customer_username . "'";	
		if ( !($chk_result = $db->sql_query($chk_sql)) ) {
		  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$chk_sql);
		}		
		$check_user_info = $db->sql_fetchrow($chk_result);
		$db->sql_freeresult($chk_result);
		if (!empty($check_user_info) && is_array($check_user_info) && count($check_user_info)) {
			$generate_possible_user_names = generatePossibleUsernames($check_customer_username);
			$possible_usernames = array();
			$psql = "SELECT * FROM " . CUSTOMERS . " WHERE customer_username IN ('" . implode("', '" , $generate_possible_user_names) . "')";
			if ( !($presult = $db->sql_query($psql)) ) {
		  		message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$psql);
			}		
			$check_user_info = $db->sql_fetchrowset($presult);
			$db->sql_freeresult($presult);
			if (!empty($check_user_info) && is_array($check_user_info) && count($check_user_info)) {
				foreach($check_user_info as $ckinfo) {
					$key = array_search($ckinfo['customer_username'], $generate_possible_user_names);
					if (isset($key) && $key === 0) {
						array_splice($generate_possible_user_names, $key, 1);
					}
				}//end foreach
			}//some username exist
			shuffle($generate_possible_user_names);
			$g=0;
			foreach($generate_possible_user_names as $gval){
				$possible_usernames[$g++] = $gval;
				if ($g > 4 ) break;
			}
			$ajax_response = $possible_usernames;
		}//end if $check_email_info
		
		echo json_encode($ajax_response);
		exit;
	}//end if $check_customer_email
	
	if (!empty($save_cust_info) && $save_cust_info == 'y') {
		$msg = '';
		MyQuery::insert_values(CUSTOMERS,0);
		$msg = $MyQuery->_err;
		
		$msg = empty($msg) ? $HEADER_MSG['ADD'] : $msg;
		echo $msg;
		exit;
	}
	
	$savant->assign("current_page_body_title", '<h1>Registration</h1>');		
	$savant->assign("current_page_name", 'Customer Registration');		
	$savant->display(TPL_DIR . 'register.' . TPL_EXT);
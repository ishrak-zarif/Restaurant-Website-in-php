<?php 
	require_once '../include/acommon.inc.php';
	
	$err = '';
	$msg = '';
	$user_id = isset($_SESSION['login_id']) ? $_SESSION['login_id'] : 0;
	$user_info = array();
	if (!empty($user_id)) {
		$sql = "SELECT * FROM " . USERS . " WHERE id = " . $user_id;		
		if ( !($result = $db->sql_query($sql)) ) {
		  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
		}		
		$user_info = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
	}	
	
	if (isset($submit) && $submit == 'Submit') {
		$mand = array('first_name', 'username', 'email');
		MyFormCheck::check_required($mand);
		$err .= $MyFormCheck->_err;
		
		if (!empty($old_password) || !empty($new_password) || !empty($confirm_password)) {
			if (empty($old_password)) {
				$err .= 'Please complete Old Password field.<br/>';
			}
			if (empty($new_password)) {
				$err .= 'Please complete New Password field.<br/>';
			}
			if (empty($confirm_password)) {
				$err .= 'Please complete Confirm Password field.<br/>';
			}		
			if (empty($err) && md5($old_password) == $user_info['password']) {				
				if ($new_password != $confirm_password) {
				   $err .= $HEADER_MSG['ERR_PASSWORD'];
				} else {
					$password = $new_password;
				}
			}
		}
		
		if (empty($err)) {
			$sql = "SELECT * FROM " . USERS . " WHERE username = '" . $username . "' AND id <> " . $user_id;		
			if ( !($result = $db->sql_query($sql)) ) {
			  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
			}		
			$chk_user_info = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
			
			if (!empty($chk_user_info) && is_array($chk_user_info) && count($chk_user_info)) {
				$err .= 'This Username Already Exist.Please Change It.<BR \>';
			} //end if user_info exist
			
			$esql = "SELECT * FROM " . USERS . " WHERE email = '" . $email . "' AND id <> " . $user_id;		
			if ( !($eresult = $db->sql_query($esql)) ) {
			  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
			}		
			$chk_euser_info = $db->sql_fetchrow($eresult);
			$db->sql_freeresult($eresult);
			
			if (!empty($chk_euser_info) && is_array($chk_euser_info) && count($chk_euser_info)) {
				$err .= 'This Email Already Exist.Please Change It.<BR \>';
			} //end if user_info exist
		}
			
		if (empty($err)) {
			MyFormCheck::check_email($email);
			$err .= $MyFormCheck->_err;
		}
		if (empty($err)) {
			MyQuery::update_values(USERS, $user_id, 0);
			$err .= $MyQuery->_err;
		}
		if (empty($err)) {
			$msg = $HEADER_MSG['UPDATE'];	
		}
	}
	$savant->assign("err",$err);
	$savant->assign("msg",$msg);
	$savant->assign("user_info",$user_info);
	$savant->assign('action',$_SERVER['PHP_SELF']);
	$savant->display(TPL_DIR . 'user-edit.' . TPL_EXT);
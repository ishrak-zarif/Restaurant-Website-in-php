<?php 
	require_once '../include/acommon.inc.php';
	
	$err = '';
	$msg = '';
	//$user_info = array();
	
	if (isset($submit) && $submit == 'Submit') {
		$mand = array('first_name', 'username', 'new_password', 'email');
		MyFormCheck::check_required($mand);
		$err .= $MyFormCheck->_err;
		if (empty($err)) {
			$sql = "SELECT * FROM " . USERS . " WHERE username = '" . $username . "'";		
			if ( !($result = $db->sql_query($sql)) ) {
			  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
			}		
			$user_info = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
			
			if (!empty($user_info) && is_array($user_info) && count($user_info)) {
				$err .= 'This Username Already Exist.Please Change It.<BR \>';
			} //end if user_info exist
			
			$esql = "SELECT * FROM " . USERS . " WHERE email = '" . $email . "'";		
			if ( !($eresult = $db->sql_query($esql)) ) {
			  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
			}		
			$euser_info = $db->sql_fetchrow($eresult);
			$db->sql_freeresult($eresult);
			
			if (!empty($euser_info) && is_array($euser_info) && count($euser_info)) {
				$err .= 'This Email Already Exist.Please Change It.<BR \>';
			} //end if user_info exist
		}
			
		if (empty($err)) {	
			if ($new_password != $confirm_password) {
			   $err .= $HEADER_MSG['ERR_PASSWORD'];
			} else {
				$password = $new_password;
			}
		}	
		if (empty($err)) {
			MyFormCheck::check_email($email);
			$err .= $MyFormCheck->_err;
		}
		if (empty($err)) {
			MyQuery::insert_values(USERS,0);
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
	$savant->display(TPL_DIR . 'user-add.' . TPL_EXT);
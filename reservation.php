<?php 
	require_once './include/common.inc.php';
	$msg = '';
	$err = '';
	//$reserve_info = array();
	/*$sql = "SELECT * FROM " . PAGES . " WHERE id = 4";		
	if ( !($result = $db->sql_query($sql)) ) {
	  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
	}		
	$reserve_info = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);*/
	
	
	//$savant->assign("reserve_info", $reserve_info);
	
	$session_sec_code = (isset($_SESSION['cust_login_code']) ? $_SESSION['cust_login_code'] : '');
	$customer_id = (isset($_SESSION['cust_login_id']) ? $_SESSION['cust_login_id'] : 0);
	
	if (!empty($customer_id) && !empty($session_sec_code) && $session_sec_code == 'mYrEsTaUrAnTcUsToMeR') {
		if (isset($submit) && $submit == 'Submit') {
			$reservation_date_tmp = str_replace(' ', '-', str_replace(',', '',$reservation_date));
			$reservation_date_timestemp = strtotime($reservation_date_tmp);
			
			MyQuery::insert_values(RESERVATIONS,0);
			$err .= $MyQuery->_err;
			
			if (empty($err)) {
				$msg = "Thank you for your reservation. We will contact you soon.";	
			}
		}
	}	else {		
		header('Location: ' . BASE_URL . 'index.php');	
	}
	$savant->assign("err",$err);
	$savant->assign("msg",$msg);
	$savant->assign('action',$_SERVER['PHP_SELF']);
	//$savant->assign("welcome_info",$welcome_info);		
	$savant->assign("current_page_name", 'Reservation');	
	$savant->assign("current_page_body_title", '<h1>Reservation</h1>');	
	$savant->display(TPL_DIR . 'reservation.' . TPL_EXT);
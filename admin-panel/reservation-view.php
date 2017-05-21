<?php 
	require_once '../include/acommon.inc.php';
	
	
	$reservation_info = array();
	if (!empty($rid)) {
		//$sql = "SELECT * FROM " . RESERVATIONS . " WHERE id = " . $rid;		
		$sql = "SELECT R.id as rid, R.reservation_name as reservation_name, R.reservation_date as reservation_date, R.reservation_date_timestemp as reservation_date_timestemp, r.no_of_tables as no_of_tables, R.message as message, C.id as customer_id, C.customer_name as customer_name, C.customer_phone, C.customer_eamil as customer_eamil FROM " . RESERVATIONS . ' as R, ' . CUSTOMERS . " as C WHERE R.id=".$rid." AND R.customer_id = C.id ORDER BY R.reservation_date_timestemp DESC, R.id DESC";
		if ( !($result = $db->sql_query($sql)) ) {
		  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
		}		
		$reservation_info = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
	}
	//print_r($reservation_info);exit;
	$savant->assign("reservation_info",$reservation_info);
	$savant->display(TPL_DIR . 'reservation-view.' . TPL_EXT);
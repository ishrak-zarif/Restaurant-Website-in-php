<?php 
	require_once '../include/acommon.inc.php';
	$err = '';
	$msg = '';
	
		
	if (!empty($del) && $del == 'y' && !empty($rid)) {
		$sql = "DELETE FROM " . RESERVATIONS . " WHERE id = " . $rid;		
		$db->sql_query($sql);
		$msg = $HEADER_MSG['DELETE'];
	}
	
	$sql = "SELECT R.id as rid, R.reservation_name as reservation_name, R.reservation_date as reservation_date, R.reservation_date_timestemp as reservation_date_timestemp, r.no_of_tables as no_of_tables, R.message as message, C.id as customer_id, C.customer_name as customer_name, C.customer_phone, C.customer_eamil as customer_eamil FROM " . RESERVATIONS . ' as R, ' . CUSTOMERS . " as C WHERE R.customer_id = C.id ORDER BY R.reservation_date_timestemp DESC, R.id DESC";		
	if ( !($result = $db->sql_query($sql)) ) {
	  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$sql);
	}		
	$reservations_list = $db->sql_fetchrowset($result);
	$db->sql_freeresult($result);
	//print_r($reservations_list);exit;
	$savant->assign("err",$err);
	$savant->assign("msg",$msg);
	$savant->assign("reservations_list",$reservations_list);
	$savant->assign('action',$_SERVER['PHP_SELF']);
	$savant->assign('view_action', ADMIN_BASE_URL . 'reservation-view.php');
	//$savant->assign('add_action', ADMIN_BASE_URL . 'category-add.php');
	//$savant->assign('edit_action', ADMIN_BASE_URL . 'category-edit.php');
	$savant->display(TPL_DIR . 'reservation-index.' . TPL_EXT);
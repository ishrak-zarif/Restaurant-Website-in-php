<?php 
	error_reporting(0);

  $cookire_exp_time = time()+60*60*24*30;
	$custLoginUsername = isset($_COOKIE['custLoginUsername']) ? $_COOKIE['custLoginUsername'] : '';
	$custLoginPassword = isset($_COOKIE['custLoginPassword']) ? $_COOKIE['custLoginPassword'] : '';
	$custLoginRemember = isset($_COOKIE['custLoginRemember']) ? $_COOKIE['custLoginRemember'] : '';
  
	$common_dir_path = dirname(__FILE__);
	
  session_save_path($common_dir_path . '/../temp/session');
	session_start();
  
	//echo session_id();
  //print_r($_SESSION);
  //exit;  
	$current_file_info = pathinfo($_SERVER['PHP_SELF']);
	
	require_once $common_dir_path . '/lib/Savant3.php';
	require_once $common_dir_path . '/constant.inc.php';
	require_once $common_dir_path . '/config.inc.php';
	require_once $common_dir_path . '/db_connection.inc.php';
	
	$savant = new Savant3();
	
	require_once $common_dir_path . '/retrieve.inc.php';
	require_once $common_dir_path . '/class/class.MyQuery.php';
	require_once $common_dir_path . '/class/class.MyFormCheck.php';
	
	require_once $common_dir_path . '/functions/admin-functions.inc.php';
	
	$food_img_dir = './uploads/food-images/';
	
	$savant->assign("current_file_info", $current_file_info);
	
	/******** Get Top Navigation Information (Start) ***********/
	$top_menu = array();
	$temp_top_menu = array();
	$csql = "SELECT C.id as cid, M.id as mid, C.title as ctitle, M.title as mtitle, C.sequence as cseq, M.sequence as mseq FROM " . CATEGORIES . ' as C, ' . MENUS . " as M WHERE C.menu_id = M.id ORDER BY C.sequence, C.id";		
	if ( !($cresult = $db->sql_query($csql)) ) {
	  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$csql);
	}		
	$categories_list = $db->sql_fetchrowset($cresult);
	$db->sql_freeresult($cresult);
	if (!empty($categories_list)) {
		foreach($categories_list as $ckey=>$cval) {
			if (!isset($temp_top_menu[($cval['mid'])])){
				$temp_top_menu[($cval['mid'])] = array();
				$temp_top_menu[($cval['mid'])]['id'] = $cval['mid'];
				$temp_top_menu[($cval['mid'])]['title'] = $cval['mtitle'];
				$temp_top_menu[($cval['mid'])]['sequence'] = $cval['mseq'];
				$temp_top_menu[($cval['mid'])]['fcategory'] = array();
			}
			$tmp_array_index = count($temp_top_menu[($cval['mid'])]['fcategory']);
			$temp_top_menu[($cval['mid'])]['fcategory'][$tmp_array_index]['id'] = $cval['cid'];
			$temp_top_menu[($cval['mid'])]['fcategory'][$tmp_array_index]['title'] = $cval['ctitle'];
			$temp_top_menu[($cval['mid'])]['fcategory'][$tmp_array_index]['sequence'] = $cval['cseq'];
		}//end foreach
	}
	//print_r($temp_top_menu);exit;
	if(!empty($temp_top_menu) && is_array($temp_top_menu) && count($temp_top_menu)) {
		$top_header_index = 0;
		$count = count($temp_top_menu);
		$len = strlen($count);
		foreach ($temp_top_menu as $tmp_top_m) {
			$num = pow(10, $len);
			$temp_zeros = "00000000000000000000";
			$tmp_index = !empty($tmp_top_m['sequence']) ? $tmp_top_m['sequence'] : 0;
			$digit_diff = $len - strlen($tmp_index);
			$tmp_top_m_index = ($digit_diff > 0 ? substr($temp_zeros, 0, $digit_diff) . $tmp_index : $tmp_index) . '-' . $top_header_index;
			$top_header_index++;
			$top_menu[$tmp_top_m_index] = $tmp_top_m;
		}//end foreach
		ksort($top_menu);
	}//end if
	//$top_menu_index = count($top_menu);
	
	//print_r($top_menu);exit;
	$savant->assign("top_menu", $top_menu);
	/******** Get Top Navigation Information (End) *************/
	
	//check_customer_login();




	$savant->assign("custLoginUsername",$custLoginUsername);
	$savant->assign("custLoginPassword",$custLoginPassword);
	$savant->assign("custLoginRemember",$custLoginRemember);
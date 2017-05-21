<?php 
	require_once './include/common.inc.php';
	$foods_info = array();
	$page_title = '';
	if (!empty($cid)) {
		$fsql = "SELECT * FROM " . FOODS . " WHERE category_id=" . $cid . ' ORDER BY sequence';		
		if ( !($fresult = $db->sql_query($fsql)) ) {
		  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$fsql);
		}		
		$foods_info = $db->sql_fetchrowset($fresult);
		$db->sql_freeresult($fresult);
		
		$csql = "SELECT C.id as cid, M.id as mid, C.title as ctitle, M.title as mtitle, C.short_description as cdesc FROM " . CATEGORIES . ' as C, ' . MENUS . " as M WHERE C.menu_id = M.id AND C.id=" . $cid . ' ORDER BY C.id LIMIT 1';		
		if ( !($cresult = $db->sql_query($csql)) ) {
		  message_die(CRITICAL_ERROR,"Could not config information","",__LINE__,__FILE__,$csql);
		}		
		$category_info = $db->sql_fetchrow($cresult);
		$db->sql_freeresult($cresult);
		if (!empty($category_info) && !empty($category_info['mtitle'])) {
			$page_title = $category_info['mtitle'] . (!empty($category_info['ctitle']) ? ' | ' . $category_info['ctitle'] : '' );
		}
	}
	
	
	$savant->assign("food_hover_img_dir", $food_img_dir . "hover/");
	$savant->assign("food_img_dir", $food_img_dir);
	$savant->assign("foods_info", $foods_info);
	$savant->assign("category_info", $category_info);
	$savant->assign("current_page_name", $page_title);
	$savant->display(TPL_DIR . 'food-menu.' . TPL_EXT);
<?php 
	define('ADMIN_PANEL_NAME', 'Restaurant');
	define('ADMIN_PANEL_PAGE_TITLE', 'Restaurant | Admin Panel');
	define('SITE_NAME', 'Restaurant');
	
	/******* DB Table Names (Start) ******/
	$tbl_prefix =	'res_';
	define('RESERVATIONS', $tbl_prefix . 'reservations');
	define('CUSTOMERS', $tbl_prefix . 'customers');
	define('PAGES', $tbl_prefix . 'pages');
	define('FOODS', $tbl_prefix . 'foods');
	define('CATEGORIES', $tbl_prefix . 'categories');
	define('MENUS', $tbl_prefix . 'menus');
	define('USERS', $tbl_prefix . 'users');
	/******* DB Table Names (End) ********/
	
	define('TPL_DIR', 'templates/');
	define('TPL_EXT', 'tpl.php');
	
	define('NO_MSG',0);
	define('GENERAL_MESSAGE', 200);
	define('GENERAL_ERROR', 202);
	define('CRITICAL_MESSAGE', 203);
	define('CRITICAL_ERROR', 204);
	
	//header message array
	$HEADER_MSG = array(
		'ERR_REQUIRED_FIELD' => 'Please complete required fields.  Required fields are marked with an asterisk *<BR \>',
		'ADD' => 'Thank You.Your Information Saved Successfully.<BR \>',
		'UPDATE' => 'Thank You.Your Information Updated Successfully.<BR \>',
		'DELETE' => 'Your Reuested Information Dedeleted Successfully.<BR \>',
		'ERR_DB' => 'Internal Database Error.Please Contact With Your Service Provider.<BR \>',
		'ERR_INVALID_USER' => 'Invalid User Name or Password.<BR \>',
		'LOGOUT_USER' => 'You Have Loggout Successfully.<BR \>',
		'ERR_PASSWORD' => 'Password did not match.Please Give Same Password.<BR \>',
		'ERR_IMG_TYPE' => ' Image Size Does Not Support.Please Upload  JPEG,GIF,PNG Type Image.<BR \>',
		'ERR_IMG_EXIST' => ' Image Already Exist.Please Change Image Name amd Upload Again.<BR \>',
		'INFO_NOT_SAVE' => 'Information Could Not Saved.Please Try Again.<BR \>',
		'EXIST_INFO'	=> ' Already Exist.Please Change It.<BR \>'
	);
<?php
 //
 // here globals arrays  are convert to the variable according to the index 
 // 
 // If you use this page you need not to bother about single quote, double quote , slashes and html tags in the text field or text area.
 // But if you want to print any variable out side the text field or text area in the php page ( not in template ), you have to use stripslashes function.
 // You have to use nl2br function in template and php page to print the value of text area outside the text area.
 // If you define 'USE_HTML_CODE' then you have to use 'escape', savant attribute to show double quote in the text field.
 //

 $gpc = ini_get("magic_quotes_gpc");

 // if magic gpc is on	
 if ( $gpc == 1 )
 {
	 foreach ($_GET as $key => $value)
	 {
		if (!is_array($value)) 
		{
			$$key = defined("USE_HTML_CODE") ? $value : htmlspecialchars($value);	
			$$key = stripslashes($$key); 
			$savant->assign($key,$$key);
			$$key = addslashes($$key);	
		}
	 }
 }
 // if magic gpc is off	
 else
 {
	 foreach ($_GET as $key => $value)
	 {
		if (!is_array($value)) 
		{
			$$key = defined("USE_HTML_CODE") ? $value : htmlspecialchars($value);	
			$savant->assign($key,$$key);
			$$key = addslashes($$key);	
		}
	 }
 }


 // if magic gpc is on	
 if ( $gpc == 1 )
 {
	 foreach ($_POST as $key => $value)
	 {
		if (!is_array($value)) 
		{
			$$key = defined("USE_HTML_CODE") ? $value : htmlspecialchars($value);	
			$$key = stripslashes($$key); 
			$savant->assign($key,$$key);
			$$key = addslashes($$key);	
		}
	 }
 }
 // if magic gpc is off	
 else
 {
	 foreach ($_POST as $key => $value)
	 {
		if (!is_array($value)) 
		{
			$$key = defined("USE_HTML_CODE") ? $value : htmlspecialchars($value);	
			$savant->assign($key,$$key);
			$$key = addslashes($$key);	
		}
	 }
 }
 
if ( $gpc == 1 )
{
	 foreach ($_FILES as $key1 => $value1)
	 {
	   foreach ($value1 as $key2 => $value)
	   {
			$key = $key1 . "_" . $key2;
			$$key = $value;
			if ( !eregi('tmp_name', $key) ) $$key = stripslashes($$key); 
			$savant->assign($key,$$key);
			if ( !eregi('tmp_name', $key) ) $$key = addslashes($$key);			
	  }
	 }
}
else
{
	 foreach ($_FILES as $key1 => $value1)
	 {
	   foreach ($value1 as $key2 => $value)
	   {
			$key = $key1 . "_" . $key2;
			$$key = $value;
			$savant->assign($key,$$key);
			if ( !eregi('tmp_name', $key) ) $$key = addslashes($$key);			
	  }
	 }
}
?>
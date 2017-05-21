<?php
 class MyFormCheck{
 	var $_err;
	// Parameter is an array of required field names 
	//
	function check_required($required)
	{
		global $MyFormCheck;
		$MyFormCheck = new MyFormCheck;
		foreach($required as $field)
		{
			global $$field;
			if ( $$field == '' )
			{
				$MyFormCheck->_err = "Please complete required fields.  Required fields are marked with an asterisk *<br/>";
				break;
			}
		}
	}
	
	
	function check_email($email = "")
	{
		global $MyFormCheck;
		$MyFormCheck = new MyFormCheck;
		if ( $email !=  "" &&  !preg_match( '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i' , $email ) )
		{
			 $MyFormCheck->_err = "$email  - Is Not A Correct Email Address!" . "<br/>";
		} 
	}


	function check_url($url = "")
	{
		global $MyFormCheck;
		$MyFormCheck = new MyFormCheck;
		if ( $url != "" )
		{
			if(! preg_match( '/^(http|https):\/\//i' , $url ) )
		    { 
			   $url = "http://" . $url;
		    }

			if( preg_match( '/^(http|https):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}' . '((:[0-9]{1,5})?\/.*)?$/i' , $url ) )
			{
				$parsed = parse_url ( $url );
				$fp = fsockopen( $parsed['host'], 80 , $errno, $errstr );
				if ( !$fp ) 
				{
				   $MyFormCheck->_err .= "Given URL (" . $url . ") Does Not Exist.<br/>";
				   fclose( $fp );
				}
			}
			else
			{
				 $MyFormCheck->_err = "Wrong URL Has Been Given.<br/>";
			}
		}
	}
	

	// First parameter is a date in 'mm/dd/yy', 'mm-dd-yy', 'mm.dd.yy' format. Year can be in 'yyyy' format.
	// Second parameter is the name of the date field to use in error message. Its optional.
	// unix timestamp of the date is returned.
	//
	function check_date($date, $date_name = "Date Field")
	{
		global $MyFormCheck;
		$MyFormCheck = new MyFormCheck;
		if ( $date != "" )
		{
			if ( strlen($date) <= 1  ) {$MyFormCheck->_err .= ucfirst($date_name) . " Is Not Valid.<br/>"; return -1;}
			else
			{  
			   $date = trim($date,'');
			   $date=str_replace(" ","",$date);
			   $date=ereg_replace("[-\.]+","/", $date);
			   $date_arr = explode("/",$date);
			   $chk = @checkdate($date_arr[0],$date_arr[1],$date_arr[2]);
			   if ( !$chk ) {$MyFormCheck->_err .= ucfirst($date_name) . " Is Not Valid.<br/>"; return -1;}
			   else
			   {
					$date = strtotime($date);
					if ( $date < 1 ) { $MyFormCheck->_err .= ucfirst($date_name) . " Is Not Valid.<br/>"; return -1; }
					else return $date;
				}
				
			}
		}
	}
	
 
 
 }
?>
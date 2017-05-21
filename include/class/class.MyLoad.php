<?php
class MyLoad{

 var $_err;
 // First parameter is the field name of the file type. It must be given.
 // Second parameter is the optional upload path. If upload path is not given then file is uploaded in the same directory
 // Third parameter is optional file extension array.
 //
 function upload($file_field = "", $upload_path = "./", $file_ext = array() )
 {  
	      
	global $MyLoad;
	$MyLoad = new MyLoad;
	$MyLoad->_err = '';
	
	
	if ( $file_field == "" ) { $MyLoad->_err = 'Field name of the file is not given'; return false; }
	    
	$file_name = $file_field . "_name";
	$file_type = $file_field . "_type";
	$file_size = $file_field . "_size";
	$file_tmp_name = $file_field . "_tmp_name";
	global $$file_name;
	global $$file_type;
	global $$file_size;
	global $$file_tmp_name;

	$file_name = $$file_name;
	//$file_type = $$file_type;
	$file_size = $$file_size;
	$file_tmp_name = $$file_tmp_name;
    $file_type = substr($file_name,1+strrpos($file_name, "."));

	if ( $file_name != '' || $file_size > 0 )
	{
	   if ( $file_name == '') $MyLoad->_err = 'File has no name<br>';
	   elseif( $file_size == 0) $MyLoad->_err = $file_name . ' file size is zero<br>';		
	   elseif ( !is_array($file_ext) ) $MyLoad->_err =  $file_name . ' file extension array is not given<br>';
	   elseif ( !empty($file_ext) )
	   { 
			$type_match = "";
			$type = "";
			foreach($file_ext as $k => $ext)
			{
				if ( $k > 0 ) $type .= ", ";
				if( eregi($ext, $file_type) ) $type_match = "matched";	
				$type .= $ext;
			}
			if ( empty($type_match) ) $MyLoad->_err = "Valid file type - " . $type . " <br>";
	   }

	   
	   
	   if ( $MyLoad->_err == '' )
	   {
		   $uploadfile = $upload_path . $file_name; 
		   $file = $file_size;

		   $ok = @move_uploaded_file($file_tmp_name, $uploadfile);  
		   if ( !$ok ) $MyLoad->_err = 'Can not upload the file.<br>'; 
		}
	} 
	else
	{
		//$MyLoad->_err = 'Please select upload file and try again.<br>';
	}
 	 
 }
 

// var $_err;
 // First parameter is the field name of the file type. It must be given.
 // Second parameter is the optional upload path. If upload path is not given then file is uploaded in the same directory
 // Third parameter is optional file extension array.
 //
 function upload_rename($file_field = "", $upload_path = "./", $file_ext = array() ,$rename = "")
 {  
	      
	global $MyLoad;
	$MyLoad = new MyLoad;
	$MyLoad->_err = '';
	
	if ( $file_field == "" ) { $MyLoad->_err = 'Field name of the file is not given'; return false; }
	    
	$file_name = $file_field . "_name";
	$file_type = $file_field . "_type";
	$file_size = $file_field . "_size";
	$file_tmp_name = $file_field . "_tmp_name";

	
	global $$file_name;
	global $$file_type;
	global $$file_size;
	global $$file_tmp_name;

	$file_name = $$file_name;
	//$file_type = $$file_type;
	$file_size = $$file_size;
	$file_tmp_name = $$file_tmp_name;
    $file_type = substr($file_name,1+strrpos($file_name, "."));

	if ( $file_name != '' || $file_size > 0 )
	{
	   if ( $file_name == '') $MyLoad->_err = 'File has no name<br>';
	   elseif( $file_size == 0) $MyLoad->_err = $file_name . ' file size is zero<br>';		
	   elseif ( !is_array($file_ext) ) $MyLoad->_err =  $file_name . ' file extension array is not given<br>';
	   elseif ( !empty($file_ext) )
	   { 
			$type_match = "";
			$type = "";
			foreach($file_ext as $k => $ext)
			{
				if ( $k > 0 ) $type .= ", ";
				if( eregi($ext, $file_type) ) $type_match = "matched";	
				$type .= $ext;
			}
			if ( empty($type_match) ) $MyLoad->_err = "Valid file type - " . $type . " <br>";
	   }

	   
	   
	   if ( $MyLoad->_err == '' )
	   {
		   $uploadfile = $upload_path . $rename; 
		   $file = $file_size;

		   $ok = @move_uploaded_file($file_tmp_name, $uploadfile);  
		   if ( !$ok ) $MyLoad->_err = 'Can not upload the file.<br>'; 
		}
	} 
	else
	{
		//$MyLoad->_err = 'Please select upload file and try again.<br>';
	}
 	 
 }
 


 function download($file_name,$basedir)
 {
 
    global $MyLoad;
	if ( !isset($MyLoad) )
	{
		$MyLoad = new MyLoad;
		$MyLoad->_err = '';
	}
   //Gather relevent info about file
   
   //$basedir = "/Apache2/htdocs/cn/upload/"; 
   $file_path = $basedir . $file_name;
   $len = filesize($file_path);

   //First, see if the file exists
   if (!is_file($file_path)) { $MyLoad->_err .= "File not found!<br>"; }


   $file_extension = strtolower(substr(strrchr($file_name,"."),1));

   //This will set the Content-Type to the appropriate setting for the file
   switch( $file_extension )
   {
	 case "pdf": $ctype="application/pdf"; break;
	 case "exe": $ctype="application/octet-stream"; break;
	 case "zip": $ctype="application/zip"; break;
	 case "doc": $ctype="application/msword"; break;
	 case "xls": $ctype="application/vnd.ms-excel"; break;
	 case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
	 case "gif": $ctype="image/gif"; break;
	 case "png": $ctype="image/png"; break;
	 case "jpeg":
	 case "jpg": $ctype="image/jpg"; break;
	 case "mp3": $ctype="audio/mpeg"; break;
	 case "wav": $ctype="audio/x-wav"; break;
	 case "mpeg":
	 case "mpg":
	 case "mpe": $ctype="video/mpeg"; break;
	 case "mov": $ctype="video/quicktime"; break;
	 case "avi": $ctype="video/x-msvideo"; break;

	 //The following are for extensions that shouldn't be downloaded (sensitive stuff, like php files)
	 case "php":
	 case "htm":
	 case "html":
	 case "txt": die("<b>Cannot be used for ". $file_extension ." files!</b>"); break;

	 default: $ctype="application/force-download";
    }
	
   //Begin writing headers
   header("Pragma: public");
   header("Expires: 0");
   header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
   header("Cache-Control: public"); 
   header("Content-Description: File Transfer");
   
  //Use the switch-generated Content-Type
   header("Content-Type: $ctype");

   //Force the download
   $header="Content-Disposition: attachment; filename=".$file_name;
   header($header );
   header("Content-Transfer-Encoding: binary");
   header("Content-Length: ".$len);
   @readfile($file_path);
   exit;
 }
 
 
 
 
}
?>
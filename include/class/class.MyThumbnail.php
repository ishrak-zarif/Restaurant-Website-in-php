<?php 
 class MyThumbnail
 {
	var $_sql, $_err;
   
   	// You must give input file path and either new width or new height 
    // You can also give both the new width and height, give new path to save new image. 
	// If $desired value is not 1, then this function will preserve the given width and/or height strictly.
	// This function will first calculate new width and height according to $new_width, but if the calculated width is greater than $new_width or calculated height is    //    greater than $new_height then it will calculate again the new width and new height according to $new_height.
	function make_resize_save ($input_file_path = "", $new_width = 0, $new_height = 0, $save_path = "", $desired = 1, $prefix = "", $quality = 100) 
	{ 
		global $MyThumbnail;
		$MyThumbnail = new MyThumbnail;
		$MyThumbnail->_err = "";
		
		$input_file_name = substr($input_file_path, strrpos($input_file_path, "/")+1); 
		$input_path = substr($input_file_path, 0, strrpos($input_file_path, "/")+1); 

		if ( $save_path == "" ) $save_path = $input_path;
		if ( strcmp($input_path,$save_path) != 0 ) $prefix = "";
				
		if ( $input_file_name == "" ) return false;
		if ( $input_file_path == "" ) return false;		
		
		// first, grab the dimensions of the pic 
		$imagedata = getimagesize("$input_file_path"); 
		$image_width = $imagedata[0]; 
		$image_height = $imagedata[1]; 
		$image_type = $imagedata[2]; 		// type definitions  1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP  
											//7 = TIFF(intel byte order), 8 = TIFF(motorola byte order) 9 = JPC, 10 = JP2, 11 = JPX 
		
		if ( !isset($image_width) || !isset($image_height) )
		{
			$MyThumbnail->_err .= "Given file does not exist<br>";
			return false;
		}
		
 		if ( $image_width <= $new_width ) $new_width = $image_width; 
 		if ( $image_height <= $new_height ) $new_height = $image_height;
		
		//$thumb_name = $prefix.$input_file_name; //new thumbnail image name
		$thumb_name = ''; //no need now
		
		if ( ($new_width == 0 || $new_width == "") && ($new_height == 0 || $new_height == "") )
		{
			$MyThumbnail->_err .= "Both the new width and height are zero<br>";
			return false;
		}

		$shrinkage = 1; 		
		if ( $new_width == 0 || $new_width == "" )
		{
			$shrinkage = $new_height/$image_height; 
			$new_width = $shrinkage * $image_width; 
			if ( $new_width <= 1 ) $MyThumbnail->_err .= "Thumbnail width is less than zero<br>";
		}
		elseif ( $new_height == 0 || $new_height == "" )
		{
			$shrinkage = $new_width/$image_width; 
			$new_height = $shrinkage * $image_height; 
			if ( $new_height < 1 ) $MyThumbnail->_err .= "Thumbnail height is less than zero<br>";
		}
		
		if ( $desired == 1 && $MyThumbnail->_err == "" )
		{
			 $desired_width = $new_width;
			 $desired_height = $new_height;
			 $perc_size = ($image_width >= $image_height) ? ($desired_width * 100 / $image_width) :
							 ($desired_height * 100 / $image_height);
							
			 $new_width = round($image_width * $perc_size / 100);
			 $new_height = round($image_height * $perc_size / 100);
			 if ($new_width > $desired_width || $new_height > $desired_height )
			 {
				$perc_size = ($new_width > $desired_width) ? ($desired_width * 100 / $new_width) : ($desired_height * 100 / $new_height);
				$new_width = round($new_width * $perc_size / 100);
				$new_height = round($new_height * $perc_size / 100);
			 } 
		
		
		}

		switch($image_type)
	    {
			case 3: $src_img = imagecreatefrompng($input_file_path); break;
			case 2: $src_img = imagecreatefromjpeg($input_file_path); break;
			case 1: $src_img = imagecreatefromgif($input_file_path); break;
			default: return false;
		}

		$dst_img = imagecreatetruecolor($new_width, $new_height); 
		imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height); 
		
		switch($image_type)
		{
			case 1:
			{

				if (function_exists('imagegif'))
				{
					imagegif($dst_img,$save_path.$thumb_name);break;
				}
			}
			case 2: imagepng($dst_img, $save_path.$thumb_name);break;
			case 3: imagejpeg($dst_img, $save_path.$thumb_name, $quality);
				  break;
		}
		imagedestroy($src_img); 
		imagedestroy($dst_img); 
		return $save_path.$thumb_name; 
	}
	
	
	
 }
?>
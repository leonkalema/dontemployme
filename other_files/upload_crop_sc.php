<?php

	//You can alter these options
	$thistime = mktime();
	$upload_dir = "site_imgs"; 				// The directory for the images to be saved in
	$upload_path = $upload_dir."../";				// The path to where the image will be saved
	$large_image_name = $thistime."_resized.jpg"; 		// New name of the large image
	$thumb_image_name = $thistime."_thumbnail.jpg"; 	// New name of the thumbnail image
	$max_file = "1148576"; 						// Approx 1MB
	$max_width = "500";							// Max width allowed for the large image
	$thumb_width = "182";						// Width of thumbnail image
	$thumb_height = "216";						// Height of thumbnail image
	
	//Image functions
	//You do not need to alter these functions
	function resizeImage($image,$width,$height,$scale) 
	{
		$newImageWidth = ceil($width * $scale);
		$newImageHeight = ceil($height * $scale);
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		$source = imagecreatefromjpeg($image);
		imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
		imagejpeg($newImage,$image,90);
		chmod($image, 0777);
		return $image;
	}
	
	//You do not need to alter these functions
	function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale)
	{
		$newImageWidth = ceil($width * $scale);
		$newImageHeight = ceil($height * $scale);
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		$source = imagecreatefromjpeg($image);
		imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
		imagejpeg($newImage,$thumb_image_name,90);
		chmod($thumb_image_name, 0777);
		return $thumb_image_name;
	}
	
	//You do not need to alter these functions
	function getHeight($image) 
	{
		$sizes = getimagesize($image);
		$height = $sizes[1];
		return $height;
	}
	//You do not need to alter these functions
	function getWidth($image) 
	{
		$sizes = getimagesize($image);
		$width = $sizes[0];
		return $width;
	}
	
	//Image Locations
	$large_image_location = $upload_path.$large_image_name;
	$thumb_image_location = $upload_path.$thumb_image_name;
	
	//Create the upload directory with the right permissions if it doesn't exist
	/*if(!is_dir($upload_dir))
	{
		mkdir($upload_dir, 0777);
		chmod($upload_dir, 0777);
	}*/
	
	//Check to see if any images with the same names already exist
	/*if (file_exists($large_image_location))
	{
		if(file_exists($thumb_image_location))
		{
			$thumb_photo_exists = "<img src=\"".$upload_path.$thumb_image_name."\" alt=\"Thumbnail Image\"/>";
		}else{
			$thumb_photo_exists = "";
		}
		$large_photo_exists = "<img src=\"".$upload_path.$large_image_name."\" alt=\"Large Image\"/>";
	} else {
		$large_photo_exists = "";
		$thumb_photo_exists = "";
	}*/
	
	if (isset($_POST["upload"])) 
	{ 
		//Get the file information
		$userfile_name = $_FILES['image']['name'];
		$userfile_tmp = $_FILES['image']['tmp_name'];
		$userfile_size = $_FILES['image']['size'];
		$filename = basename($_FILES['image']['name']);
		$file_ext = substr($filename, strrpos($filename, '.') + 1);
		
		//Only process if the file is a JPG and below the allowed limit
		if((!empty($_FILES["image"])) && ($_FILES['image']['error'] == 0)) 
		{
			if (($file_ext!="jpg") && ($userfile_size > $max_file)) {
				$error= "ONLY jpeg images under 1MB are accepted for upload";
			}
		}
		else
		{
			$error= "Select a jpeg image for upload";
		}
		//Everything is ok, so we can upload the image.
		if (strlen($error)== 0)
		{
			
			$tasklocation = $_POST['tasklocation'];
			
			$employeeid = $_POST['employeeid'];
			
			if (isset($_FILES['image']['name']))
			{
				
				move_uploaded_file($userfile_tmp, $large_image_location);
				chmod($large_image_location, 0777);
				
				$width = getWidth($large_image_location);
				$height = getHeight($large_image_location);
				//Scale the image if it is greater than the width set above
				if ($width > $max_width){
					$scale = $max_width/$width;
					$uploaded = resizeImage($large_image_location,$width,$height,$scale);
				}else{
					$scale = 1;
					$uploaded = resizeImage($large_image_location,$width,$height,$scale);
				}
				//Delete the thumbnail file so the user can create a new one
				if (file_exists($thumb_image_location)) {
					unlink($thumb_image_location);
				}
			}
			//Refresh the page to show the new uploaded image
			
			/*if($tasklocation == "hr")
			{
				$url = "../user_accounts/hr_employee.php?p=".base64_encode($employeeid);
			}
			else
			{
				$url = "../user_accounts/wanted_persons.php?p=".base64_encode($employeeid);
			}
			
			header("location:".$url);*/
			
			header("location:".$_SERVER["PHP_SELF"]);
			
			exit();
		}
	}
	
	if (isset($_POST["upload_thumbnail"]) && strlen($large_photo_exists)>0) 
	{
		//Get the new coordinates to crop the image.
		$x1 = $_POST["x1"];
		$y1 = $_POST["y1"];
		$x2 = $_POST["x2"];
		$y2 = $_POST["y2"];
		$w = $_POST["w"];
		$h = $_POST["h"];
		//Scale the image to the thumb_width set above
		$scale = $thumb_width/$w;
		$cropped = resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
		//Reload the page again to view the thumbnail
		/*if($tasklocation == "hr")
		{
			$url = "../user_accounts/hr_employee.php?p=".base64_encode($employeeid);
		}
		else
		{
			$url = "../user_accounts/wanted_persons.php?p=".base64_encode($employeeid);
		}
			
		header("location:".$url);*/
		
		header("location:".$_SERVER["PHP_SELF"]);
		
		exit();
	}
	
	if ($_GET['a']=="delete")
	{
		if (file_exists($large_image_location)) 
		{
			unlink($large_image_location);
		}
		if (file_exists($thumb_image_location)) 
		{
			unlink($thumb_image_location);
		}
		header("location:".$_SERVER["PHP_SELF"]);
		
		exit(); 
	}

?>
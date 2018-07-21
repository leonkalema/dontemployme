<?php

	@session_start();
	
	$_SESSION['random_code'] = "";
	
	$string = "";
	
	for ($i = 0; $i < 5; $i++) 
	{  
		$string .= chr(rand(97, 122));  
	}  

	$_SESSION['random_code'] = $string; 
	
	$dir = '../images/fonts/'; 
	
	$image = imagecreatetruecolor(170, 60);  
	$black = imagecolorallocate($image, 0, 0, 0);  
	$color = imagecolorallocate($image, 3, 4, 10); // red  
	$white = imagecolorallocate($image, 255, 255, 255);  
   
	imagefilledrectangle($image,0,0,399,99,$white);  
	imagettftext($image, 30, 0, 10, 40, $color, $dir."Beyond Wonderland.ttf", $_SESSION['random_code']);  
    
	imagepng($image);  

?>
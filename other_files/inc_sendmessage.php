<?php
	
	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	///DATA
	$names = $_POST['names'];
	
	$email = $_POST['email'];
	
	$usermessage = nl2br($_POST['message']);
	
	$security_txt = $_POST['security_txt'];

	if($_SESSION['random_code'] == $security_txt)
	{
		$to = "www.dontemployme.com <info@dontemployme.com>";
			
			$subject = "Feedback from www.dontemployme.com Website";
			
			$message = "Dear Webmaster,

This email is feed back from the Contact Us Page.

========================================================================================================================

".$usermessage;
		
		$from = $names."<".$email.">";
						
		$headers = "From: $from";
						
		$mail = @mail($to,$subject,$message,$headers);
						
		if(!$mail)
		{
			$_SESSION['random_code'] = "";
			
			echo 60;
		}
		else
		{	
			echo 50;
		}
	}
	else
	{
		echo 10;
	}

?>
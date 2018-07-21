<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	//Form Data
	$sourceid = $_POST['sourceid'];
	
	$editid = $_POST['editid'];
	
	$thispic = mktime(); echo "<pre>"; print_r($_FILES);
	
	if($sourceid == 1)
	{
		if($_FILES['user_img']['name'] != "")
		{
			$file = $_FILES['user_img']['name'];
			
			$file_type = explode(".",$file,"2");
						
			if(($file_type[1] != "jpeg") && ($file_type[1] != "jpg") && ($file_type[1] != "pjpeg") && ($file_type[1] != "gif"))
			{
				$result = "1";
			}
			elseif($_FILES['user_img']['size'] == 0)
			{
				$result = "2"; 
			}
			else
			{
				$image = getimagesize($_FILES['user_img']['tmp_name']);
				
				if(($image[0] > 190 && $image[1] > 210) || ($image[0] <= 190 && $image[1] > 210) || ($image[0] > 190 && $image[1] <= 210))
				{
					$result = "3"; 
				}
				else
				{
					$update = mysql_query("UPDATE persons_list SET picture = '".$thispic.$_FILES['user_img']['name']."' WHERE id = '".$editid."'");
							
					if($update)
					{
						copy($_FILES['user_img']['tmp_name'],"../file_loads/".$thispic.$_FILES['user_img']['name']);
							
						$result = "4";
					}
					else
					{
						$result = "5";
					}
				}
			}
		}
	}
	else
	{
		if($_FILES['user_img']['name'] != "")
		{
			$file = $_FILES['user_img']['name'];
			
			$file_type = explode(".",$file,"2");
						
			if(($file_type[1] != "jpeg") && ($file_type[1] != "jpg") && ($file_type[1] != "pjpeg") && ($file_type[1] != "gif"))
			{
				$result = "1";
			}
			elseif($_FILES['user_img']['size'] == 0)
			{
				$result = "2"; 
			}
			else
			{
				$image = getimagesize($_FILES['user_img']['tmp_name']);
				
				if(($image[0] > 190 && $image[1] > 210) || ($image[0] <= 190 && $image[1] > 210) || ($image[0] > 190 && $image[1] <= 210))
				{
					$result = "3"; 
				}
				else
				{
					$update = mysql_query("UPDATE persons_list SET picture = '".$thispic.$_FILES['user_img']['name']."' WHERE id = '".$editid."'");
							
					if($update)
					{
						copy($_FILES['user_img']['tmp_name'],"../file_loads/".$thispic.$_FILES['user_img']['name']);
							
						$result = "6";
					}
					else
					{
						$result = "5";
					}
				}
			}
		}
	}
?>
<script language="javascript" type="text/javascript">window.top.window.stopUpload(<?php echo $result; ?>);</script>
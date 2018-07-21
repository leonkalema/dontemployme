<?php
	
	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	//Form data
	$task = $_GET['task'];
	
	$id = base64_decode($_GET['i']);
	
	if($task == 1)
	{
		$find = mysql_fetch_array(mysql_query("SELECT u.id, u.usern, d.companynames, d.contactnames, d.phoneno, d.address, d.emailid FROM users u, user_accounts_companies d WHERE u.id = d.userid && d.userid = '".$id."'")); 
	
		?>
		<table border="0" width="500px" cellpadding="0" cellspacing="0">
		   <tr>
				<td align="right" style="padding-top:10px;">
					Company Name: &nbsp;
				</td>
				<td style="padding-top:10px;">
					<?php echo $find['companynames']; ?>
				</td>
			</tr>
			<tr>
				<td align="right" style="padding-top:10px;">
					Full names: &nbsp;
				</td>
				<td style="padding-top:10px;">
					<?php echo $find['contactnames']; ?>
				</td>
			</tr>
			<tr>
				<td width="30%" align="right" style="padding-top:10px;">
					Username: &nbsp;
				</td>
				<td style="padding-top:10px;">
					<?php echo $find['usern']; ?>
				</td>
			</tr>
			<tr>
				<td align="right" style="padding-top:10px; vertical-align:top;">
					Company Address: &nbsp;
				</td>
				<td style="padding-top:10px; vertical-align:top;">
					<?php echo $find['address']; ?>
				</td>
			</tr>
			<tr>
				<td align="right" style="padding-top:10px;">
					Company Phone No: &nbsp;
				</td>
				<td style="padding-top:10px;">
					<?php echo $find['phoneno']; ?>
				</td>
			</tr>
			<tr>
				<td align="right" style="padding-top:10px;">
					Company Email: &nbsp;
				</td>
				<td style="padding-top:10px;">
					<?php echo $find['emailid']; ?>
				</td>
			</tr>
		</table>
  	<?php
	}
	else
	{
		$find = mysql_fetch_array(mysql_query("SELECT u.id, u.usern, d.* FROM users u, user_accounts_police d WHERE u.id = d.userid && d.userid = '".$id."'")); 
	?>
    	<table border="0" width="500px" cellpadding="0" cellspacing="0">
		   <tr>
				<td align="right" style="padding-top:10px;">
					Full names: &nbsp;
				</td>
				<td style="padding-top:10px;">
					<?php echo $find['names']; ?>
				</td>
			</tr>
			<tr>
				<td width="30%" align="right" style="padding-top:10px;">
					Username: &nbsp;
				</td>
				<td style="padding-top:10px;">
					<?php echo $find['usern']; ?>
				</td>
			</tr>
			<tr>
				<td align="right" style="padding-top:10px;">
					Phone No: &nbsp;
				</td>
				<td style="padding-top:10px;">
					<?php echo $find['phoneno']; ?>
				</td>
			</tr>
		</table>
    <?php			
	}
?>
    
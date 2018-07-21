<?php
	
	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	///DATA
	
	//Form data
	$id = base64_decode($_GET['i']);
	
	$find = mysql_fetch_array(mysql_query("SELECT u.id, u.usern, d.names, d.phoneno, d.date_joined FROM users u, user_accounts_police d WHERE u.id = d.userid && u.id = '".$id."'"));  	

?>
<table border="0" width="300px" cellpadding="0" cellspacing="0">
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
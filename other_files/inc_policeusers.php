<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td>
        	<a href="../panel_area/index.php" class="toplinks" title="CONTROL PANEL">CONTROL PANEL</a> <b> :: POLICE Users</b> [ <a href="../panel_area/police_users.php?t=add" class="links" title="Add POLICE User">Add POLICE User</a> ] [ <a href="../panel_area/police_users.php?t=view" class="links" title="View POLICE Users">View POLICE Users</a> ] 
        </td>
	</tr>
	<?php

	if($_GET['t'] == "add" || $_GET['edit'])
	{
		if($_GET['edit'])
		{
			$id = base64_decode($_GET['edit']);
			
			$edit = mysql_fetch_array(mysql_query("SELECT u.id, u.usern, d.names, d.phoneno, d.date_joined FROM users u, user_accounts_police d WHERE u.id = d.userid && u.id = '".$id."'"));  	
		}
	?>
	<tr>
		<td>
			<table border="0" width="100%" cellpadding="2" cellspacing="2">
				<tr>
					<td style="padding-top:10px;">
						<?php
						if($_GET['edit'])
						{
						?>
							<b>Edit POLICE User - </b> <?php echo $edit['names']; ?>
						<?php	
						}
						else
						{
						?>
							<b>Add POLICE User</b>
						<?php	
						}
						?>
					</td>
				</tr>
				<tr>
                	<td>
                    	<form name="registration" method="post" autocomplete="off" action="#register" onsubmit="return Empty('names', 'Please enter names of POLICE Officer', 'error_msg2') <?php if(!$_GET['edit']) {?> && Empty('username', 'Please enter username', 'error_msg2') && Empty('password1', 'Please enter password', 'error_msg2') && Empty('password2', 'Please re-enter password', 'error_msg2') <?php } ?> && Empty('phoneno', 'Please enter phone number', 'error_msg2') && addoreditPOLICEUser('names', 'username', 'password1', 'phoneno', 'editid', 'error_msg2');">
                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td colspan="2">
                                    <div id="error_msg2"></div>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" style="padding-top:10px;">
                                    Full names: &nbsp;
                                </td>
                                <td style="padding-top:10px;">
                                    <input type="text" name="names" id="names" value="<?php echo $edit['names']; ?>" size="50">
                                </td>
                            </tr>
                            <tr>
                                <td width="12%" align="right" style="padding-top:10px;">
                                    Username: &nbsp;
                                </td>
                                <td style="padding-top:10px;">
                                    <input type="text" name="username" id="username" value="<?php echo $edit['usern']; ?>" <?php if($_GET['edit']) {?> disabled="disabled" <?php } ?> size="50" onblur="return Empty('username', 'Please enter username', 'username_error') && checkUsername('username', 'username_error');">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td align="left" style="padding-top:10px;">
                                    <div id="username_error"></div>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" style="padding-top:10px;">
                                    Password: &nbsp;
                                </td>
                                <td style="padding-top:10px;">
                                    <input type="password" name="password1" id="password1" size="50">
                                </td>
                            </tr>
                            <tr>
                                <td align="right" style="padding-top:10px;">
                                    Re-enter password: &nbsp;
                                </td>
                                <td style="padding-top:10px;">
                                    <input type="password" name="password2" id="password2" onblur="return Empty('password1', 'Please enter password', 'password_error') && Empty('password2', 'Please re-enter password', 'password_error') && checkPasswordMatch('password1','password2', 'password_error') && checkPwLength('password1', 'password_error');" size="50">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td align="left" style="padding-top:10px;">
                                    <div id="password_error"></div>
                                </td>
                            </tr>
                            <?php
							if($_GET['edit'])
							{
							?>
                            <tr>
                                <td colspan="2" align="left" style="padding-top:10px;">
                                    <img src="../images/no.gif" width="18" height="18" border="0" align="absmiddle" /> <font color="red">To change password, please type in the new password in the password fields. When password fields are left empty, password is not reset</font>
                                </td>
                            </tr>
                          	<?php
							}
							?>
                            <tr>
                                <td align="right" style="padding-top:10px;">
                                    Phone No: &nbsp;
                                </td>
                                <td style="padding-top:10px;">
                                    <input type="text" name="phoneno" id="phoneno" value="<?php echo $edit['phoneno']; ?>" maxlength="10" size="50" onKeyDown="return onlyNumbers('phoneno', 'error_msg2');">
                                </td>
                            </tr>
                            <tr>
                                <td align="right" style="padding-top:10px;">
                                    
                                </td>
                                <td style="padding-top:10px; padding-bottom:30px;">
                                    <?php
                                    if($_GET['edit'])
									{
									?>
                                    <input type="hidden" name="editid" id="editid" value="<?php echo $id; ?>">
                                    <input type="submit" value="Save Changes">
                                    <?php	
									}
									else
									{
									?>
                                    <input type="hidden" name="editid" id="editid" value="0">
                                    <input type="submit" value="Add POLICE User">
                                    <?php	
									}
									?>
                                </td>
                            </tr>
                        </table>
                        </form>
                    </td>
                </tr>
            </table>
		</td>
	</tr>
	<?php
	}
	elseif($_GET['t'] == "view") 
	{
		$qry = mysql_query("SELECT u.id, u.usern, d.names, d.phoneno, d.date_joined FROM users u, user_accounts_police d WHERE u.id = d.userid && u.urights = 700 ORDER BY d.date_joined DESC");  	
	
		$num = mysql_num_rows($qry);
	?>
    <tr>
    	<td>
        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
            	<tr>
                	<td style="padding-top:10px;">
                    	<b>View POLICE Users</b>
                    </td>
                    <td align="right">
                    	Found: <b><?php echo $num; ?></b>
                    </td>
                </tr>
                <?php
				if($num != 0)
				{
				?>
                <tr>
                	<td style="padding-top:10px;" colspan="2">
                    	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                            	<td width="3%" class="tdmain">
                                	#
                                </td>
                                <td width="5%" align="center" class="tdmain">
                                	Edit
                                </td>
                                <td class="tdmain">
                                	POLICE Officer
                                </td>
                                <td width="20%" class="tdmain">
                                	Phone No
                                </td>
                                <td width="15%" class="tdmain">
                                	Date Registered
                                </td>
                                <td width="5%" align="center" class="tdmain">
                                	Delete
                                </td>
                            </tr>
                            <?php
							
							$counter = 1;
							
							while($result = mysql_fetch_array($qry))
							{
								if(($counter % 2) == 0)
								{
									$row = "evenrow";
								}
								else
								{
									$row = "oddrow";
								}
							?>
                            <tr class="<?php echo $row; ?>">
                            	<td class="tdother">
                                	<b><?php echo $counter; ?></b>
                                </td>
                                <td align="center" class="tdother">
                                	<a href="../panel_area/police_users.php?edit=<?php echo base64_encode($result['id']); ?>" class="links" title="Edit POLICE Officer - <?php echo $result['names']; ?>">Edit</a>
                                </td>
                                <td class="tdother">
                                	<a class="fancybox fancybox.ajax" href="../other_files/thispolice.php?i=<?php echo base64_encode($result['id']); ?>" id="links"><?php echo $result['names']; ?></a>
                                </td>
                                <td class="tdother">
                                	<?php echo $result['phoneno']; ?>
                                </td>
                                <td class="tdother">
                                	<?php echo date("jS - F - Y", $result['date_joined']); ?>
                                </td>
                                <td align="center" class="tdother">
                                	<a href="#" onClick="return promptAction('Delete POLICE Officer - <?php echo $result['names']; ?>?', '../panel_area/police_users.php?d=<?php echo base64_encode($result['id']); ?>');" class="links" title="Delete POLICE Officer - <?php echo $result['names']; ?>">Delete</a>
                                </td>
                                
                            </tr>
                            <?php	
							$counter++;	
							}
							?>
                        </table>
                    </td>
                </tr>
                <?php	
				}
				else
				{
				?>
                <tr>
                	<td style="padding-top:10px;" colspan="2">
                    	<i><b>0</b> results found!</i>
                    </td>
                </tr>
                <?php		
				}
				?>
            </table>
        </td>
    </tr>
 	<?php
	}
	?>
</table>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td>
        	<a href="../panel_area/index.php" class="toplinks" title="CONTROL PANEL">CONTROL PANEL</a> <b> :: Company Users</b> [ <a href="../panel_area/company_users.php?t=pending" class="links" title="Pending Registrations">Pending Registrations</a> ] [ <a href="../panel_area/company_users.php?t=accepted" class="links" title="Accepted Registrations">Accepted Registrations</a> ] 
        </td>
	</tr>
	<?php

	if($_GET['t'] == "pending")
	{
		$qry = mysql_query("SELECT u.id, u.usern, d.companynames, d.contactnames, d.phoneno, d.date_joined FROM users u, user_accounts_companies d WHERE u.id = d.userid && u.ustatus = 0 && u.urights = 600 ORDER BY d.date_joined DESC");  	
	
		$num = mysql_num_rows($qry);
	?>
    <tr>
    	<td>
        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
            	<tr>
                	<td style="padding-top:10px;">
                    	<b>Pending Registrations</b>
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
                            	<td width="4%" class="tdmain">
                                	#
                                </td>
                                <td class="tdmain">
                                	Company Name
                                </td>
                                <td class="tdmain">
                                	Contact Person
                                </td>
                                <td class="tdmain">
                                	Phone No
                                </td>
                                <td width="5%" align="center" class="tdmain">
                                	Action
                                </td>
                                <td width="5%" align="center" class="tdmain">
                                	Delete
                                </td>
                                <td width="15%" class="tdmain">
                                	Date Registered
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
                                <td class="tdother">
                                	<a class="fancybox fancybox.ajax" href="../other_files/thiscompany.php?task=1&i=<?php echo base64_encode($result['id']); ?>" id="links" title="Details of Company - <?php echo $result['companynames']; ?>"><?php echo $result['companynames']; ?></a>
                                </td>
                                <td class="tdother">
                                	<?php echo $result['contactnames']; ?>
                                </td>
                                <td class="tdother">
                                	<?php echo $result['phoneno']; ?>
                                </td>
                                <td align="center" class="tdother">
                                	<a href="#" onClick="return promptAction('Accept Registration - <?php echo $result['companynames']; ?>?', '../panel_area/company_users.php?a=<?php echo base64_encode($result['id']); ?>');" class="links" title="Accept Registration For - <?php echo $result['companynames']; ?>">Accept</a>
                                </td>
                                <td align="center" class="tdother">
                                	<a href="#" onClick="return promptAction('Delete Registration - <?php echo $result['companynames']; ?>?', '../panel_area/company_users.php?d=<?php echo base64_encode($result['id']); ?>&t=<?php echo base64_encode(1); ?>');" class="links" title="Delete Registration For - <?php echo $result['companynames']; ?>">Delete</a>
                                </td>
                                <td class="tdother">
                                	<?php echo date("jS - F - Y", $result['date_joined']); ?>
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
	elseif($_GET['t'] == "accepted")
	{
		$qry = mysql_query("SELECT u.id, u.usern, d.companynames, d.contactnames, d.phoneno, d.date_joined FROM users u, user_accounts_companies d WHERE u.id = d.userid && u.ustatus = 1 && u.urights = 600 ORDER BY d.date_joined DESC");  	
	
		$num = mysql_num_rows($qry);
	?>
    <tr>
    	<td>
        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
            	<tr>
                	<td style="padding-top:10px;">
                    	<b>Accepted Registrations</b>
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
                            	<td width="4%" class="tdmain">
                                	#
                                </td>
                                <td class="tdmain">
                                	Company Name
                                </td>
                                <td class="tdmain">
                                	Contact Person
                                </td>
                                <td class="tdmain">
                                	Phone No
                                </td>
                                <td width="5%" align="center" class="tdmain">
                                	Action
                                </td>
                                <td width="5%" align="center" class="tdmain">
                                	Delete
                                </td>
                                <td width="15%" class="tdmain">
                                	Date Registered
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
                                <td class="tdother">
                                	<a class="fancybox fancybox.ajax" href="../other_files/thiscompany.php?task=1&i=<?php echo base64_encode($result['id']); ?>" id="links" title="Details of Company - <?php echo $result['companynames']; ?>"><?php echo $result['companynames']; ?></a>
                                </td>
                                <td class="tdother">
                                	<?php echo $result['contactnames']; ?>
                                </td>
                                <td class="tdother">
                                	<?php echo $result['phoneno']; ?>
                                </td>
                                <td align="center" class="tdother">
                                	<a href="#" onClick="return promptAction('Revoke Registration - <?php echo $result['companynames']; ?>?', '../panel_area/company_users.php?r=<?php echo base64_encode($result['id']); ?>');" class="links" title="Revoke Registration For - <?php echo $result['companynames']; ?>">Revoke</a>
                                </td>
                                <td align="center" class="tdother">
                                	<a href="#" onClick="return promptAction('Delete Registration - <?php echo $result['companynames']; ?>?', '../panel_area/company_users.php?d=<?php echo base64_encode($result['id']); ?>&t=<?php echo base64_encode(2); ?>');" class="links" title="Delete Registration For - <?php echo $result['companynames']; ?>">Delete</a>
                                </td>
                                <td class="tdother">
                                	<?php echo date("jS - F - Y", $result['date_joined']); ?>
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
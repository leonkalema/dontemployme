<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td>
        	<a href="../panel_area/index.php" class="toplinks" title="CONTROL PANEL">CONTROL PANEL</a> <b> :: HR/WANTED PERSONS</b> 
        </td>
	</tr>
	<?php
    
		$qry = mysql_query("SELECT id, userid, origin, picture, randomid, fname, mname, lname, hrcomment, status, date_posted FROM persons_list ORDER BY date_posted DESC");  	
	
		$num = mysql_num_rows($qry);
	?>
    <tr>
    	<td>
        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
            	<tr>
                	<td style="padding-top:10px;">
                    	<b>ALL HR/WANTED PERSONS</b>
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
                                <td width="20%" class="tdmain">
                                	Picture
                                </td>
                                <td class="tdmain">
                                	Employee Details
                                </td>
                                <td width="20%" class="tdmain">
                                	Crime/Offence Committed
                                </td>
                                <td width="15%" class="tdmain">
                                	Date posted
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
								
								if($result['origin'] == 2)
								{
									$user = mysql_fetch_array(mysql_query("SELECT names FROM user_accounts_police WHERE userid = '".$result['userid']."'"));
									
									$sourcenames = "POLICE: ".$user['names'];
								}
								else
								{
									$user = mysql_fetch_array(mysql_query("SELECT companynames FROM user_accounts_companies WHERE userid = '".$result['userid']."'"));
									
									$sourcenames = $user['companynames'];
								}
								
								if($result['mname'] != "")
								{
									$middle = " ".$result['mname']." ";
								}
								else
								{
									$middle = " ";	
								}
								
								$names = $result['fname'].$middle.$result['lname'];// echo "<pre>"; print_r($result);
							?>
                            <tr class="<?php echo $row; ?>">
                            	<td class="tdother">
                                	<b><?php echo $counter; ?></b>
                                </td>
                                <td class="tdother">
                                	<?php
                                    if($result['picture'] != "")
									{
										$image = getimagesize("../file_loads/".$result['picture']);
									  ?>
                                    	<a class="fancybox fancybox.ajax" href="../other_files/thisemployee.php?i=<?php echo base64_encode($result['id']); ?>" title="Details of employee - <?php echo $names; ?>">
                                        	<img src="../file_loads/<?php echo $result['picture']; ?>" width="<?php echo $image[0]; ?>" height="<?php echo $image[1]; ?>" border="0">
                                       	</a>
                                  	<?php
									}
									else
									{
									?>
                                    	<font color="red">NO Picture</font> <b>*</b>
                                        <br><br> 
                                        <a href="../user_accounts/hr_employee.php?p=<?php echo base64_encode($result['id']); ?>" class="links" title="Upload Picture for - <?php echo $names; ?>">Upload Picture Now</a>
                                        <br />
                                    <?php		
									}
									?>
                                </td>
                                <td class="tdother">
                                	<table border="0" width="100%" cellpadding="0" cellspacing="0">
										<tr>
											<td align="right">
                                            	Names: &nbsp;
                                            </td>
                                            <td align="left">
												<a href="#" class="links" title="View Profile - <?php echo $names; ?>"><?php echo $names; ?></a>
                                           	</td>
                                      	</tr>
                                        <tr>
											<td style="padding-top:5px;" align="right">
                                            	System ID: &nbsp;
                                            </td>
                                            <td style="padding-top:5px;">
												<?php echo "#".$result['randomid']; ?>
                                           	</td>
                                      	</tr>
                                        <tr>
											<td width="20%" style="padding-top:5px;" align="right">
                                            	Status: &nbsp;
                                            </td>
                                            <td style="padding-top:5px;">
												<?php 
												
												if($result['status'] == 1)
												{
													echo "<font color=\"green\"><b>Listed</b></font>";
												}
												else
												{
													echo "<font color=\"red\"><b>Not Listed</b></font>";	
												}
												
												?>
                                           	</td>
                                      	</tr>
                                  	</table>
                                </td>
                                <td class="tdother">
                                	<?php echo $result['hrcomment']; ?>
                                </td>
                                <td class="tdother">
                                	<?php echo date("jS - F - Y", $result['date_posted']); ?>
                                </td>
                                
                            </tr>
                            <tr class="<?php echo $row; ?>">
                            	<td class="tdother">
                                </td>
                                <td class="tdother" colspan="2">
                                	Posted By: &nbsp; <a class="fancybox fancybox.ajax" href="../other_files/thiscompany.php?task=<?php echo $result['origin']; ?>&i=<?php echo base64_encode($result['userid']); ?>" id="links" title="Details - <?php echo $sourcenames; ?>"><?php echo $sourcenames; ?></a>
                                </td>
                                <td class="tdother">
                                </td>
                                <td align="center" class="tdother">
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
                	<td style="padding-top:10px; padding-bottom:350px;" colspan="2">
                    	<i><b>0</b> results found!</i>
                    </td>
                </tr>
                <?php		
				}
				?>
            </table>
        </td>
    </tr>
</table>
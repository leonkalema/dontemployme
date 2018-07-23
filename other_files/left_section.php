<?php

	if($thispage[3] == "index.php")
	{
		############
		#HR Queries
		############
		#Get featured
		$f_qry1 = mysql_query("SELECT f.hrid, p.id, p.userid, p.randomid, p.picture, p.picture, p.fname, p.mname, p.lname, p.occupation, p.hrcomment FROM featured_lists f, persons_list p, running_list l WHERE '".$timecheck."' >= l.startdate && '".$timecheck."' <= l.enddate && p.id = f.hrid && p.picture != '' && f.policeid = 0 && p.status = 1");
		
		$f_num1 = mysql_num_rows($f_qry1);
		
		if($f_num1 == 0)
		{
			#Get random and feature it for 24 hrs	
			
			$sday = date("d")+1;
	
			$smonth = date("m");
			
			$syear = date("Y");
			
			$endtimeset = mktime(0, 0, 0, $smonth, $sday, $syear);
			
			$starttime = $timecheck;
			
			$endtime = $endtimeset;			
			
			//Get paid company en listing is meant to be running and with in selected days then get random
			$find = mysql_query("SELECT p.id FROM persons_list p, user_accounts_companies a, running_list l WHERE p.userid = a.userid && l.personid = p.id && l.userid = a.userid && '".$timecheck."' >= l.startdate && '".$timecheck."' <= l.enddate ORDER BY RAND() LIMIT 1");
			
			$findrandom = mysql_fetch_array($find); 
			
			//insert into featured_lists table			
			if($findrandom['id'] != 0)
			{
				mysql_query("INSERT INTO featured_lists (hrid, policeid, starttime, endtime) VALUES ('".$findrandom['id']."', 0, '".$starttime."', '".$endtime."')");
			}
			
			
			$f_qry1 = mysql_query("SELECT f.hrid, p.id, p.userid, p.randomid, p.picture, p.fname, p.mname, p.lname, p.occupation, p.hrcomment FROM featured_lists f, persons_list p, running_list l WHERE '".$timecheck."' >= l.startdate && '".$timecheck."' <= l.enddate && p.id = f.hrid && p.picture != '' && f.policeid = 0 && p.status = 1");
		
			$f_num1 = mysql_num_rows($f_qry1);
		}
		
		
		############
		#POLICE Queries
		############
		#Get featured
		$f_qry2 = mysql_query("SELECT f.policeid, p.id, p.userid, p.randomid, p.picture, p.fname, p.mname, p.lname, p.occupation, p.hrcomment FROM featured_lists f, persons_list p, running_list l WHERE '".$timecheck."' >= l.startdate && '".$timecheck."' <= l.enddate && p.id = f.policeid && p.picture != '' && f.hrid = 0 && p.status = 1");
		
		$f_num2 = mysql_num_rows($f_qry2);
		
		if($f_num2 == 0)
		{
			#Get random and feature it for 24 hrs	
			
			$sday = date("d")+1;
	
			$smonth = date("m");
			
			$syear = date("Y");
			
			$endtimeset = mktime(0, 0, 0, $smonth, $sday, $syear);
			
			$starttime = $timecheck;
			
			$endtime = $endtimeset;			
			
			//Get POLICE wanted persons en listing is meant to be running and with in selected days then get random
			$find2 = mysql_query("SELECT p.id FROM persons_list p, user_accounts_police a, running_list l WHERE p.userid = a.userid && l.personid = p.id && l.userid = a.userid && '".$timecheck."' >= l.startdate && '".$timecheck."' <= l.enddate ORDER BY RAND() LIMIT 1");
			
			$findrandom2 = mysql_fetch_array($find2); 
			
			//insert into featured_lists table			
			if($findrandom2['id'] != 0)
			{
				mysql_query("INSERT INTO featured_lists (hrid, policeid, starttime, endtime) VALUES (0, '".$findrandom2['id']."', '".$starttime."', '".$endtime."')");
			}
			
			
			$f_qry2 = mysql_query("SELECT f.policeid, p.id, p.userid, p.randomid, p.picture, p.fname, p.mname, p.lname, p.occupation, p.hrcomment FROM featured_lists f, persons_list p, running_list l WHERE '".$timecheck."' >= l.startdate && '".$timecheck."' <= l.enddate && p.id = f.policeid && p.picture != '' && f.hrid = 0 && p.status = 1");
		
			$f_num2 = mysql_num_rows($f_qry2);
		} 
		
		
		//Webpage
		$webpage = mysql_fetch_array(mysql_query("SELECT content FROM website_pages WHERE location = 'home'"));
	?>
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
    	<tr>
        	<td colspan="2" align="left">
            	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <img src="../images/do_best.jpg" width="182" height="25" border="0">
                        </td>
                    </tr>
                    <tr>
                    	<td style="padding-top:10px;">
                        	<?php 
							
							echo substr(strip_tags($webpage['content']), 0, 300); 
							
							?>...<a href="../home/what_we_do_best.php" class="links" title="Read More">Read More</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
        	<td align="left" width="50%" valign="top">
            	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="padding-top:10px;">
                            <img src="../images/hr_f.jpg" width="182" height="25" border="0">
                        </td>
                    </tr>
                    <tr>
                    	<td style="padding-top:10px;">
                        	<table border="0" width="99%" cellpadding="0" cellspacing="0">
							<?php
							if($f_num1 != 0)
							{
								$result1 = mysql_fetch_array($f_qry1); //echo "<pre>"; print_r($result1);
								
								$company = mysql_fetch_array(mysql_query("SELECT companynames FROM user_accounts_companies WHERE userid = '".$result1['userid']."'"));
							
								if($result1['mname'] != "")
								{
									$middle = " ".$result1['mname']." ";
								}
								else
								{
									$middle = " ";	
								}
								
								$names = $result1['fname'].$middle.$result1['lname'];
							?>
                            <tr>
                            	<td valign="top" colspan="2">
                                	<b>Names:</b> &nbsp; <?php echo $names; ?>
                                </td>
                            </tr>
                            <tr>
                            	<td valign="top" width="182px">
                                	<?php
                                    if($result1['picture'] != "")
									{
										$image = getimagesize("../file_loads/".$result1['picture']);
									  ?>
                                    	<a href="../home/hr_employees.php?i=<?php echo base64_encode($result1['id']); ?>" title="Read More on - <?php echo $names; ?>">
                                        	<img src="../file_loads/<?php echo $result1['picture']; ?>" width="<?php echo $image[0]; ?>" height="<?php echo $image[1]; ?>" border="0">
                                       	</a>
                                	<?php
									}
									?>
                                </td>
                                <td valign="top">
                                	<b>Position Held</b>
									<br />
									<?php echo $result1['occupation']; ?>
                                    <br /><br />
                                    <b>HR Comment</b>
                                    <br />
                                    <?php echo substr($result1['hrcomment'], 0, 100)." ..."; ?> <a href="../home/hr_employees.php?i=<?php echo base64_encode($result1['id']); ?>" title="Read More on - <?php echo $names; ?>" class="links">Read More</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="left" style="padding-top:10px;">
                                	<b>Posted by: </b><?php echo $company[0]; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="left" style="padding-top:10px;">
                                	View Other <a href="../home/hr_employees.php" class="links" title="View Other HR Employees">HR Employees</a>
                                </td>
                            </tr>
                            <?php	
							}
							else
							{
							?>
                            <tR>
                            	<td>
                                	<i>No entries found under this category!</i>
                                </td>
                            </tR>
                            <?php	
							}
							?>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
            <td align="left" valign="top">
            	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="padding-top:10px;">
                            <img src="../images/police_featured.jpg" width="206" height="25" border="0">
                        </td>
                    </tr>
                    <tr>
                    	<td style="padding-top:10px;">
                        	<table border="0" width="99%" cellpadding="0" cellspacing="0">
							<?php
							if($f_num2 != 0)
							{
								$result2 = mysql_fetch_array($f_qry2);
								
								if($result2['mname'] != "")
								{
									$middle2 = " ".$result2['mname']." ";
								}
								else
								{
									$middle2 = " ";	
								}
								
								$names2 = $result2['fname'].$middle2.$result2['lname'];
							?>
                            <tr>
                            	<td valign="top" colspan="2">
                                	<b>Names:</b> &nbsp; <?php echo $names2; ?>
                                </td>
                            </tr>
                            <tr>
                            	<td valign="top" width="182px">
                                	<?php
                                    if($result2['picture'] != "")
									{
										$image2 = getimagesize("../file_loads/".$result2['picture']);
									  ?>
                                    	<a href="../home/wanted_persons.php?i=<?php echo base64_encode($result2['id']); ?>" title="Read More on - <?php echo $names2; ?>">
                                        	<img src="../file_loads/<?php echo $result2['picture']; ?>" width="<?php echo $image2[0]; ?>" height="<?php echo $image2[1]; ?>" border="0">
                                       	</a>
                                	<?php
									}
									?>
                                </td>
                                <td valign="top">
                                	<b>Occupation</b>
									<br />
									<?php echo $result2['occupation']; ?>
                                    <br /><br />
                                    <b>Crime/Offence Details</b>
                                    <br /><bR />
                                    <?php echo substr($result2['hrcomment'], 0, 100)." ..."; ?> <a href="../home/wanted_persons.php?i=<?php echo base64_encode($result2['id']); ?>" title="Read More on - <?php echo $names2; ?>" class="links">Read More</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="left" style="padding-top:10px;">
                                	<b>Posted by: </b>POLICE
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="left" style="padding-top:10px;">
                                	View Other <a href="../home/wanted_persons.php" class="links" title="View Other WANTED Persons">WANTED Persons</a>
                                </td>
                            </tr>
                            <?php	
							}
							else
							{
							?>
                            <tR>
                            	<td>
                                	<i>No entries found under this category!</i>
                                </td>
                            </tR>
                            <?php	
							}
							?>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?php		
	}
	elseif($thispage[3] == "register_here.php")
	{
	?>
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
    	<tr>
        	<td colspan="2" align="left">
            	<form name="registration" method="post" autocomplete="off" action="#register" onsubmit="return Empty('companynames', 'Please enter company name', 'error_msg2') && Empty('contactnames', 'Please enter names of contact person', 'error_msg2') && Empty('username', 'Please enter username', 'error_msg2') && Empty('password1', 'Please enter password', 'error_msg2') && Empty('password2', 'Please re-enter password', 'error_msg2') && Empty('address', 'Please enter company address', 'error_msg2') && Empty('phoneno', 'Please enter company phone number', 'error_msg2') && Empty('emailid', 'Please enter company email address', 'error_msg2')  && checkEmail('emailid','emailcheck') && registerUser('companynames', 'contactnames', 'username', 'password1', 'address', 'phoneno', 'emailid', 'error_msg2');">
                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td colspan="2">
                            <img src="../images/register_here.jpg" width="95" height="24" border="0">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="error_msg2"></div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="padding-top:10px;">
                            Company Name: &nbsp;
                        </td>
                        <td style="padding-top:10px;">
                            <input type="text" name="companynames" id="companynames" class="logintext" size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="padding-top:10px;">
                            Full names: &nbsp;
                        </td>
                        <td style="padding-top:10px;">
                            <input type="text" name="contactnames" id="contactnames" class="logintext" size="50"> [ Contact Person ]
                        </td>
                    </tr>
                    <tr>
                        <td width="20%" align="right" style="padding-top:10px;">
                            Username: &nbsp;
                        </td>
                        <td style="padding-top:10px;">
                            <input type="text" name="username" id="username" class="logintext" size="50" onblur="return Empty('username', 'Please enter username', 'username_error') && checkUsername('username', 'username_error');">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" style="padding-top:10px;">
                            <div id="username_error"></div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="padding-top:10px;">
                            Password: &nbsp;
                        </td>
                        <td style="padding-top:10px;">
                            <input type="password" name="password1" id="password1" class="logintext" size="50">
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="padding-top:10px;">
                            Re-enter password: &nbsp;
                        </td>
                        <td style="padding-top:10px;">
                            <input type="password" name="password2" id="password2" class="logintext" onblur="return Empty('password1', 'Please enter password', 'password_error') && Empty('password2', 'Please re-enter password', 'password_error') && checkPasswordMatch('password1','password2', 'password_error') && checkPwLength('password1', 'password_error');" size="50">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" style="padding-top:10px;">
                            <div id="password_error"></div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="padding-top:10px; vertical-align:top;">
                            Company Address: &nbsp;
                        </td>
                        <td style="padding-top:10px; vertical-align:top;">
                            <textarea cols="66" rows="10" name="address" id="address" class="logintext"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="padding-top:10px;">
                            Company Phone No: &nbsp;
                        </td>
                        <td style="padding-top:10px;">
                            <input type="text" name="phoneno" id="phoneno" maxlength="10" class="logintext" size="50" onKeyDown="return onlyNumbers('phoneno', 'error_msg2');">
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="padding-top:10px;">
                            Company Email: &nbsp;
                        </td>
                        <td style="padding-top:10px;">
                            <input type="text" name="emailid" id="emailid" maxlength="30" class="logintext" size="50"> <span id="emailcheck"></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="padding-top:10px;">
                            
                        </td>
                        <td style="padding-top:10px; padding-bottom:30px;">
                            <input type="image" src="../images/register_now.jpg" width="88" height="26" align="absmiddle" class="nostyle" value="Register Now"> &nbsp;&nbsp;&nbsp;&nbsp; <a href="../home/index.php" class="links" title="Sign In Here">Sign In Here</a>
                        </td>
                    </tr>
                </table>
                </form>
            </td>
        </tr>
    </table>
    <?php		
	}
	elseif($thispage[3] == "privacy_policy.php")
	{
		//Webpage
		$webpage = mysql_fetch_array(mysql_query("SELECT content FROM website_pages WHERE location = 'home'"));
	?>
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
    	<tr>
        	<td colspan="2" align="left">
            	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <img src="../images/privacy_p.jpg" width="95" height="24" border="0">
                        </td>
                    </tr>
                    <tr>
                    	<td style="padding-top:10px;">
                        	<?php echo strip_tags($webpage['content']); ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?php		
	}
	elseif($thispage[3] == "what_we_do_best.php")
	{
		//Webpage
		$webpage = mysql_fetch_array(mysql_query("SELECT content FROM website_pages WHERE location = 'best'"));
	?>
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
    	<tr>
        	<td colspan="2" align="left">
            	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <img src="../images/do_best.jpg" width="182" height="25" border="0">
                        </td>
                    </tr>
                    <tr>
                    	<td style="padding-top:10px;">
                        	<?php echo strip_tags($webpage['content']); ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?php		
	}
	elseif($thispage[3] == "services.php")
	{
		//Webpage
		$webpage = mysql_fetch_array(mysql_query("SELECT content FROM website_pages WHERE location = 'services'"));
	?>
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
    	<tr>
        	<td colspan="2" align="left">
            	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <img src="../images/our_services.gif" width="165" height="24" border="0">
                        </td>
                    </tr>
                    <tr>
                    	<td style="padding-top:10px;">
                        	<?php echo strip_tags($webpage['content']); ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?php		
	}
	elseif($thispage[3] == "howtopay.php")
	{
		//Webpage
		$webpage = mysql_fetch_array(mysql_query("SELECT content FROM website_pages WHERE location = 'howtopay'"));
		
		$currency = mysql_fetch_array(mysql_query("SELECT * FROM currency_setup WHERE inuse = 1"));
		
		$qry = mysql_query("SELECT d.id, d.names, r.paymentrate FROM payment_rates r, payment_durations d WHERE r.durationid = d.id ORDER BY d.duration ASC");
	?>
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
    	<tr>
        	<td colspan="2" align="left">
            	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <img src="../images/howtopay.jpg" width="180" height="24" border="0">
                        </td>
                    </tr>
                    <tr>
                    	<td style="padding-top:10px;">
                        	<?php echo strip_tags($webpage['content']); ?>
                        </td>
                    </tr>
                    <tr>
                    	<td style="padding-top:10px;">
                        	<b>Payment Details</b>
                        </td>
                    </tr>
                    <?php
                    while($result = mysql_fetch_array($qry))
				 	{
					 $thiscost = "";
					
						if($currency['currency_abbrev_position'] == 1)
						{
							$prev = $currency['currency_abbrev'];
						}
							
						if($currency['symbol_position'] == 1)
						{
							$prev =  " ".$currency['symbol'];
						}
							
						$cost = " ".number_format($result['paymentrate'], "0", "", ","); 
							
						if($currency['symbol_position'] == 2)
						{
							$after =  $currency['symbol'];
						}
							
						if($currency['currency_abbrev_position'] == 2)
						{
							$after =  $currency['currency_abbrev'];
						}
						
						$rates = $currency['currency_abbrev'].$prev.$cost.$after;
				 ?>
				 <tr>
	 				<td style="padding-top:10px; padding-bottom:10px;">
						<?php echo $result['names']." at a cost of  ".$rates; ?>
                   	</td>
               	</tr>
				 <?php	
                 }
                ?>
                </table>
            </td>
        </tr>
    </table>
    <?php		
	}
	elseif($thispage[3] == "contact_us.php")
	{
		//Webpage
		$webpage = mysql_fetch_array(mysql_query("SELECT content FROM website_pages WHERE location = 'contact'"));
	?>
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
    	<tr>
        	<td colspan="2" align="left">
            	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <img src="../images/contact_us.gif" width="165" height="24" border="0">
                        </td>
                    </tr>
                    <tr>
                    	<td style="padding-top:10px;">
                        	<?php echo strip_tags($webpage['content']); ?>
                        </td>
                    </tr>
                    <tr>
                    	<td style="padding-top:10px;">
                        	<table border="0" width="100%" cellpadding="2" cellspacing="2">
					<tr>
						<td style="padding-top:3px;">
							<b class="greenbigtitle">Send Us A Quick Feedback</b>
						</td>
					</tr>
					<tr>
						<td style="padding-top:8px;" class="formatcontent">
							<form autocomplete = "off" method="post" action="xmlsendx==" onsubmit="return Empty('names', 'Please enter your names', 'showerror') && Empty('email', 'Please enter email address', 'showerror') && Empty('message', 'Please enter your message', 'showerror') && Empty('security_txt', 'Please enter security text', 'showerror') && sendMessage('names', 'email', 'message', 'security_txt', 'showerror');">
                            <table border="0" width="100%" cellpadding="2" cellspacing="2">
                                <tr>
                                    <td>
                                 </td>
                                   <td align="left">
                                         <div id="showerror"></div>
                                       </td>
                                  </tr>
                                 <tr>
                                   <td width="20%" align="right">
                                   Names: &nbsp;
                                  </td>
                                 <td>
                                  <input type="text" name="names" id="names" size="42" />
                                 </td>
                                    </tr>
                                 <tr>
                                     <td align="right" valign="top">
                                       Email: &nbsp;
                                   </td>
                                 <td class="justifythis">
                                     <input type="text" name="email" id="email" size="42" onblur="return Empty('email','Please enter email address','showerror') && validateEmailAddress('email', 'showerror');" /> 
                                      <br />
                                    <br />
                                   <strong>NOTE:</strong> Email addresses entered are kept confidential and not submitted to any other party.
                                  </td>
                                   </tr>
                                   <tr>
                                      <td align="right" valign="top">
                                     Message: &nbsp;
                                     </td>
                                   <td>
                                    <textarea cols="39" rows="13" name="message" id="message"></textarea>
                                   </td>
                                      </tr>
                                    <tr>
                                     <td>
                                    </td>
                                         <td align="left">
                                        	<div id="reloadme">
                                            	<img src="../other_files/my_captcha.php" />
                                          	</div>
                                        <br />
                                        <br />
                                       <input type="text" name="security_txt" id="security_txt" size="30" maxlength="5" /> &nbsp; Human Check: Please enter the above code :)
                                        </td>
                                      </tr>
                                       <tr>
                                     <td>
                                       </td>
                                         <td align="left">
                                      <input type="submit" value="Send Message" />
                                      </td>
                                        </tr>
                                  </table>
</form>
						</td>
					</tr>
				</table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?php		
	}
	elseif($thispage[3] == "faq.php")
	{
		//Webpage
		$webqry = mysql_query("SELECT title, content FROM website_pages WHERE location = 'faqs'");
	?>
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
    	<tr>
        	<td colspan="2" align="left">
            	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td colspan="2">
                            <img src="../images/faqs.gif" width="165" height="24" border="0">
                        </td>
                    </tr>
                    <?php
                    if(mysql_num_rows($webqry) != 0)
					{
						while($webpage = mysql_fetch_array($webqry))
						{
					?>
                    <tr>
                    	<td width="3%" valign="top" style="padding-top:10px;">
                        	<b>#</b>
                        </td>
                        <td style="padding-top:10px;">
                        	<?php echo "<b>".$webpage['title']."</b><br><br>".strip_tags($webpage['content']); ?>
                        </td>
                    </tr>
                    <?php
						}
					}
					else
					{
					?>
                    <tr>
                    	<td width="3%" valign="top" style="padding-top:10px;">
                        	<b>#</b>
                        </td>
                        <td style="padding-top:10px;">
                        	<i>No content uploaded!</i>
                        </td>
                    </tr>
                    <?php		
					}
					?>
                </table>
            </td>
        </tr>
    </table>
    <?php		
	}
	elseif($thispage[3] == "terms_and_conditions.php")
	{
		//Webpage
		$webpage = mysql_fetch_array(mysql_query("SELECT content FROM website_pages WHERE location = 'terms'"));
	?>
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
    	<tr>
        	<td colspan="2" align="left">
            	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <img src="../images/terms_and_cons.jpg" width="129" height="24" border="0">
                        </td>
                    </tr>
                    <tr>
                    	<td style="padding-top:10px;">
                        	<?php echo strip_tags($webpage['content']); ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?php		
	}
	elseif($thispage[3] == "hr_employees.php")
	{
		$timecheck = mktime();
		
		if($_GET['i'])
		{
			$id = base64_decode($_GET['i']);
		
			$f_qry1 = mysql_query("SELECT * FROM persons_list WHERE id = '".$id."'");
		}
		else
		{
			$f_qry1 = mysql_query("SELECT p.id, p.userid, p.randomid, p.picture, p.picture, p.fname, p.mname, p.lname, p.occupation, p.hrcomment FROM persons_list p, user_accounts_companies a, running_list l WHERE p.userid = a.userid && l.personid = p.id && l.userid = a.userid && '".$timecheck."' >= l.startdate && '".$timecheck."' <= l.enddate && p.origin = 1 ORDER BY l.date_posted DESC");
		
			$f_num1 = mysql_num_rows($f_qry1);
		}
	?>
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
    	<tr>
        	<td colspan="2" align="left">
            	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <img src="../images/hr_e.jpg" width="180" height="24" border="0">
                        </td>
                    </tr>
                    <?php
                    if($_GET['i'])
					{
						$result1 = mysql_fetch_array($f_qry1);
					?>
                    <tr>
                    	<td style="padding-top:10px;">
                        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                            	<?php
                                
                                 //echo "<pre>"; print_r($result1);
                                    
                                 $company = mysql_fetch_array(mysql_query("SELECT companynames FROM user_accounts_companies WHERE userid = '".$result1['userid']."'"));
                                
                                 if($result1['mname'] != "")
                                 {
                                	$middle = " ".$result1['mname']." ";
                                 }
                                 else
                                 {
                                    $middle = " ";	
                                 }
                                    
                                 $names = $result1['fname'].$middle.$result1['lname'];
                                ?>
                                <tr>
                                    <td valign="top" colspan="2" style="padding-top:10px; padding-bottom:10px;">
                                        <b>Full Names:</b> &nbsp; <?php echo $names; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" width="182px">
                                        <?php
                                        if($result1['picture'] != "")
                                        {
                                            $image = getimagesize("../file_loads/".$result1['picture']);
                                          ?>
                                            <img src="../file_loads/<?php echo $result1['picture']; ?>" alt="<?php echo $names; ?>" title="HR Employee - <?php echo $names; ?>" width="<?php echo $image[0]; ?>" height="<?php echo $image[1]; ?>" border="0">
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td valign="top">
                                        <b>First Name: </b>
                                        
                                        <?php echo $result1['fname']; ?>
                                        <br /><br />
                                        <b>Middle Name: </b>
                                        
                                        <?php echo $result1['mname']; ?>
                                        <br /><br />
                                        <b>Last Name: </b>
                                        
                                        <?php echo $result1['lname']; ?>
                                        <?php
                                        if($result1['alias1'] != "")
										{
										?>
                                        <br /><br />
                                        <b>Alias 1: </b>
                                        
                                        <?php echo $result1['alias1']; ?>
                                        <?php
										}
										?>
                                        <br /><br />
                                        <b>Position Held: </b>
                                        <?php echo $result1['occupation']; ?>
                                        <br /><br />
                                        <b>HR Comment</b>
                                        <br />
                                        <?php echo $result1['hrcomment']; ?>
                                        <br /><br />
                                        <b>Posted By: </b>
                                        
                                        </b><?php echo $company[0]; ?>
                                    </td>
                                </tr>
                                <tr>
                                	<td style="padding-top:10px;">
                                    	View Other <a href="../home/hr_employees.php" title="View Other HR Employees" class="links">HR Employees</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <?php	
					}
					else
					{
					?>
                    <tr>
                    	<td style="padding-top:10px;">
                        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                            <?php
							if($f_num1 != 0)
							{
							?>
                            <tr>
                            	<td>
                                	<table border="0" width="100%" cellpadding="0" cellspacing="0">
										<?php 
                                        while($result1 = mysql_fetch_array($f_qry1))
                                        {
                                        	// $result1 = mysql_fetch_array($f_qry1); //echo "<pre>"; print_r($result1);
								
											$company = mysql_fetch_array(mysql_query("SELECT companynames FROM user_accounts_companies WHERE userid = '".$result1['userid']."'"));
										
											if($result1['mname'] != "")
											{
												$middle = " ".$result1['mname']." ";
											}
											else
											{
												$middle = " ";	
											}
											
											$names = $result1['fname'].$middle.$result1['lname'];
										?>
										<tr>
                                        	<td width="3%">
                                            	<b>##</b>
                                        	</td>
											<td valign="top" colspan="2">
												<b>Names:</b> &nbsp; <?php echo $names; ?>
											</td>
										</tr>
										<tr>
											<td>
                                            </td>
                                            <td valign="top" width="182px">
												<?php
												if($result1['picture'] != "")
												{
													$image = getimagesize("../file_loads/".$result1['picture']);
												  ?>
													<a href="../home/hr_employees.php?i=<?php echo base64_encode($result1['id']); ?>" title="Read More on - <?php echo $names; ?>">
														<img src="../file_loads/<?php echo $result1['picture']; ?>" width="<?php echo $image[0]; ?>" height="<?php echo $image[1]; ?>" border="0">
													</a>
												<?php
												}
												?>
											</td>
											<td valign="top">
												<b>Position Held</b>
												<br />
												<?php echo $result1['occupation']; ?>
												<br /><br />
												<b>HR Comment</b>
												<br />
												<?php echo substr($result1['hrcomment'], 0, 100)." ..."; ?> <a href="../home/hr_employees.php?i=<?php echo base64_encode($result1['id']); ?>" title="Read More on - <?php echo $names; ?>" class="links">Read More</a>
											</td>
										</tr>
										<tr>
											<td>
                                            </td>
                                            <td colspan="2" align="left" style="padding-top:10px;">
												<b>Posted by: </b><?php echo $company[0]; ?>
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
							else
							{
							?>
                            <tr>
                            	<td>
                                	<i>No entries found under this category!</i>
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
            </td>
        </tr>
    </table>
    <?php		
	}
	elseif($thispage[3] == "wanted_persons.php")
	{
		$timecheck = time();
		
		if($_GET['i'])
		{
			$id = base64_decode($_GET['i']);
		
			$f_qry1 = mysql_query("SELECT * FROM persons_list WHERE id = '".$id."'");
		}
		else
		{
			$f_qry1 = mysql_query("SELECT p.id, p.userid, p.randomid, p.picture, p.picture, p.fname, p.mname, p.lname, p.occupation, p.hrcomment FROM persons_list p, running_list l WHERE l.personid = p.id && '".$timecheck."' >= l.startdate && '".$timecheck."' <= l.enddate && p.origin = 2 ORDER BY l.date_posted DESC") or die(mysql_error());
		
			$f_num1 = mysql_num_rows($f_qry1);
		}
	?>
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
    	<tr>
        	<td colspan="2" align="left">
            	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <img src="../images/wanted_p.jpg" width="180" height="24" border="0">
                        </td>
                    </tr>
                    <?php
                    if($_GET['i'])
					{
						$result1 = mysql_fetch_array($f_qry1);
					?>
                    <tr>
                    	<td style="padding-top:10px;">
                        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                            	<?php
                                
                                 //echo "<pre>"; print_r($result1);
                                    
                                 $company = mysql_fetch_array(mysql_query("SELECT companynames FROM user_accounts_companies WHERE userid = '".$result1['userid']."'"));
                                
                                 if($result1['mname'] != "")
                                 {
                                	$middle = " ".$result1['mname']." ";
                                 }
                                 else
                                 {
                                    $middle = " ";	
                                 }
                                    
                                 $names = $result1['fname'].$middle.$result1['lname'];
                                ?>
                                <tr>
                                    <td valign="top" colspan="2" style="padding-top:10px; padding-bottom:10px;">
                                        <b>Full Names:</b> &nbsp; <?php echo $names; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" width="182px">
                                        <?php
                                        if($result1['picture'] != "")
                                        {
                                            $image = getimagesize("../file_loads/".$result1['picture']);
                                          ?>
                                            <img src="../file_loads/<?php echo $result1['picture']; ?>" alt="<?php echo $names; ?>" title="HR Employee - <?php echo $names; ?>" width="<?php echo $image[0]; ?>" height="<?php echo $image[1]; ?>" border="0">
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td valign="top">
                                        <b>First Name: </b>
                                        
                                        <?php echo $result1['fname']; ?>
                                        <br /><br />
                                        <b>Middle Name: </b>
                                        
                                        <?php echo $result1['mname']; ?>
                                        <br /><br />
                                        <b>Last Name: </b>
                                        
                                        <?php echo $result1['lname']; ?>
                                        <?php
                                        if($result1['alias1'] != "")
										{
										?>
                                        <br /><br />
                                        <b>Alias 1: </b>
                                        
                                        <?php echo $result1['alias1']; ?>
                                        <?php
										}
										?>
                                        <br /><br />
                                        <b>Occupation: </b>
                                        <?php echo $result1['occupation']; ?>
                                        <br /><br />
                                        <b>Crime/Offence Details</b>
                                        <br />
                                        <?php echo $result1['hrcomment']; ?>
                                        <br /><br />
                                        <b>Posted By: </b>
                                        
                                        </b>POLICE
                                    </td>
                                </tr>
                                <tr>
                                	<td style="padding-top:10px;">
                                    	View Other <a href="../home/wanted_persons.php" title="View Other WANTED Persons" class="links">WANTED Persons</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <?php	
					}
					else
					{
					?>
                    <tr>
                    	<td style="padding-top:10px;">
                        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                            <?php
							if($f_num1 != 0)
							{
							?>
                            <tr>
                            	<td>
                                	<table border="0" width="100%" cellpadding="0" cellspacing="0">
										<?php 
                                        while($result1 = mysql_fetch_array($f_qry1))
                                        {
                                        	// $result1 = mysql_fetch_array($f_qry1); //echo "<pre>"; print_r($result1);
								
											$company = mysql_fetch_array(mysql_query("SELECT companynames FROM user_accounts_companies WHERE userid = '".$result1['userid']."'"));
										
											if($result1['mname'] != "")
											{
												$middle = " ".$result1['mname']." ";
											}
											else
											{
												$middle = " ";	
											}
											
											$names = $result1['fname'].$middle.$result1['lname'];
										?>
										<tr>
                                        	<td width="3%">
                                            	<b>##</b>
                                        	</td>
											<td valign="top" colspan="2">
												<b>Names:</b> &nbsp; <?php echo $names; ?>
											</td>
										</tr>
										<tr>
											<td>
                                            </td>
                                            <td valign="top" width="182px">
												<?php
												if($result1['picture'] != "")
												{
													$image = getimagesize("../file_loads/".$result1['picture']);
												  ?>
													<a href="../home/wanted_persons.php?i=<?php echo base64_encode($result1['id']); ?>" title="Read More on - <?php echo $names; ?>">
														<img src="../file_loads/<?php echo $result1['picture']; ?>" width="<?php echo $image[0]; ?>" height="<?php echo $image[1]; ?>" border="0">
													</a>
												<?php
												}
												?>
											</td>
											<td valign="top">
												<b>Occupation</b>
												<br />
												<?php echo $result1['occupation']; ?>
												<br /><br />
												<b>Crime/Offence Details</b>
												<br />
												<?php echo substr($result1['hrcomment'], 0, 100)." ..."; ?> <a href="../home/wanted_persons.php?i=<?php echo base64_encode($result1['id']); ?>" title="Read More on - <?php echo $names; ?>" class="links">Read More</a>
											</td>
										</tr>
										<tr>
											<td>
                                            </td>
                                            <td colspan="2" align="left" style="padding-top:10px;">
												<b>Posted by: </b>POLICE
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
							else
							{
							?>
                            <tr>
                            	<td>
                                	<i>No entries found under this category!</i>
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
            </td>
        </tr>
    </table>
    <?php		
	}
	elseif($thispage[3] == "searchoursite.php")
	{
		$timecheck = mktime();
		
		$searchterm = inputCleaner($_GET['search_q']);
		
		$s_qry = mysql_query("SELECT p.id, p.origin, p.userid, p.randomid, p.picture, p.picture, p.fname, p.mname, p.lname, p.occupation, p.hrcomment FROM persons_list p, running_list l WHERE 
		
		
		l.personid = p.id && '".$timecheck."' >= l.startdate && '".$timecheck."' <= l.enddate && p.fname LIKE '%".$searchterm."%'
		
		|| 
		
		l.personid = p.id && '".$timecheck."' >= l.startdate && '".$timecheck."' <= l.enddate && p.mname LIKE '%".$searchterm."%'
		
		|| 
		
		l.personid = p.id && '".$timecheck."' >= l.startdate && '".$timecheck."' <= l.enddate && p.lname LIKE '%".$searchterm."%'
		
		||
		
		l.personid = p.id && '".$timecheck."' >= l.startdate && '".$timecheck."' <= l.enddate && p.alias1 LIKE '%".$searchterm."%'
		
		 
		 
		 ORDER BY l.date_posted DESC");

		
		$s_num = mysql_num_rows($s_qry);
	?>
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
    	<tr>
        	<td colspan="2" align="left">
            	<table border="0" width="98%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <img src="../images/search_results.gif" width="165" height="24" border="0">
                        </td>
                        <td align="right">
                        	
                        </td>
                    </tr>
                    <tr>
                        <td width="90%" style="padding-top:10px;">
                            Search For: <i><b><?php echo $searchterm; ?></b></i>
                        </td>
                        <td align="right" style="padding-top:10px;">
                        	Found: <b><?php echo $s_num; ?></b>
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="2" style="padding-top:10px;">
                        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                            	<?php
                                while($search = mysql_fetch_array($s_qry))
								{
									if($search['mname'] != "")
									 {
										$middle = " ".$search['mname']." ";
									 }
									 else
									 {
										$middle = " ";	
									 }
										
									 $names = $search['fname'].$middle.$search['lname'];
								?>
                                <tr>
                                	<td width="3%" valign="top" style="padding-top:10px;">
                                    	<b>##</b>
                                    </td>
                                    <td style="padding-top:10px;">
                                    	<?php echo "<b>".$names."</b><br>".substr($search['hrcomment'], 0, 200)." ..."; ?>
                                    </td>
                                </tr>
                                <tr>
                                	<td width="3%">
                                    	
                                    </td>
                                    <td style="padding-top:2px;">
                                    	<?php
                                        if($search['origin'] == 1)
										{
										?>
                                        <a href="../home/hr_employees.php?i=<?php echo base64_encode($search['id']); ?>" class="links" title="Read More">Read More</a>
                                        <?php
										}
										else
										{
										?>
                                        <a href="../home/wanted_persons.php?i=<?php echo base64_encode($search['id']); ?>" class="links" title="Read More">Read More</a>
                                        <?php	
										}										
										?>
                                    </td>
                                </tr>
                                <?php
								}
								?>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?php		
	}

?>

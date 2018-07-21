<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td>
        	<a href="../user_accounts/index.php" class="toplinks" title="DASH BOARD">DASH BOARD</a> <b> :: WANTED Persons</b> [ <a href="../user_accounts/wanted_persons.php?t=add" class="links" title="Add WANTED Person">Add WANTED Person</a> ] [ <a href="../user_accounts/wanted_persons.php?t=view" class="links" title="View WANTED Persons">View WANTED Persons</a> ] 
        </td>
	</tr>
	<?php 

	if($_GET['t'] == "add" || $_GET['edit'])
	{
		if($_GET['edit'])
		{
			$id = base64_decode($_GET['edit']);
	
			$edit = mysql_fetch_array(mysql_query("SELECT * FROM persons_list WHERE id = '".$id."'")); //echo "<pre>"; print_r($edit);
			
			if($edit['mname'] != "")
			{
				$middle = " ".$edit['mname']." ";
			}
			else
			{
				$middle = " ";	
			}
								
			$names = $edit['fname'].$middle.$edit['lname'];
		}
	?>
	<tr>
		<td>
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-top:10px;">
						<?php
						if($_GET['edit'])
						{
						?>
							<b>Edit HR Employee - </b> <?php echo $names." #".$edit['randomid']; ?>
						<?php	
						}
						else
						{
						?>
							<b>Add HR Employee</b>
						<?php	
						}
						?>
					</td>
				</tr>
                <tr>
                	<td>
                    	<form name="myform" method="post" autocomplete="off" action="xmlupload" onsubmit="return Empty('fname', 'PERSONAL INFORMATION: Please enter first name', 'error_msg2') && Empty('lname', 'PERSONAL INFORMATION: Please enter surname', 'error_msg2') && Empty('alias1', 'PERSONAL INFORMATION: Please enter Alias 1', 'error_msg2') && Empty('phoneno', 'PERSONAL INFORMATION: Please enter phone number', 'error_msg2') && Empty('race', 'PERSONAL INFORMATION: Please enter race', 'error_msg2') && Empty('tribe', 'PERSONAL INFORMATION: Please enter tribe', 'error_msg2') && Empty('pheight', 'PERSONAL INFORMATION: Please enter height', 'error_msg2') && Empty('haircolor', 'PERSONAL INFORMATION: Please enter hair color', 'error_msg2') && Empty('eyecolor', 'PERSONAL INFORMATION: Please enter eye color', 'error_msg2') && Empty('dateofbirth', 'PERSONAL INFORMATION: Please enter date of birth', 'error_msg2') && Empty('fathername', 'FAMILY INFORMATION: Please enter father\'s name', 'error_msg2') && Empty('mothername', 'FAMILY INFORMATION: Please enter mother\'s name', 'error_msg2') && Empty('parentsresidence', 'FAMILY INFORMATION: Please enter parent\'s residence', 'error_msg2') && Empty('countryofbirth', 'RESIDENTIAL INFORMATION: Please enter country of birth', 'error_msg2') && Empty('placeofbirth', 'RESIDENTIAL INFORMATION: Please enter place of birth', 'error_msg2') && Empty('nationality', 'RESIDENTIAL INFORMATION: Please enter nationality', 'error_msg2') && Empty('address', 'RESIDENTIAL INFORMATION: Please enter address', 'error_msg2') && Empty('city', 'RESIDENTIAL INFORMATION: Please enter City/Town', 'error_msg2') && Empty('parish', 'RESIDENTIAL INFORMATION: Please enter parish', 'error_msg2') && Empty('village', 'RESIDENTIAL INFORMATION: Please enter village', 'error_msg2') && Empty('zone', 'RESIDENTIAL INFORMATION: Please enter zone', 'error_msg2') && Empty('occupation', 'ACADEMIC INFORMATION: Please enter occupation', 'error_msg2') && Empty('qualification', 'ACADEMIC INFORMATION: Please enter qualification', 'error_msg2') && Empty('university', 'ACADEMIC INFORMATION: Please enter University Attended', 'error_msg2') && Empty('secondaryschool', 'ACADEMIC INFORMATION: Please enter secondary school', 'error_msg2') && Empty('primaryschool', 'ACADEMIC INFORMATION: Please enter primary school', 'error_msg2') && Empty('hrcomment', 'POLICE INFORMATION: Please enter POLICE Details', 'error_msg2') &&  addoreditThisPerson('fname', 'mname', 'lname', 'alias1', 'alias2', 'alias3', 'phoneno', 'race', 'tribe', 'pheight', 'haircolor', 'eyecolor', 'dateofbirth', 'spousename', 'fathername', 'mothername', 'parentsresidence', 'countryofbirth', 'placeofbirth', 'nationality', 'passportno', 'idcard', 'drivingpermit', 'address', 'streetaddress', 'city', 'parish', 'village', 'zone', 'occupation', 'qualification', 'university', 'secondaryschool', 'primaryschool', 'specialcourse', 'hrcomment', 'editid', 'error_msg2');">
                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                                <td colspan="2">
                                    <div id="error_msg2"></div>
                                </td>
                            </tr>
                            <tr>
                            	<td style="padding-top:7px;">
                                	<div id="page-wrap">
                                		<div id="example-one">
                                            <ul class="nav">
                                                <li class="nav-one"><a href="#personal" class="current">Personal Information</a></li>
                                                <li class="nav-two"><a href="#family">Family Information</a></li>
                                                <li class="nav-three"><a href="#residence">Residencial Information</a></li>
                                                <li class="nav-four"><a href="#academics">Academic Information</a></li>
                                                <li class="nav-five last"><a href="#hr">POLICE Information</a></li>
                                            </ul>
                                            <div class="list-wrap">
                                                <ul id="personal">
                                                    <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                                    	<tr>
                                                            <td align="right" width="18%" style="padding-top:10px;">
                                                                First Name: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="hidden" name="sourceid" id="sourceid" size="50" value = "2" />
                                                                <input type="text" name="fname" id="fname" size="50" value = "<?php echo $edit['fname']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" width="10%" style="padding-top:10px;">
                                                                Middle name: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="mname" id="mname" size="50" value = "<?php echo $edit['mname']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" width="10%" style="padding-top:10px;">
                                                                Surname: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="lname" id="lname" size="50" value = "<?php echo $edit['lname']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" width="10%" style="padding-top:10px;">
                                                                Alias 1: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="alias1" id="alias1" size="50" value = "<?php echo $edit['alias1']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" width="10%" style="padding-top:10px;">
                                                                Alias 2: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="alias2" id="alias2" size="50" value = "<?php echo $edit['alias2']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" width="10%" style="padding-top:10px;">
                                                                Alias 3: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="alias3" id="alias3" size="50" value = "<?php echo $edit['alias3']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Phone number: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px; vertical-align:top;">
                                                                <input type="text" name="phoneno" id="phoneno" size="50" maxlength="10" value = "<?php echo $edit['phoneno']; ?>" onKeyDown="return onlyNumbers('phoneno', 'error_msg2');">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px; vertical-align:top;">
                                                                Gender: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px; vertical-align:top;">
                                                                <input type="radio" name="gender" id="gender" <?php if($_GET['edit']) { if($edit['gender'] == "1") { echo "checked=\"checked\""; } } else { echo "checked=\"checked\""; } ?> value="1" /> Female <input type="radio" name="gender" id="gender" <?php if($_GET['edit']) { if($edit['gender'] == "2") { echo "checked=\"checked\""; } } ?> value="2" /> Male
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Race: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="race" id="race" size="50" value = "<?php echo $edit['race']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Tribe: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="tribe" id="tribe" size="50" value = "<?php echo $edit['tribe']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Height: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="pheight" id="pheight" size="50" value = "<?php echo $edit['pheight']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Hair color: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="haircolor" id="haircolor" size="50" value = "<?php echo $edit['haircolor']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Eye color: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="eyecolor" id="eyecolor" size="50" value = "<?php echo $edit['eyecolor']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Date of Birth: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px; vertical-align:top;">
                                                                <input type="text" name="dateofbirth" id="dateofbirth" size="50" value = "<?php echo $edit['dateofbirth']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Marital Status: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="radio" name="maritalstatus" id="maritalstatus" <?php if($_GET['edit']) { if($edit['maritalstatus'] == "1") { echo "checked=\"checked\""; } } else { echo "checked=\"checked\""; } ?> value="1" /> Married 
                                                                <input type="radio" name="maritalstatus" id="maritalstatus" <?php if($_GET['edit']) { if($edit['maritalstatus'] == "2") { echo "checked=\"checked\""; } } ?> value="2" /> Divorced
                                                                <input type="radio" name="maritalstatus" id="maritalstatus" <?php if($_GET['edit']) { if($edit['maritalstatus'] == "3") { echo "checked=\"checked\""; } } ?> value="3" /> Widower
                                                                <input type="radio" name="maritalstatus" id="maritalstatus" <?php if($_GET['edit']) { if($edit['maritalstatus'] == "4") { echo "checked=\"checked\""; } } ?> value="4" /> Widow
                                                                <input type="radio" name="maritalstatus" id="maritalstatus" <?php if($_GET['edit']) { if($edit['maritalstatus'] == "5") { echo "checked=\"checked\""; } } ?> value="5" /> Single
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Spouse's name: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px; vertical-align:top;">
                                                                <input type="text" name="spousename" id="spousename" size="50" value = "<?php echo $edit['spousename']; ?>" />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </ul>
                                                 
                                                 <ul id="family" class="hide">
                                                    <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                                    	<tr>
                                                            <td align="right" width="18%" style="padding-top:10px;">
                                                                Father's name: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="fathername" id="fathername" size="50" value = "<?php echo $edit['fathername']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Mother's Name: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="mothername" id="mothername" size="50" value = "<?php echo $edit['mothername']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Parents residence: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="parentsresidence" id="parentsresidence" size="50" value = "<?php echo $edit['parentsresidence']; ?>" />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                 </ul>
                                                 
                                                 <ul id="residence" class="hide">
                                                    <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                                    	<tr>
                                                            <td align="right" width="18%" style="padding-top:10px;">
                                                                Country of Birth: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="countryofbirth" id="countryofbirth" size="50" value = "<?php echo $edit['countryofbirth']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Place of Birth: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="placeofbirth" id="placeofbirth" size="50" value = "<?php echo $edit['placeofbirth']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Nationality: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="nationality" id="nationality" size="50" value = "<?php echo $edit['nationality']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Passport No: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="passportno" id="passportno" size="50" value = "<?php echo $edit['passportno']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                ID Card No: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="idcard" id="idcard" size="50" value = "<?php echo $edit['idcard']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Driving Permit No: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="drivingpermit" id="drivingpermit" size="50" value = "<?php echo $edit['drivingpermit']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" width="18%" style="padding-top:10px; vertical-align:top;">
                                                                Address: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px; vertical-align:top;">
                                                                <textarea cols="66" rows="6" name="address" id="address"><?php echo $edit['address']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Street Address: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="streetaddress" id="streetaddress" size="50" value = "<?php echo $edit['streetaddress']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                City/Town: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="city" id="city" size="50" value = "<?php echo $edit['city']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Parish: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="parish" id="parish" size="50" value = "<?php echo $edit['parish']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Village: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="village" id="village" size="50" value = "<?php echo $edit['village']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px;">
                                                                Zone: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="zone" id="zone" size="50" value = "<?php echo $edit['zone']; ?>" />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                 </ul>
                                                 
                                                 <ul id="academics" class="hide">
                                                    <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                                    	<tr>
                                                            <td align="right" width="18%" style="padding-top:10px;">
                                                                Occupation: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <input type="text" name="occupation" id="occupation" size="50" value = "<?php echo $edit['occupation']; ?>" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px; vertical-align:top;">
                                                                Qualifications: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <textarea cols="66" rows="6" name="qualification" id="qualification"><?php echo $edit['qualification']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px; vertical-align:top;">
                                                                University attended: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <textarea cols="66" rows="6" name="university" id="university"><?php echo $edit['university']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px; vertical-align:top;">
                                                                Secondary school attended: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <textarea cols="66" rows="6" name="secondaryschool" id="secondaryschool"><?php echo $edit['secondaryschool']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px; vertical-align:top;">
                                                                Primary school attended: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <textarea cols="66" rows="6" name="primaryschool" id="primaryschool"><?php echo $edit['primaryschool']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="padding-top:10px; vertical-align:top;">
                                                                Special courses attended: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px;">
                                                                <textarea cols="66" rows="6" name="specialcourse" id="specialcourse"><?php echo $edit['specialcourse']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                 </ul>
                                                 
                                                 <ul id="hr" class="hide">
                                                    <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                                    	<tr>
                                                            <td align="right" width="18%" style="padding-top:10px; vertical-align:top;">
                                                                POLICE Details: &nbsp;
                                                            </td>
                                                            <td style="padding-top:10px; vertical-align:top;">
                                                                <textarea cols="66" rows="6" name="hrcomment" id="hrcomment"><?php echo $edit['hrcomment']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                 </ul>
                                             </div>
                                         </div>
         							</div>
                               	</td>
                           	</tr>
                            <tr>
                            	<td>
                                	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                        	<td align="right" width="18%">
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
                                                <input type="submit" value="Add WANTED Person">
                                                <?php	
                                                }
                                                ?>
                                            </td>
                                  		</tr>
                               		</table>
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
		$qry = mysql_query("SELECT id, picture, randomid, fname, mname, lname, phoneno, hrcomment, status, date_posted FROM persons_list WHERE userid = '".$_SESSION['ssvid']."' ORDER BY date_posted DESC");  	
	
		$num = mysql_num_rows($qry);
	?>
    <tr>
    	<td>
        	<table border="0" width="100%" cellpadding="0" cellspacing="0">
            	<tr>
                	<td style="padding-top:10px;">
                    	<b>View WANTED Persons</b>
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
                                <td width="3%" align="center" class="tdmain">
                                	Edit
                                </td>
                                <td width="20%" align="center" class="tdmain">
                                	Picture
                                </td>
                                <td class="tdmain">
                                	WANTED Person's Details
                                </td>
                                <td width="9%" align="center" class="tdmain">
                                	Listing Status
                                </td>
                                <td width="20%" class="tdmain">
                                	Phone No
                                </td>
                                <td width="15%" class="tdmain">
                                	Date posted
                                </td>
                                <td width="3%" align="center" class="tdmain">
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
								
								if($result['mname'] != "")
								{
									$middle = " ".$result['mname']." ";
								}
								else
								{
									$middle = " ";	
								}
								
								$names = $result['fname'].$middle.$result['lname']; // echo "<pre>"; print_r($result);
							?>
                            <tr class="<?php echo $row; ?>">
                            	<td class="tdother">
                                	<b><?php echo $counter; ?></b>
                                </td>
                                <td align="center" class="tdother">
                                	<a href="../user_accounts/wanted_persons.php?edit=<?php echo base64_encode($result['id']); ?>" class="links" title="Edit HR Employee - <?php echo $names; ?>">Edit</a>
                                </td>
                                <td align="center" class="tdother">
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
                                        <a href="../user_accounts/wanted_persons.php?p=<?php echo base64_encode($result['id']); ?>" class="links" title="Upload Picture for - <?php echo $names; ?>">Upload Picture Now</a>
                                        <br />
                                    <?php		
									}
									?>
                                    <?php
                                    if($result['picture'] != "")
									{
									?>
                                    	<br />
                                    	<a href="../user_accounts/wanted_persons.php?editpic=<?php echo base64_encode($result['id']); ?>" class="links" title="Edit picture for - <?php echo $names; ?>">Edit Picture</a>
                                  	<?php
									}
									?>
                                </td>
                                <td class="tdother">
                                	<table border="0" width="100%" cellpadding="0" cellspacing="0">
										<tr>
											<td width="30%" align="right">
                                            	Names: &nbsp;
                                            </td>
                                            <td>
												<a class="fancybox fancybox.ajax" href="../other_files/thisemployee.php?task=1&i=<?php echo base64_encode($result['id']); ?>" id="links" title="Details of employee - <?php echo $names; ?>"><?php echo $names; ?></a>
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
											<td style="padding-top:5px;" align="right">
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
                                        <tr>
											<td style="padding-top:5px;" colspan="2">
                                            	<?php echo $result['hrcomment']; ?>
                                           	</td>
                                      	</tr>
                                  	</table>
                                </td>
                                <td align="center" class="tdother">
                                	<?php
									if($result['status'] == 1)
									{
									?>
                                	<a href="#" onclick="promptAction('Cancel WANTED Person - <?php echo $names; ?>\'s Listing?', '../user_accounts/wanted_persons.php?clk=<?php echo base64_encode($result['id']); ?>');" class="links" title="Cancel Listing for WANTED Person - <?php echo $names; ?>">Cancel Listing</a>
                                   <?php	
									}
									else
									{
									?>
                                	<a href="#" onclick="promptAction('List WANTED Person - <?php echo $names; ?>?', '../user_accounts/wanted_persons.php?dlk=<?php echo base64_encode($result['id']); ?>');" class="links" title="List WANTED Person - <?php echo $names; ?>">List Now</a>
                                   <?php
									}
								   ?>
                                </td>
                                <td class="tdother">
                                	<?php echo $result['phoneno']; ?>
                                </td>
                                <td class="tdother">
                                	<?php echo date("jS - F - Y", $result['date_posted']); ?>
                                </td>
                                <td align="center" class="tdother">
                                	<a href="#" onClick="return promptAction('Delete HR Employee - <?php echo $names; ?>?', '../user_accounts/wanted_persons.php?dhr=<?php echo base64_encode($result['id']); ?>');" class="links" title="Delete WANTED Person - <?php echo $names; ?>">Delete</a>
                                </td>
                                
                            </tr>
                            <?php
							$counter++;		
							}
							?>
                            <tr>
                            	<td colspan="7" align="left" style="padding-top:10px">
                                	<b>*</b> WANTED Person's without pictures will not be displayed on the website
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
	elseif($_GET['p'] || $_GET['editpic'])
	{
		if($_GET['p'] || $_GET['editpic'])
		{
			if($_GET['p'])
			{
				$id = base64_decode($_GET['p']);
			}
			else
			{
				$id = base64_decode($_GET['editpic']);
			}
	
			$picture = mysql_fetch_array(mysql_query("SELECT fname, mname, lname, randomid, picture FROM persons_list WHERE id = '".$id."'")); //echo "<pre>"; print_r($edit);
			
			if($picture['mname'] != "")
			{
				$middle = " ".$picture['mname']." ";
			}
			else
			{
				$middle = " ";	
			}
								
			$names = $picture['fname'].$middle.$picture['lname'];
		}
	?>
	<tr>
		<td>
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-top:10px;">
						<?php
						if($_GET['edit'])
						{
						?>
							<b>Edit Picture for WANTED Person - </b> <?php echo $names." #".$edit['randomid']; ?>
						<?php	
						}
						else
						{
						?>
							<b>Add Picture for WANTED Person</b>
						<?php	
						}
						?>
					</td>
				</tr>
                <tr>
                	<td>
                      	<form action="../other_files/inc_addordeditpicture.php" autocomplete = "off" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="return Empty('user_img', 'Please browse for picture', 'error_msg2') && startUpload();">
                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                                <td colspan="2">
                                    <div id="error_msg2"></div>
                                </td>
                            </tr>
                            <tr>
                            	<td style="padding-top:7px;">
                                	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                                    	<tr>
                                            <td align="right" width="10%" style="padding-top:10px;">
                                               Names: &nbsp;
                                            </td>
                                            <td style="padding-top:10px;">
                                                <?php echo $names; ?>
                                            </td>
                                        </tr>
                                        <?php
                                       if($_GET['editpic'] != "")
									  {
										  $image = getimagesize("../file_loads/".$picture['picture']);
									  ?>
									  <tr>	
										  <td style="padding-top:10px;" valign="top" align="right">
											  Current picture: &nbsp;
										  </td>
										  <td style="padding-top:10px;">
                                          	<img src="../file_loads/<?php echo $picture['picture']; ?>" width="<?php echo $image[0]; ?>" height="<?php echo $image[1]; ?>" />
											  <br /><br />
											  <i><b>NOTE:</b> To maintain the same picture above, please dont browse for another!</i>
											  <br /><br />
										  </td>
									  </tr>
									  <?php	
									  }
									  ?>
									  <tr>
										  <td style="padding-top:10px;" valign="top" align="right">
											  <?php
									  
											  if(!$_GET['editpic'])
											  {
											  ?>
												  Picture: &nbsp;
											  <?php
											  }
											  ?>
										  </td>
										  <td style="padding-top:10px;" valign="top" align="left">
											  
											  <input type="hidden" name="MAX_FILE_SIZE" value="200000" />
											  <input type="file" name="user_img" id="user_img" size="50" onblur="return Empty('user_img','Please browse for a picture','file_type') && checkImage('user_img','file_type');" />
											  <br>
											  <br />
											  <i>Please browse for file of .gif or .jpg :: Allowed dimensions - Width of lessthan or equal to 190px and Height of lessthan or equal to 210px</i>
											  <br>
											  <div id="file_type" style="padding-top:7px;">
											  </div>
											  <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:1px solid #fff;"></iframe>
										  </td>
									  </tr>
                                 	</table> 
                               	</td>
                           	</tr>
                            <tr>
                            	<td>
                                	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                        	<td align="right" width="10%">
                                            </td>
                                            <td style="padding-top:10px; padding-bottom:30px;">
                                                <input type="hidden" name="editid" id="editid" value="<?php echo $id; ?>">
												<?php
                                                if($_GET['editpic'])
                                                {
                                                ?>
                                                <input type="hidden" name="sourceid" id="sourceid" value="2">
                                                <input type="submit" value="Save Changes">
                                                <?php	
                                                }
                                                else
                                                {
                                                ?>
                                                <input type="hidden" name="sourceid" id="sourceid" value="1">
                                                <input type="submit" value="Add WANTED Person's Picture">
                                                <?php	
                                                }
                                                ?>
                                            </td>
                                  		</tr>
                               		</table>
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
	elseif($_GET['list'])
	{
		if($_GET['list'])
		{
			$id = base64_decode($_GET['list']);
	
			$picture = mysql_fetch_array(mysql_query("SELECT fname, mname, lname, randomid, picture FROM persons_list WHERE id = '".$id."'")); //echo "<pre>"; print_r($edit);
			
			if($picture['mname'] != "")
			{
				$middle = " ".$picture['mname']." ";
			}
			else
			{
				$middle = " ";	
			}
								
			$names = $picture['fname'].$middle.$picture['lname'];
		}
	?>
	<tr>
		<td>
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-top:10px;">
						<?php
						if($_GET['task'] == 1)
						{
						?>
							<b>List WANTED Person - </b> <?php echo $names." #".$edit['randomid']; ?>
						<?php	
						}
						else
						{
						?>
							<b>Cancel List WANTED Person - </b> <?php echo $names." #".$edit['randomid']; ?>
						<?php	
						}
						?>
					</td>
				</tr>
                <tr>
                	<td>
                      	<form action="#listing" autocomplete = "off" method="post" onsubmit="return Empty('startdate', 'Please select date to start running this listing', 'error_msg2') && savePaidListing('personid', 'paymentid', 'paymentstatus', 'startdate', 'error_msg2');">
                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                        	<tr>
                                <td colspan="2">
                                    <div id="error_msg2"></div>
                                </td>
                            </tr>
                            <tr>
                            	<td style="padding-top:7px;">
                                	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                                    	<tr>
                                            <td align="right" width="12%" style="padding-top:10px;">
                                               Names: &nbsp;
                                            </td>
                                            <td style="padding-top:10px;">
                                                <?php echo $names; ?>
                                                <input type="hidden" name="names" id="names" value="<?php echo $names; ?>" />
                                                <input type="hidden" name="personid" id="personid" value="<?php echo $id; ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" width="10%" style="padding-top:10px;">
                                               Payment Ref No: &nbsp;
                                            </td>
                                            <td style="padding-top:10px;">
                                                <?php
												
												$qry = mysql_query("SELECT d.names, r.paymentrate, p.* FROM site_payments p, payment_rates r, payment_durations d WHERE p.userid = '".$_SESSION['ssvid']."' && p.status = 2 && p.inuse = 0 && p.durationid = r.durationid && r.durationid = d.id ORDER BY d.duration ASC");
												
												//$qry = mysql_query("SELECT  FROM WHERE ");
												
												
												$num = mysql_num_rows($qry);
												
												$currency = mysql_fetch_array(mysql_query("SELECT * FROM currency_setup WHERE inuse = 1"));
												
												if($num != 0)
												{
												?>
                                                	<select name="paymentid" id="paymentid">
                                                	<?php
                                                    while($payments = mysql_fetch_array($qry))
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
															
														$cost = " ".number_format($payments['paymentrate'], "0", "", ","); 
															
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
													<option value="<?php echo $payments['id']; ?>"><?php echo $payments['names']." at a cost of  ".$rates; ?></option>
                                                    <?php		
													}
													?>
                                                    </select>
                                                    <input type="hidden" name="paymentstatus" id="paymentstatus" value="1" />
                                                    <?php
												}
												else
												{
												?>
                                                	<font color="red">You do not have any payments to use </font> <img src="../images/no.gif" width="18" height="18" border="0" align="absmiddle" />
                                                	<input type="hidden" name="paymentstatus" id="paymentstatus" value="0" />
                                                <?php		
												}
												
												?>
                                            </td>
                                        </tr>
                                        <tr> 
                                            <td align="right" width="10%" style="padding-top:10px;">
                                               Start Date: &nbsp;
                                            </td>
                                            <td style="padding-top:10px;">
                                                <input type="text" name="startdate" id="startdate" size="50" value = "<?php echo $edit['startdate']; ?>" />
                                            </td>
                                        </tr>
                                 	</table> 
                               	</td>
                           	</tr>
                            <tr>
                            	<td>
                                	<table border="0" width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                        	<td align="right" width="12%">
                                            </td>
                                            <td style="padding-top:10px; padding-bottom:30px;">
                                                <input type="hidden" name="editid" id="editid" value="<?php echo $id; ?>">
												<?php
                                                if($_GET['task'] == 2)
                                                {
                                                ?>
                                                <input type="hidden" name="sourceid" id="sourceid" value="2">
                                                <input type="submit" value="Cancel List WANTED Person">
                                                <?php	
                                                }
                                                else
                                                {
                                                ?>
                                                <input type="hidden" name="sourceid" id="sourceid" value="1">
                                                <input type="submit" value="List WANTED Person">
                                                <?php	
                                                }
                                                ?>
                                            </td>
                                  		</tr>
                               		</table>
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
	?>
</table>
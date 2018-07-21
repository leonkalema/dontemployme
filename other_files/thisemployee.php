<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	//Form Data
	$id = base64_decode($_GET['i']);
	
	$find = mysql_fetch_array(mysql_query("SELECT * FROM persons_list WHERE id = '".$id."'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <title>www.dontemployme.com:: HR Employee</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../site_css/cssfile.css" />
        <link rel="stylesheet" type="text/css" href="../site_css/tabs.css" />
        <script type="text/javascript" language="javascript" src="../site_js/jquery.js">
        </script>
		<script type="text/javascript" language="javascript" src="../site_js/js_js.js">
        </script>
        <script type="text/javascript" src="../site_js/tabs.js">
        </script>
        <script type='text/javascript' language="javascript">
			$(function() {		
				$("#example-one").organicTabs();		
			});
		</script>
    </head>
    <body>
        <div id="page-wrap">
            <div id="example-one">
            <ul class="nav">
                <li class="nav-one"><a href="#personal" class="current">Personal Information</a></li>
                <li class="nav-two"><a href="#family">Family Information</a></li>
                <li class="nav-three"><a href="#residence">Residencial Information</a></li>
                <li class="nav-four"><a href="#academics">Academic Information</a></li>
                <li class="nav-five last"><a href="#hr">Other Information</a></li>
            </ul>
            <div class="list-wrap">
                <ul id="personal">
                    <table border="0" width="990px" cellpadding="0" cellspacing="0">
                            <tr>
                            <td align="right" valign="top" width="18%" style="padding-top:10px;">
                                Picture: &nbsp;
                            </td>
                            <td style="padding-top:10px;" valign="top">
                                <?php
                                if($find['picture'] != "")
								{
									$image = getimagesize("../file_loads/".$find['picture']);
								?>
                               	<img src="../file_loads/<?php echo $find['picture']; ?>" width="<?php echo $image[0]; ?>" height="<?php echo $image[1]; ?>" border="0">
                                <?php
								}
								else
								{
									echo "<i>No picture uploaded</i>";	
								}
								?>
                            </td>
                      	</tr>
                        <tr>
                            <td align="right" width="18%" style="padding-top:10px;">
                                First Name: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['fname']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" width="10%" style="padding-top:10px;">
                                Middle name: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['mname']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" width="10%" style="padding-top:10px;">
                                Surname: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['lname']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" width="10%" style="padding-top:10px;">
                                Alias 1: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['alias1']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" width="10%" style="padding-top:10px;">
                                Alias 2: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['alias2']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" width="10%" style="padding-top:10px;">
                                Alias 3: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['alias3']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Phone number: &nbsp;
                            </td>
                            <td style="padding-top:10px; vertical-align:top;">
                                <?php echo $find['phoneno']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px; vertical-align:top;">
                                Gender: &nbsp;
                            </td>
                            <td style="padding-top:10px; vertical-align:top;">
                                <?php 
								if($find['gender'] == "1") 
								{ 
								echo "Female"; 
								} 
								else
								{
									echo "Male";
								}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Race: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['race']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Tribe: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['tribe']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Height: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['pheight']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Hair color: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['haircolor']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Eye color: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['eyecolor']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Date of Birth: &nbsp;
                            </td>
                            <td style="padding-top:10px; vertical-align:top;">
                                <?php echo $find['dateofbirth']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Marital Status: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php 
								if($find['maritalstatus'] == "1") 
								{ 
									echo "Married"; 
								} 
								elseif($find['maritalstatus'] == "1") 
								{ 
									echo "Divorced"; 
								}
								elseif($find['maritalstatus'] == "1") 
								{ 
									echo "Widower"; 
								}
								elseif($find['maritalstatus'] == "1") 
								{ 
									echo "Widow"; 
								}
								else
								{
									echo "Single";
								}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Spouse's name: &nbsp;
                            </td>
                            <td style="padding-top:10px; vertical-align:top;">
                                <?php echo $find['spousename']; ?>
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
                                <?php echo $find['fathername']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Mother's Name: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['mothername']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Parents residence: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['parentsresidence']; ?>
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
                                <?php echo $find['countryofbirth']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Place of Birth: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['placeofbirth']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Nationality: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['nationality']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Passport No: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['passportno']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                ID Card No: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['idcard']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Driving Permit No: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['drivingpermit']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" width="18%" style="padding-top:10px; vertical-align:top;">
                                Address: &nbsp;
                            </td>
                            <td style="padding-top:10px; vertical-align:top;">
                                <?php echo $find['address']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Street Address: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['streetaddress']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                City/Town: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['city']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Parish: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['parish']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Village: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['village']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px;">
                                Zone: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['zone']; ?>
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
                                <?php echo $find['occupation']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px; vertical-align:top;">
                                Qualifications: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['qualification']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px; vertical-align:top;">
                                University attended: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['university']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px; vertical-align:top;">
                                Secondary school attended: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['secondaryschool']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px; vertical-align:top;">
                                Primary school attended: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['primaryschool']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-top:10px; vertical-align:top;">
                                Special courses attended: &nbsp;
                            </td>
                            <td style="padding-top:10px;">
                                <?php echo $find['specialcourse']; ?>
                            </td>
                        </tr>
                    </table>
                 </ul>
                 
                 <ul id="hr" class="hide">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                            <td align="right" width="18%" style="padding-top:10px; vertical-align:top;">
                                <?php
								if($find['origin'] == 1)
								{
								?>
								HR Comment: &nbsp;
								<?php
								}
								else
								{
								?>
								POLICE Details: &nbsp;
								<?php		
								}
								?>
                            </td>
                            <td style="padding-top:10px; vertical-align:top;">
                                <?php echo $find['hrcomment']; ?>
                            </td>
                        </tr>
                    </table>
                 </ul>
             </div>
         </div>
	</div>
</body>
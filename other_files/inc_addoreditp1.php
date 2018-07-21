<?php

	@session_start();
	
	require_once("../other_files/site_sec.php");
	
	//Form Data
	$gender = inputCleaner($_POST['gender']);
	$maritalstatus = inputCleaner($_POST['maritalstatus']);
	$sourceid = inputCleaner($_POST['sourceid']);	
	$fname = inputCleaner($_POST['fname']);
	$mname = inputCleaner($_POST['mname']);
	$lname = inputCleaner($_POST['lname']);
	$alias1 = inputCleaner($_POST['alias1']);
	$alias2 = inputCleaner($_POST['alias2']);
	$alias3 = inputCleaner($_POST['alias3']);
	$phoneno = inputCleaner($_POST['phoneno']);
	$race = inputCleaner($_POST['race']);
	
	$tribe = inputCleaner($_POST['tribe']);
	$pheight = mysql_real_escape_string($_POST['pheight']);
	$haircolor = inputCleaner($_POST['haircolor']);
	$eyecolor = inputCleaner($_POST['eyecolor']);
	$dateofbirth = inputCleaner($_POST['dateofbirth']);
	$spousename = inputCleaner($_POST['spousename']);
	$fathername = inputCleaner($_POST['fathername']);
	$mothername = inputCleaner($_POST['mothername']);
	$parentsresidence = inputCleaner($_POST['parentsresidence']);
	$countryofbirth = inputCleaner($_POST['countryofbirth']);
	
	$placeofbirth = inputCleaner($_POST['placeofbirth']);
	$nationality = inputCleaner($_POST['nationality']);
	$passportno = inputCleaner($_POST['passportno']);
	$idcard = inputCleaner($_POST['idcard']);
	$drivingpermit = inputCleaner($_POST['drivingpermit']);
	$address = nl2br(mysql_real_escape_string($_POST['address']));
	$streetaddress = inputCleaner($_POST['streetaddress']);
	$city = inputCleaner($_POST['city']);
	$parish = inputCleaner($_POST['parish']);
	$village = inputCleaner($_POST['village']);
	
	$zone = inputCleaner($_POST['zone']);
	$occupation = inputCleaner($_POST['occupation']);
	$qualification = nl2br(mysql_real_escape_string($_POST['qualification']));
	$university = nl2br(mysql_real_escape_string($_POST['university']));
	$secondaryschool = nl2br(mysql_real_escape_string($_POST['secondaryschool']));
	$primaryschool = nl2br(mysql_real_escape_string($_POST['primaryschool']));
	$specialcourse = nl2br(mysql_real_escape_string($_POST['specialcourse']));
	$hrcomment = nl2br(mysql_real_escape_string($_POST['hrcomment']));
	$editid = inputCleaner($_POST['editid']);
	
	$thistime = mktime();
	$noid = 0;
	$randomid = getThisRand();
	
	if($editid == 0)
	{
		$qry = mysql_query("SELECT id FROM persons_list WHERE userid = '".$_SESSION['ssvid']."' && fname = '".$fname."' && lname = '".$lname."'");
	
		if(mysql_num_rows($qry) == 0) 	
		{
			$insert = mysql_query("INSERT INTO persons_list (userid, origin, randomid, fname, mname, lname, alias1, alias2, alias3, phoneno, gender, race, tribe, pheight, haircolor, eyecolor, dateofbirth, maritalstatus, spousename, fathername, mothername, parentsresidence, countryofbirth, placeofbirth, nationality, passportno, idcard, drivingpermit, address, streetaddress, city, parish, village, zone, occupation, qualification, university, secondaryschool, primaryschool, specialcourse, hrcomment, date_posted) VALUES ('".$_SESSION['ssvid']."', '".$sourceid."', '".$randomid."', '".$fname."', '".$mname."', '".$lname."', '".$alias1."', '".$alias2."', '".$alias3."', '".$phoneno."', '".$gender."', '".$race."', '".$tribe."', '".$pheight."', '".$haircolor."', '".$eyecolor."', '".$dateofbirth."', '".$maritalstatus."', '".$spousename."', '".$fathername."', '".$mothername."', '".$parentsresidence."', '".$countryofbirth."', '".$placeofbirth."', '".$nationality."', '".$passportno."', '".$idcard."', '".$drivingpermit."', '".$address."', '".$streetaddress."', '".$city."', '".$parish."', '".$village."', '".$zone."', '".$occupation."', '".$qualification."', '".$university."', '".$secondaryschool."', '".$primaryschool."', '".$specialcourse."', '".$hrcomment."', '".$thistime."')") or die(mysql_error());
				
			if($insert)
			{
				$insertid = base64_encode(mysql_insert_id());
				
				echo "20-".$insertid;
			}
			else
			{
				echo "24-".$noid;	
			}	
		}
		else
		{
			echo "28-".$noid;	
		}
	}
	else
	{
		$qry = mysql_query("SELECT id FROM persons_list WHERE userid = '".$_SESSION['ssvid']."' && fname = '".$fname."' && lname = '".$lname."' && id != '".$editid."'");
	
		if(mysql_num_rows($qry) == 0) 	
		{
			$update = mysql_query("UPDATE persons_list SET fname = '".$fname."', mname = '".$mname."', lname = '".$lname."', alias1 = '".$alias1."', alias2 = '".$alias2."', alias3 = '".$alias3."', phoneno = '".$phoneno."', gender = '".$gender."', race = '".$race."', tribe = '".$tribe."', pheight = '".$pheight."', haircolor = '".$haircolor."', eyecolor = '".$eyecolor."', dateofbirth = '".$dateofbirth."', maritalstatus = '".$maritalstatus."', spousename = '".$spousename."', fathername = '".$fathername."', mothername = '".$mothername."', parentsresidence = '".$parentsresidence."', countryofbirth = '".$countryofbirth."', placeofbirth ='".$placeofbirth."', nationality= '".$nationality."', passportno ='".$passportno."', idcard = '".$idcard."', drivingpermit = '".$drivingpermit."', address ='".$address."', streetaddress = '".$streetaddress."', city = '".$city."', parish = '".$parish."', village = '".$village."', zone = '".$zone."', occupation = '".$occupation."', qualification = '".$qualification."', university = '".$university."', secondaryschool = '".$secondaryschool."', primaryschool = '".$primaryschool."', specialcourse = '".$specialcourse."', hrcomment = '".$hrcomment."' WHERE id = '".$editid."'");
				
			if($update)
			{
				$posteditid = base64_encode($editid);
				
				echo "30-".$posteditid;
			}
			else
			{
				echo "34-".$noid;	
			}	
		}
		else
		{
			echo "38-".$noid;	
		}
	}


?>
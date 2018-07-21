<?php

	@session_start();
	
	error_reporting(E_ALL ^ E_NOTICE);
	
	ini_set('session.bug_compat_warn', 0);
	ini_set('session.bug_compat_42', 0);
	
	define("MYSQL_HOST", "localhost");
	define ("MYSQL_USER", "root");
	define ("MYSQL_PASSWORD", "");
	define ("MYSQL_DATABASE", "employ");
	define ("USER_NAME", "USER_NAME");
	
	
		
	// open a connection to the database
	$con = @mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD) or die("Could not connect to MYSQL");

	//Get the database
	mysql_select_db(MYSQL_DATABASE, $con);
	
	//Function to clean user input
	function inputCleaner($item)
	{
		//strip white space
		$step1 = trim($item);
		
		//remove tags
		$step2 = strip_tags($step1);
		
		$step3 = str_replace("?", "",$step2);
		
		$step3 = str_replace("?", "",$step3);
		
		$step3 = str_replace("?", "",$step3);
		
		$step3 = str_replace("?", "",$step3);
		
		$step3 = str_replace("?", "",$step3);
		
		$step3 = str_replace("?", "",$step3);
		
		$step3 = str_replace("?", "",$step3);
		
		$step3 = str_replace("$", "",$step3);
		
		$step3 = str_replace("%", "",$step3);
		
		$step3 = str_replace("*", "",$step3);
				
		$step3 = str_replace("&&", "",$step3);
		
		$step3 = str_replace("{", "",$step3);
		
		$step3 = str_replace("[", "",$step3);
		
		$step3 = str_replace("]", "",$step3);
		
		$step3 = str_replace("}", "",$step3);
		
		$step3 = str_replace("\"", "",$step3);
		
		$step3 = str_replace("|", "",$step3);
		
		$step3 = str_replace(";", "",$step3);
		
		$step3 = str_replace(":", "",$step3);
		
		$step3 = str_replace(",", "",$step3);
		
		$step3 = str_replace("/", "",$step3);
		

		$step3 = stripslashes($step3);
		
		//clean for DB
		$clean = mysql_real_escape_string($step3);
		
		return $step3;
	}
	
	//Function
	function getThisRand()
	{
		$random = mt_rand(1,1987654320);
		
		$randomstring = substr($random,0,6);
		
		return $randomstring;
	}

?>
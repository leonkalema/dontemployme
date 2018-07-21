<?php

	@session_start();
	
	//Get the sessions
	$_SESSION = array();
	
	// Unset all of the session variables.
	session_unset();
	
	// Finally, destroy the session.
	session_destroy();
	// return to the main index page
	header("location:../home/index.php");

?>
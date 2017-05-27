<?php
	// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy(); 
	
	include 'del_usercookie.php';
	
?>
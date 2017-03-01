<?php
	session_start();
	function logoutphp(){
		session_unset(); 
		// destroy the session 
		session_destroy(); 
		header("Location: /Project/index.php");
	}
	logoutphp();
?>
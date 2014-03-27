<?php
	$host	= '';
	$user	= '';
	$pass	= '';
	$db		= '';

	$con = mysql_connect($host, $user, $pass);
	
	if (!$con) {
		die("Cannot connect to database");
	}else{
		mysql_select_db($db) or die('Cannot select database');
	}

?>

<?php
	$host	= 'wp2-182898.mysql.binero.se';
	$user	= '182898_jq37898';
	$pass	= 'Sch1lNad';
	$db		= '182898-wp2';

	$con = mysql_connect($host, $user, $pass);
	
	if (!$con) {
		die("Cannot connect to database");
	}else{
		mysql_select_db($db) or die('Cannot select database');
	}

?>
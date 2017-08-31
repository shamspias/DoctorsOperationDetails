<?php
	$db = new mysqli('localhost', 'Database_User_name', 'Database_User_Passwoard', 'Database_name');
	if ($db->connect_errno) {
		echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
	}
	$db->set_charset("utf8");
?>
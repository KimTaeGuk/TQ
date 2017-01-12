<?php
	$host='localhost';
	$user='xoox1020';
	$password='xoxo1020';
	$database='xoox1020';
	//create connection
	$con = new mysqli($host, $user, $password, $database);
	//Check connection
	if($con->connect_error){die("Connection failed: ".$con->connect_error);}
  $con->set_charset('utf8');
 ?>

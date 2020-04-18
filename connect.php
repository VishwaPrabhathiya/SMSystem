<?php
$mysql_host='localhost';
$mysql_user='root';
$mysql_pass='';

$mysql_db='sm_system';
$connection =  new mysqli($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
if ($connection->connect_error) { 
	die("Connection failed: " . $connection->connect_error); 
}
?>
<?php

$conn_error = 'connect error';
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_pass = '';
$mysql_db = 'a_database';


if(!@mysql_connect($mysql_host, $mysql_username, $mysql_pass) || !@mysql_select_db($mysql_db)) {
   die($conn_error);
}



?>
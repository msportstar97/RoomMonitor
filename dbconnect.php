<?php
$MyUsername = "dpnm";  // enter your username for mysql
$MyPassword = "dpnm2017";  // enter your password for mysql
$MyHostname = "localhost";      // this is usually "localhost" unless your database resides on a different server
$MyDB = "MySQL";

$dbh = mysqli_connect($MyHostname , $MyUsername, $MyPassword, $MyDB);
$selected = mysqli_select_db($dbh, "roommonitor");
?>

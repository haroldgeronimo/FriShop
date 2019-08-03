<?php

// server info
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'store2';

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);

// show errors (remove this line if on a live site)
mysqli_report(MYSQLI_REPORT_ERROR);

// or you can use echo to output a remark if the previous line is running
?>
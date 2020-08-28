<?php

// session_start();

$servername = "localhost";
$username = "root";
// $password = ""; if you dont have any password
$password = "";
$dbname = "bbg";

// Create connection
$db = new mysqli($servername, $username, $password,$dbname );

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


?>

<?php
//include config
require_once('../includes/config.php');

//log user out
session_start();
session_unset();
session_destroy();

header("Location: login.php");


?>
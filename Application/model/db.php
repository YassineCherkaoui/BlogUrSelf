<?php

class Dbconnect{
    public function connect(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bbg";
        $db = new mysqli($servername, $username, $password,$dbname );
         return $db;

         if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
     }
}



?>

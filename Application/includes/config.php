<?php
ob_start();
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
// echo "Connected successfully";





// //database credentials
// $servername = "localhost";
// $username = "root";
// $password = "";
// // define('DBHOST','localhost');
// // define('DBUSER','root');
// // define('DBPASS','');
// // define('DBNAME','bbg');

// $db = new PDO("mysql:host=$servername;dbname=bbg", $username, $password);
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



//load classes as needed
spl_autoload_register(function ($class) {
   
   $class = strtolower($class);

	//if call from within assets adjust the path
   $classpath = 'classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	} 	
	
	//if call from within admin adjust the path
   $classpath = '../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	}
	
	//if call from within admin adjust the path
   $classpath = '../../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	} 		
	 
});

$user = new User($db); 
?>

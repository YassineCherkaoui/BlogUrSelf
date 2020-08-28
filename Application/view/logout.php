
<?php

            // session_destroy();

        
			// unset($_SESSION['username']);
			// unset($_SESSION['author_id']);
			

            // header('Location: login.php');

            session_start();
            session_unset();
            session_destroy();

            header("Location: login.php");


?>

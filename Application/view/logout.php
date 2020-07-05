
<?php

            session_destroy();

        
			unset($_SESSION['username']);
			unset($_SESSION['author_id']);
			

            header('Location: login.php');


?>

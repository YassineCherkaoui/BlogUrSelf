<?php
             session_start();
            session_unset($_SESSION["username"]);
            session_destroy($_SESSION["author_id"]);
            header("Location: login.php");
?>

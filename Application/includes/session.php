<?php require('config.php'); 



session_start();

function message()
{
   if (isset($_SESSION["message"])) {
       $output = '<div class="message">';
       $output .=htmlentities($_SESSION["message"]);
       $output .="</div>";
       $_SESSION["message"] = null;
       return $output;
   }
}
function message2()
{
   if (isset($_SESSION["message2"])) {
       $output = '<div class="message2">';
       $output .=htmlentities($_SESSION["message2"]);
       $output .="</div>";
       $_SESSION["message2"] = null;
       return $output;
   }
}

function messageError()
{
   if (isset($_SESSION["message3"])) {
       $output = '<div class="message2">';
       $output .=htmlentities($_SESSION["message3"]);
       $output .="</div>";
       $_SESSION["message3"] = null;
       return $output;
   }
}
function messageErrorType()
{
   if (isset($_SESSION["message4"])) {
       $output = '<div class="message2">';
       $output .=htmlentities($_SESSION["message4"]);
       $output .="</div>";
       $_SESSION["message4"] = null;
       return $output;
   }
}


function messageAdminLogin()
{
   if (isset($_SESSION["messageAdminLogin"])) {
       $output = '<div class="alert alert-danger" role="alert">';
       $output .=htmlentities($_SESSION["messageAdminLogin"]);
       $output .="</div>";
       $_SESSION["messageAdminLogin"] = null;
       return $output;
   }
}



?>
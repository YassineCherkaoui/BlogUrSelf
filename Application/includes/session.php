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

?>
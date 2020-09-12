<?php
ob_start();
 require('../includes/config.php');
 session_start();

 $error = "";
 $email ="";



if(empty($_POST['email'])){
    $error .= '<p class="text-danger">email is required</p>';
}
else
{
 $email = $_POST["email"];

}
if($error == '')
{
   
    $stmt =$db->prepare("INSERT INTO email_subscription (email) VALUES (?)");
    $stmt->bind_param('s', $email);
    $stmt->execute();

    $error = '<label class="text-success">tnk you for your subscription</label>';

}
$data = array(
    'error'  => $error
   );
   
   echo json_encode($data);
   ob_end_flush();
?>
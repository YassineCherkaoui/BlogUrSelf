<?php 
ob_start();
require('../includes/config.php');
// require('../includes/session.php'); 
session_start();

if(isset($_POST["admin_login"])){

   
    $email = $_POST['email'];
   
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        
         header("Location: login.php");
        $_SESSION["messageAdminLogin"] =" All fields must be filled out";
    }
    else { 
        $query= "SELECT * FROM admin WHERE email=?";
        $stmt =$db->prepare($query);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result= $stmt->get_result();
        $row2 = $result->fetch_assoc();

        $password_check = password_verify($password, $row2["password"]);
        

        if ($password_check) {
            header("Location: ../admin/index.php");
            $_SESSION["admininfo"] = $row2["email"];

        
        } else {
            header("Location:../admin/login.php");
            $_SESSION["messageAdminLogin"] =" Invalid Email / Password";
        }
        
    }


}

ob_end_flush();
?>
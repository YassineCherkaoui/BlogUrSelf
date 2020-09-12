<?php
ob_start();
//  require('../includes/config.php');

 require('../model/auther.php');



if(ISSET($_POST['editUserProfile'])){
  
    $id = $_POST['userid'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];

    
    $fb = $_POST['fb'];
    $insta = $_POST['insta'];
    $twit = $_POST['twit'];

    $auther = new Auther();
    $auther -> update_info2($username, $email,  $bio, $fb, $insta, $twit, $id);

    $photoName = time() .'-'. $_FILES['profile_img']['name'];
    $target = '../public/img/' . $photoName; 
    $fileError = $_FILES['profile_img']['error'];


    // Get file extension
    $imageExt = strtolower(pathinfo($target, PATHINFO_EXTENSION));
    // Allowed file types
    $allowd_file_ext = array("jpg", "jpeg", "png");

    if (in_array($imageExt, $allowd_file_ext)) {

        if ($fileError == 0) {
            move_uploaded_file($_FILES['profile_img']['tmp_name'],$target);
            $auther = new Auther();
            $auther -> update_info($target, $id);
           
        }
        else {
            $_SESSION["message3"] ="try agrin";
        }
        

    }else {
        $_SESSION["message4"] ="Allowed file formats .jpg, .jpeg and .png";
    }


    header("location: ../view/blogger_profile.php");

   
}







ob_end_flush();
?>
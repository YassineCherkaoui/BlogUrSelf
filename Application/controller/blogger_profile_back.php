<?php
 require('../includes/config.php');


if(ISSET($_POST['editUserProfile'])){
  
    $id = $_POST['userid'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];

    
    $fb = $_POST['fb'];
    $insta = $_POST['insta'];
    $twit = $_POST['twit'];


    // echo print_r($_FILES['profile_img']['name']);

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
            $stmt =$db->prepare("UPDATE author SET username=?, email=?,author_img=?, author_bio=?, fb_account=?, insta_account=?, twit_account=? WHERE author_id=?");
            $stmt->bind_param('sssssssi', $username, $email,$target,  $bio, $fb, $insta, $twit, $id);
            $stmt->execute();
        }
        else {
            $_SESSION["message3"] ="try agrin";
        }
        

    }else {
        $_SESSION["message4"] ="Allowed file formats .jpg, .jpeg and .png";
    }

 
    

   

    

    // $photo = $_FILES['profile_img'];
    // $photoName = $_FILES['profile_img']['name'];
    // $upload = "../public/img/".$photoName;

    

    












 
    // $user = new User();
    // $user -> user_update($id,$nom, $prenom,$mail, $password);
   
    
    
    header("location: ../view/blogger_profile.php");

   
}





echo "hhhh";


?>
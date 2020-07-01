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

    

    $photo = $_FILES['profile_img'];
    $photoName = $_FILES['profile_img']['name'];
    $upload = "../public/img/".$photoName;

    

    






$stmt =$db->prepare("UPDATE author SET username=?, email=?,author_img=?, author_bio=?, fb_account=?, insta_account=?, twit_account=? WHERE author_id=?");
$stmt->bind_param('sssssssi', $username, $email, $upload, $bio, $fb, $insta, $twit, $id);
$stmt->execute();





 
    // $user = new User();
    // $user -> user_update($id,$nom, $prenom,$mail, $password);
   
    
    
    // header("location: ../view/login.php");
}





echo "hhhh";


?>
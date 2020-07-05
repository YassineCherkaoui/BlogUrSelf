<?php
 require('../includes/config.php');
 session_start();


if(ISSET($_POST['go'])){

    $title = $_POST['posteTitle'];
    $ctg = $_POST['category'];
    $desc = $_POST['descreption'];
    $form = $_POST['posteForm'];
    $authorID = $_SESSION["author_id"] ;
    $date = date('Y-m-d H:i:s');

    
    $photoName = time() .'-'. $_FILES['poste_img']['name'];
    $target = '../public/postsImg/' . $photoName; 
    $fileError = $_FILES['poste_img']['error'];


    // Get file extension
    $imageExt = strtolower(pathinfo($target, PATHINFO_EXTENSION));
    // Allowed file types
    $allowd_file_ext = array("jpg", "jpeg", "png");

    if (in_array($imageExt, $allowd_file_ext)) {

        if ($fileError == 0) {
            move_uploaded_file($_FILES['poste_img']['tmp_name'],$target);
            $stmt =$db->prepare("INSERT INTO posts (author_id,postImg,postTitle,category,postDesc,postCont,postDate) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('issssss', $authorID, $target, $title, $ctg, $desc,$form, $date);
            $stmt->execute();
        }
        else {
            $_SESSION["message4"] ="try agrin";
        }
        

    }else {
        $_SESSION["message5"] ="Allowed file formats .jpg, .jpeg and .png";
    }



    header("location: ../view/blogger_profile.php");
}


?>




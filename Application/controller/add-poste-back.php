<?php
ob_start();
 require('../model/post.php');
 session_start();


if(ISSET($_POST['go'])){

    $title = $_POST['posteTitle'];
    $ctg = $_POST['category'];
    $form = $_POST['posteForm'];
    $authorID = $_SESSION["author_id"] ;
    $date = date('Y-m-d H:i:s');
    $view = 0;

    
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
            $post = new Post();
            $post -> add_post($authorID, $target, $title, $ctg, $form, $date,$view);
           
            // $stmt =$db->prepare("INSERT INTO posts (author_id,postImg,postTitle,category,postCont,postDate,views) VALUES (?,?, ?, ?, ?, ?, ?)");
            // $stmt->bind_param('isssssi', $authorID, $target, $title, $ctg, $form, $date,$view);
            // $stmt->execute();
        }
        else {
            $_SESSION["message4"] ="try agrin";
        }
        

    }else {
        $_SESSION["message5"] ="Allowed file formats .jpg, .jpeg and .png";
    }



    header("location: ../view/blogger_profile.php");
}


// -----------------------edit post part ------------------------------

if(ISSET($_POST['edit-post'])){

    $title = $_POST['posteTitle'];
    $ctg = $_POST['category'];
    $form = $_POST['posteForm'];
    $poste_id =  $_POST['poste_id'];

    echo $poste_id;

    // $stmt =$db->prepare("UPDATE posts SET postTitle=?,category=?,postCont=? WHERE posteID=?");
    // $stmt->bind_param('sssi', $title, $ctg, $form,$poste_id);
    // $stmt->execute();

    $post_edit = new Post();
    $post_edit ->edit_post($title, $ctg, $form,$poste_id);
   
    
    

    
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
            // $stmt =$db->prepare("UPDATE posts SET postImg=?,postTitle=?,category=?,postCont=? WHERE posteID=?");
            // $stmt->bind_param('ssssi', $target, $title, $ctg, $form,$poste_id);
            // $stmt->execute();

            $post_edit = new Post();
            $post_edit ->edit_post2($target, $title, $ctg, $form,$poste_id);
           
        }
        else {
            $_SESSION["message4"] ="pls try agrin";
        }
        

    }else {
        $_SESSION["message5"] ="Allowed file formats .jpg, .jpeg and .png";
    }
    header("location: ../view/blogger_profile.php");
}
ob_end_flush();
?>
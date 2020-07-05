<?php


//include config
require_once('../includes/config.php');


if (isset($_GET['postId'])) {

    $id = $_GET['postId'];

    $query2 = "DELETE FROM posts WHERE posteID = ?";
    $stmt =$db->prepare($query2);
    $stmt->bind_param("i",$id);
    $stmt->execute();

    header('Location: index.php'); 
    # code...
}
if (isset($_GET['authorId'])) {

    $id = $_GET['authorId'];

    $query2 = "DELETE FROM author WHERE author_id = ?";
    $stmt =$db->prepare($query2);
    $stmt->bind_param("i",$id);
    $stmt->execute();

    header('Location: users.php'); 
    # code...
}
if (isset($_GET['categoryId'])) {

    $id = $_GET['categoryId'];

    $query2 = "DELETE FROM category WHERE id = ?";
    $stmt =$db->prepare($query2);
    $stmt->bind_param("i",$id);
    $stmt->execute();

    header('Location: category.php'); 
    # code...
}
if (isset($_POST['ctg'])) {

    $ctg = $_POST['ctg'];

    $stmt =$db->prepare("INSERT INTO category (name) VALUES (?)");
    $stmt->bind_param('s', $ctg);
     $stmt->execute();

   

    header('Location: category.php'); 
    # code...
}









?>
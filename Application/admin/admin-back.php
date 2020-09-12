<?php
ob_start();

require_once('../model/post.php');
require_once('../model/auther.php');
require_once('../model/category.php');
require_once('../model/comment.php');


if (isset($_GET['postId'])) {

    $id = $_GET['postId'];

    

    $post = new Post();
    $post -> delete_post($id);

    header('Location: index.php'); 
    # code...
}
if (isset($_GET['authorId'])) {

    $id = $_GET['authorId'];
    $user = new Auther();
    $user -> delete_user($id);

    $post = new Post();
    $post ->delete_post_of_user($id);

    $comment = new Comment();
    $comment -> delete_comment_of_user($id);


   

    
    header('Location: users.php'); 


}
if (isset($_GET['categoryId'])) {

    $id = $_GET['categoryId'];

    $delete_category = new Category();
    $delete_category -> delete_category($id);

    header('Location: category.php'); 
    # code...
}
if (isset($_POST['ctg'])) {

    $ctg = $_POST['ctg'];

    $category = new Category();
    $category -> add_category($ctg);
    header('Location: category.php'); 
    # code...
}








ob_end_flush();
?>
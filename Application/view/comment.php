<?php

require_once('../model/comment.php');

 session_start();

 $error = "";
 $comment ="";
 $postID = "";
 $authorID = "";


if(empty($_POST['comment_content'])){
    $error .= '<p class="text-danger">Comment is required</p>';
}
else
{
 $comment = $_POST["comment_content"];
 $postID = $_POST['postID'];
 $authorID = $_SESSION["author_id"] ;
 $date = date('Y-m-d');
}
if($error == '')
{
   
    // $stmt =$db->prepare("INSERT INTO comment (author_id,msg,post_id,date) VALUES (?, ?, ?, ?)");
    // $stmt->bind_param('isis', $authorID, $comment, $postID, $date);
    // $stmt->execute();

    $comment = new Comment();
    $comment ->add_comment($authorID, $comment, $postID, $date);

    $error = '<label class="text-success">Comment Added</label>';

}
$data = array(
    'error'  => $error
   );
   
   echo json_encode($data);
?>
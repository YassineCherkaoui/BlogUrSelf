<?php


require('../model/auther.php');
require('../model/comment.php');



if(ISSET($_POST['postID'])){

    $id =$_POST['postID'];
    $output = '';

    
// $comment_query= "SELECT * FROM comment WHERE post_id=? ORDER BY cid DESC";
// $stmt =$db->prepare($comment_query);
// $stmt->bind_param("i",$id);
// $stmt->execute();
// $comment_result= $stmt->get_result();

$comment = new Comment();
$comment_result = $comment ->show_comment($id);




                
                
                
                
while ($comment_row = $comment_result->fetch_assoc()) { 

    $author_id = $comment_row["author_id"];


    $auther = new Auther();
    $author_result = $auther -> show_info($author_id);


    

    // $author_query= "SELECT * FROM author WHERE author_id=?";
    // $stmt =$db->prepare($author_query);
    // $stmt->bind_param("i",$author_id);
    // $stmt->execute();
    // $author_result= $stmt->get_result();
    $author_row = $author_result->fetch_assoc();

    

    $output .= '<div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" style="
                    width: 50px;
                    height: 50px;
                " src="'.$author_row["author_img"].'" alt="">
                    <div class="media-body"> 
                        <h5 class="mt-0"> By  '.$author_row["username"].' on <span>'.$comment_row["date"].'</span></h5> 
                        '.$comment_row["msg"].'
                        
                    </div>
                    
                </div>';
            }
    
    echo $output;


}


?>
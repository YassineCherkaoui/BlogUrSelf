<?php 


class Comment{

    private $con;

    function __construct(){

        include_once('db.php');
        $db = new Dbconnect();
        $this->con = $db->connect();
    
    }



    function add_comment($authorID, $comment, $postID, $date){

        

        $stmt =$this->con->prepare("INSERT INTO comment (author_id,msg,post_id,date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('isis', $authorID, $comment, $postID, $date);
        $stmt->execute();

    }
    function show_comment($id){


        $comment_query= "SELECT * FROM comment WHERE post_id=? ORDER BY cid DESC";
        $stmt =$this->con->prepare($comment_query);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $comment_result = $stmt->get_result();

        return $comment_result;

    }
    function delete_comment_of_user($id){

        $query2 = "DELETE FROM comment WHERE author_id = ?";
        $stmt = $this->con->prepare($query2);
        $stmt->bind_param("i",$id);
        $stmt->execute();
    }






}

?>
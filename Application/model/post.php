<?php 



class Post {

    private $con;

    function __construct(){

        include_once('db.php');
        $db = new Dbconnect();
        $this->con = $db->connect();
    }


    function add_post($authorID, $target, $title, $ctg, $form, $date,$view){


        // $conn=$this->connect();

        $stmt = $this->con->prepare("INSERT INTO posts (author_id,postImg,postTitle,category,postCont,postDate,views) VALUES (?,?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('isssssi', $authorID, $target, $title, $ctg, $form, $date,$view);
        $stmt->execute();


    }

    function edit_post($title, $ctg, $form,$poste_id){


        // $conn=$this->connect();

        $stmt = $this->con->prepare("UPDATE posts SET postTitle=?,category=?,postCont=? WHERE posteID=?");
        $stmt->bind_param('sssi', $title, $ctg, $form,$poste_id);
        $stmt->execute();

    }

    function edit_post2($target, $title, $ctg, $form,$poste_id){


        // $conn=$this->connect();

        $stmt = $this->con->prepare("UPDATE posts SET postImg=?,postTitle=?,category=?,postCont=? WHERE posteID=?");
        $stmt->bind_param('ssssi', $target, $title, $ctg, $form,$poste_id);
        $stmt->execute();

    }


    function view_all_post(){

        // $conn=$this->connect();

        $query = "SELECT * from posts ";
		$stmt =  $this->con->prepare($query);
		$stmt->execute();
        $result = $stmt->get_result();
        return $result;


    }
    function view_all_post_of_user($author_id){

        // $conn=$this->connect();

        $query = "SELECT * from posts WHERE author_id=?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("i",$author_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;


    }
    function view_last_post(){

        // $conn=$this->connect();

        $query3= "SELECT * FROM posts ORDER BY postDate ASC LIMIT 10";
		$stmt1 = $this->con->prepare($query3);
		$stmt1->execute();
        $result3= $stmt1->get_result();
        return $result3;


    }

    function view_ctg_post($category_name){

        // $conn=$this->connect();

        $query = "SELECT * from posts WHERE category=?";
        $stmt =$this->con->prepare($query);
        $stmt->bind_param("s",$category_name);
		$stmt->execute();
        $result = $stmt->get_result();
        return $result;


    }

    


    
    function view_single_post($poste_id){

        // $conn=$this->connect();

        $query2= "SELECT * FROM posts WHERE posteID=?";
        $stmt = $this->con->prepare($query2);
        $stmt->bind_param("i",$poste_id);
        $stmt->execute();
        $result= $stmt->get_result();

        return $result;


    }

    function update_views($views,$poste_id){

        // $conn=$this->connect();

        $count = "UPDATE posts SET views=? WHERE posteID=?";
        $stmt = $this->con->prepare($count);
        $stmt->bind_param("ii",$views,$poste_id);
        $stmt->execute();


    }

    function delete_post($id){

        $query2 = "DELETE FROM posts WHERE posteID = ?";
        $stmt = $this->con->prepare($query2);
        $stmt->bind_param("i",$id);
        $stmt->execute();
    }
    function delete_post_of_user($id){

        $query2 = "DELETE FROM posts WHERE author_id = ?";
        $stmt = $this->con->prepare($query2);
        $stmt->bind_param("i",$id);
        $stmt->execute();
    }
    
    
    
}









?>
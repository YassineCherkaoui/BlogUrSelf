<?php 


class Auther {


    private $con;

    function __construct(){

        include_once('db.php');
        $db = new Dbconnect();
        $this->con = $db->connect();
    }




    function auther_select($email){

        // $conn=$this->connect();

        $query= "SELECT * FROM author WHERE email=?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result= $stmt->get_result();
        return $result;
    }

    function auther_select_id($author_id){

        // $conn=$this->connect();

        $query2= "SELECT * FROM author WHERE author_id=?";
        $stmt =$this->con->prepare($query2);
        $stmt->bind_param("i",$author_id);
        $stmt->execute();
        $result2= $stmt->get_result();
        return $result2;
    }



    function new_auther($username, $email, $password_hash,$profileImg){


        // $conn=$this->connect();

        $stmt =$this->con ->prepare("INSERT Into author (username,email,password,author_img) values(?,?,?,?)");
		$stmt->bind_param("ssss", $username, $email, $password_hash,$profileImg);
		$stmt->execute();


    }
 


    function update_info($target, $id){


        // $conn=$this->connect();


        $stmt =$this->con->prepare("UPDATE author SET author_img=? WHERE author_id=?");
        $stmt->bind_param('si', $target, $id);
        $stmt->execute();
        

    } 
    function update_info2($username, $email,  $bio, $fb, $insta, $twit, $id){
        // $conn=$this->connect();


        $stmt =$this->con->prepare("UPDATE author SET username=?, email=?, author_bio=?, fb_account=?, insta_account=?, twit_account=? WHERE author_id=?");
        $stmt->bind_param('ssssssi', $username, $email,  $bio, $fb, $insta, $twit, $id);
        $stmt->execute();
        

    } 

    function show_info($author_id){

        // $conn=$this->connect();

        $author_query= "SELECT * FROM author WHERE author_id=?";
        $stmt =$this->con->prepare($author_query);
        $stmt->bind_param("i",$author_id);
        $stmt->execute();
        $author_result= $stmt->get_result();

        return $author_result;


    }

    function delete_user($id){

        $query2 = "DELETE FROM author WHERE author_id = ?";
        $stmt =$this->con->prepare($query2);
        $stmt->bind_param("i",$id);
        $stmt->execute();





    }

    function show_users(){

        $query = "SELECT * from author ";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;

    }
    

























}









?>
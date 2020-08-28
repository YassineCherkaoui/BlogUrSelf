<?php 



class Category {

    private $con;

    function __construct(){

        include_once('db.php');
        $db = new Dbconnect();
        $this->con = $db->connect();
    
    }

    function add_category($ctg){


        $stmt =$this->con->prepare("INSERT INTO category (name) VALUES (?)");
        $stmt->bind_param('s', $ctg);
         $stmt->execute();
    
    }
    function delete_category($id){


        $query2 = "DELETE FROM category WHERE id = ?";
        $stmt =$this->con->prepare($query2);
        $stmt->bind_param("i",$id);
        $stmt->execute();
    
    }
    function show_category( ){


        $query = "SELECT * from category ";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

      return $result;
    
    }
    














}


?>
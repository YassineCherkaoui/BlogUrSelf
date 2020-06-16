<?php

class Blog_posts{
    function __construct() {
        
    }




    function post_show() {



        $query = "SELECT * FROM blog_posts ORDER BY postDate DESC";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return  $result;
            
    }



}






?>
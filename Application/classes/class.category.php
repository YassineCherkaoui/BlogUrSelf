<?php


class Category{

    private $db;

	function __construct($db){
		parent::__construct();

		$this->_db = $db;
	}

    function category_show_id($id) {

        $query = "SELECT * from category where id='$id'";
        $stmt = $this->_db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return  $result;
            
    }






}

?>
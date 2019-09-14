<?php

class Categories{
    private $id;
    private $name;
    private $db;
    
    public function __construct() {
        $this->db= Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $this->db->real_escape_string($name);
    }
    
    public function allCategories(){
        $sql = "SELECT * FROM categories ORDER BY id DESC";
        $query = $this->db->query($sql);
        
        $result = false;
        if($query && $query->num_rows >=1){
            $result = $query;
        }return $result;
                
    }
     public function saveCategory(){
        $name = $this->name;
        $sql = "INSERT INTO categories VALUES(null, '$name') ";
        $register = $this->db->query($sql);
        $result = false;
        if($register){
           $result=true; 
        }
        return $result;
        
        
    }

    
}

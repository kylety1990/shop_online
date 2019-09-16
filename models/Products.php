<?php

class Product{
    private $id;
    private $category_id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $offer;
    private $date;
    private $image;
    private $db;
    
    function getId() {
        
        return $this->id;
    }

    function getCategory_id() {
        return $this->category_id;
    }

    function getName() {
        return $this->name;
    }

    function getDescription() {
        return $this->description;
    }

    function getPrice() {
        return $this->price;
    }

    function getStock() {
        return $this->stock;
    }

    function getOffer() {
        return $this->offer;
    }

    function getDate() {
        return $this->date;
    }

    function getImage() {
        return $this->image;
    }

    function setId($id) {
        $this->id = $this->db->real_escape_string($id);
    }

    function setCategory_id($category_id) {
        $this->category_id = $this->db->real_escape_string($category_id);
    }

    function setName($name) {
        $this->name = $this->db->real_escape_string($name);
    }

    function setDescription($description) {
        $this->description = $this->db->real_escape_string($description);
    }

    function setPrice($price) {
        $this->price = $this->db->real_escape_string($price);
    }

    function setStock($stock) {
        $this->stock = $this->db->real_escape_string($stock);
    }

    function setOffer($offer) {
        $this->offer = $this->db->real_escape_string($offer);
    }

    function setDate($date) {
        $this->date = $this->db->real_escape_string($date);
    }

    function setImage($image) {
        $this->image = $this->db->real_escape_string($image);
    }

    public function __construct() {
        $this->db = Database::connect();
        $this->offer = "no";
    }
    
    public function getAll(){
        $sql = 'SELECT * FROM products ORDER BY id DESC';
        $query = $this->db->query($sql);
        $result = false;
        if($query && $query->num_rows >=1){
            $result = $query;
        }

        return $result;
        
    }
    public function saveProduct(){
        $category_id = $this->getCategory_id();
        $name = $this->getName();
        $description = $this->getDescription();
        $price = $this->getPrice();
        $stock = $this->getStock();
        $offer = $this->getOffer();
        $sql = "INSERT INTO products VALUES(null, '$category_id', '$name', '$description', '$price', '$stock', '$offer', CURDATE(), null)";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    public function searchName($name){
       
        $sql = "SELECT * FROM products WHERE name LIKE '%$name%' ORDER BY id DESC";

        $search = $this->db->query($sql);
        $result=false;
        if($search && $search->num_rows >=1){
            $result = $search;
        }

        return $result;
    }
    
    public function searchId($id){
        
        $sql = "SELECT * FROM products WHERE id = '$id'";
        
        $search = $this->db->query($sql);
        $result =false;
        
        if($search && $search->num_rows ==1){
            $result = $search;
        }
        
        return $result;
        
    }
    
    public function modifyProduct(){
        $id = $this->getId();
        $category_id = $this->getCategory_id();
        $name = $this->getName();
        $description = $this->getDescription();
        $price = $this->getPrice();
        $stock = $this->getStock();
        $sql = "UPDATE products SET category_id= '$category_id', name='$name', description= '$description', price = '$price', stock='$stock' WHERE id = '$id' ";
        
        $modify = $this->db->query($sql);
        $result= false;
        if($modify){
            
        $result = true;
        }
         return $result;
        
    }
    
    
    public function deleteProducts(){
        $id = $this->getId();
        $sql = "DELETE FROM products WHERE id = '$id'";

        $delete = $this->db->query($sql);
        $result = false;
        if($delete){
            $result = true;
        }
        
        return $result;
        
    }
    
    
}

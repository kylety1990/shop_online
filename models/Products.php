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
        $sql = "INSERT INTO products VALUES(null, '$category_id', '$name', '$description', '$price', '$stock', null, CURDATE(), null)";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    
}

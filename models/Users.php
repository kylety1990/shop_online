<?php

class Users{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $password;
    private $rol;
    private $image;
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

    function getSurname() {
        return $this->surname;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    function getRol() {
        return $this->rol;
    }

    function getImage() {
        return $this->image;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $this->db->real_escape_string($name);
    }

    function setSurname($surname) {
        $this->surname = $this->db->real_escape_string($surname);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setImage($image) {
        $this->image = $image;
    }


    public function save(){
        
        $sql= "INSERT INTO users VALUES(null, '{$this->getName()}','{$this->getSurname()}','{$this->getEmail()}','{$this->getPassword()}', 'user' , null);";
        $register = $this->db->query($sql);
            $result = false;
        if($register){
           $result=true; 
        }
        return $result;
    }
    
    public function login(){
        
        $email = $this->email;
        $password = $this->password;
        $sql= "Select * FROM users WHERE email='$email'";
        $login = $this->db->query($sql);
        $result = false;
        
        if($login && $login->num_rows ==1){
            $user= $login->fetch_object();
            
            $verify = password_verify($password, $user->password);
            
            if($verify){
                $result = $user;
            }
            
        } 
        
        return $result;
    }
    
    
}

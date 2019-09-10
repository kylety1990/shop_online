<?php

class UserController{
    public function index(){
        echo 'Controlador usuario, accion index';
    }
    
    public function register(){
        require_once 'views/users/register.php';
    }
    
    public function save(){
        require_once 'views/users/save.php';
    }
}
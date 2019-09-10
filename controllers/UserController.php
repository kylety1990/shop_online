<?php
require_once 'models/users.php';

class UserController{
    public function index(){
        echo 'Controlador usuario, accion index';
    }
    
    public function register(){
        require_once 'views/users/register.php';
    }
    
    public function save(){
        if(isset($_POST)){
            $user = new Users();
            $user->setName($_POST['name']);
            $user->setSurname($_POST['surname']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            
            var_dump($user);
  //          var_dump($user['surname']);
    //        var_dump($user['email']);
      //      var_dump($user['password']);
            }
                
   
    }
}
<?php

require_once 'models/users.php';

class UserController {

    public function index() {
        echo 'Controlador usuario, accion index';
    }

    public function register() {
        require_once 'views/users/register.php';
    }

    public function save() {
        if (isset($_POST)) {
            $name = isset($_POST['name'])? $_POST['name']: false;
            $surname = isset($_POST['surname'])? $_POST['surname']: false;
            $email= isset($_POST['email'])? $_POST['email']: false;
            $password= isset($_POST['password'])? $_POST['password']: false;
            
            $_SESSION['error']=[];
            
            if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
                $name_validate = $name;
            }else{
                $name_validate = false;
                $_SESSION['error']['name']= 'Nombre incorrecto';
            }
             if(!empty($surname) && !is_numeric($surname) && !preg_match("/[0-9]/", $surname)) {
                $surname_validate = $surname;
            }else{
                $surname_validate = false;
                $_SESSION['error']['surname']= 'Apellido incorrecto';
            }
            
                //validadion Email;
            if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email_validate = $email;
        
            }else{
                $email_validate = false;
                $_SESSION['error']["email"] = "El email es incorrecto";
            }
            if(!empty($password)){
                $password_validate = $password;
        
            }else{
                $password_validate = false;
                $_SESSION['error']["password"] = "El password es incorrecto";
    }
            
            $user = new Users();
            $user->setName($name);
            $user->setSurname($surname);
            $user->setEmail($email);
            $user->setPassword($password_validate);
            $save = $user->save();

            if ($save) {
                $_SESSION['register'] = "completed";
                
            } else {
                $_SESSION['register'] = "failed";
            }
        }else {
            $_SESSION['register'] = "failled";
            
        }
        header('Location: '.base_url.'user/register');
    }
    public function login(){
        
         if (isset($_POST)) {
           $user = new Users();
           $user->setEmail($_POST['email']);
           $user->setPassword($_POST['password']);
           $identity = $user->login();
           
           if($identity && is_object($identity)){
               $_SESSION['identity']= $identity;
               if($identity->rol == 'admin'){
                  $_SESSION['admin']= true;
               }
           }else{
               $_SESSION['error']= "error de login";
           }
         }else{
              $_SESSION['error']= "error de login";
         }
         header('Location: '.base_url);
        }
        
    public function logout(){
        
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }
        
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        header('Location:'.base_url);
        
    }
    
    public function category(){
        require_once 'views/users/createCategory.php';
    }
    public function saveCategory(){
        if(isset($_POST)){
            $name = isset($_POST['name'])? $_POST['name']: false;
            
            $_SESSION['error']=[];
            
            if(!empty($name) && !is_numeric($name)) {
                $name_validate = $name;
            }else{
                $name_validate = false;
                $_SESSION['error']['name']= 'Nombre incorrecto';
            }
            
            
            
        }
    }

}

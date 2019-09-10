<?php

require_once 'autoload.php';

if(isset($_GET['controller'])){
    $name_controller= $_GET['controller'].'controller';
}else{
    echo 'La página que buscas no existe.';
    exit();
}

if(class_exists($name_controller)){
    $controller= new $name_controller();
    
    if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }else{
        echo "La página que buscas no existe.";
    }
    }else{
       echo "La página que buscas no existe.";
      }

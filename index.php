<?php

require_once 'autoload.php';
require_once 'config/parameters.php';
require_once 'views/layout/header.php';
require_once 'views/layout/side.php';


if(isset($_GET['controller'])){
    $name_controller= $_GET['controller'].'controller';
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $name_controller= controller_default;
}

else{
        $error = new ErrorController();
        $error->index();
        exit();
}

if(class_exists($name_controller)){
    $controller= new $name_controller();
    
        if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
            $action = $_GET['action'];
            $controller->$action();
        }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
            $action_default= action_default;
            $controller->$action_default();
        }else{
            $error = new ErrorController();
            $error->index();
        }
    }else{
            $error = new ErrorController();
            $error->index();
    }

      
require_once 'views/layout/footer.php';
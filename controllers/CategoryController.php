<?php
require_once 'models/Categories.php';

class CategoryController{
   
        public function index(){
        Utils::isAdmin();
        $categories = new Categories();
        $allCategories = $categories->allCategories();
        
        require_once 'views/categories/index.php';
        
       
        
    }
    
    public function createCategory(){
        Utils::isAdmin();
        require_once 'views/categories/create.php';
    }
    
    public function saveCategory(){
        Utils::isAdmin();
        
        if(isset($_POST)){
            
            
            $name = isset($_POST['name'])? $_POST['name']: false;
            
            $_SESSION['error']=[];
            
            if(!empty($name) && !is_numeric($name)) {
                $name_validate = $name;
            }else{
                $name_validate = false;
                $_SESSION['error']['name']= 'Nombre incorrecto';
            }
            
            $category = new Categories();
            $category->setName($name);
            $save= $category->saveCategory();

             if ($save) {
                $_SESSION['create'] = "completed";
                
            } else {
                $_SESSION['create'] = "failed";
            }
        }else {
            $_SESSION['create'] = "failled";
            
            
        }
        header('Location:'.base_url.'category/index');
    }
}


<?php
require_once 'models/products.php';
class ProductController{
    public function index(){
        
        
        
        require_once 'views/products/featured.php';
    }
    public function management(){
        Utils::isAdmin();
        
        $product = new Product();
        $products = $product->getAll();

        require_once 'views/products/management.php';
    }
    
    public function create(){
         Utils::isAdmin();
         

         require_once 'views/products/create.php';
    }
    
    public function saveProduct(){
        
        Utils::isAdmin(); 

        if(isset($_POST)){
            $category_id= isset($_POST['category']) ? $_POST['category'] : false ;
            $name = isset($_POST['name'])? $_POST['name']: false;
            $description = isset($_POST['description'])? $_POST['description']: false;
            $price = isset($_POST['price'])? $_POST['price']: false;
            $stock= isset($_POST['stock'])? $_POST['stock']: false;
            //$image= isset($_POST['image'])? $_POST['image']: false;
            $_SESSION['error']=[];
            
            if(!empty($name) && !is_numeric($name)){
                $name_validate =$name;
            }else{
                $_SESSION['error']['name']= 'Nombre erroneo, inserte de nuevo';
            }
            
            if(!empty($description)){
                $description_validate = $description;
            }else{
                $_SESSION['error']['description']= 'descripcion vacia, inserte algo por favor';
            }
            
            if(!empty($price) && is_numeric($price) ){
                $price_validate = $price;
            }else{
                $_SESSION['error']['price']= 'Precio erroneo, inserte otro dato por favor';
            }
            
            if(!empty($stock) && is_numeric($stock)){
                $stock_validate = $stock;
            }else{
                $_SESSION['error']['stock']= 'Precio erroneo, inserte otro dato por favor';
            }
             if(!empty($image)){
                $image_validate = $image;
            }else{
                $_SESSION['error']['image']= 'imagen vacia, inserte una imagen por favor';
            }
            
            $product = new Product();
            $product->setCategory_id($category_id);
            $product->setName($name_validate);
            $product->setDescription($description_validate);
            $product->setPrice($price_validate);
            $product->setStock($stock_validate);
            //$product->setImage($image_validate);
            $save = $product->saveProduct();
            
            if($save){
                $_SESSION['product']='Completed';
            }else{
                $_SESSION['product']='failled';
            }
            
           
        }else{
            $_SESSION['product']='failled';
        }
        header('Location:'.base_url.'product/management');
    }
    
}

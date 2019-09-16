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
    
    public function modify(){
        Utils::isAdmin();
        require_once 'views/products/modify.php';
    }
    
    public function modifyProduct(){
        Utils::isAdmin();
        
        $products = [];
        if(!empty($_POST['name'])){
        $datos= $_POST['name'];
        $product = new Product();
        $products = $product->searchName($datos);

        }
        elseif(!empty($_POST['id'])){
        $datos = $_POST['id']  ;
        $product = new Product();
        $products = $product->searchId($datos);
        
        }else{
            header('Location:'.base_url.'product/modify');
        }
        
        
      
        require_once 'views/products/modify2.php';
        
    }
   public function saveModify(){
       Utils::isAdmin();
      
        if(isset($_POST)){
            $id= isset($_POST['id']) ? $_POST['id'] : false ;
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
            

            $product = new Product();
            $product->setId($id);
            $product->setCategory_id($category_id);
            $product->setName($name_validate);
            $product->setDescription($description_validate);
            $product->setPrice($price_validate);
            $product->setStock($stock_validate);
             
            
            $save = $product->modifyProduct();
            
            
            if($save){
                $_SESSION['modify']='Producto modificado correctamente';
            }else{
                $_SESSION['modify']='No se ha podido modificar el producto, vuelva a intentarlo';
            }
            
           
        }else{
            $_SESSION['modify']='No se ha podido modificar el producto, vuelva a intentarlo';
        }
        header('Location:'.base_url.'product/management');
   }
    
    public function delete(){
        Utils::isAdmin();
        require_once 'views/products/delete.php';
    }
    
    public function deleteProduct(){
        Utils::isAdmin();
        
        if(isset($_POST)){
            $id = isset($_POST['id']) ? $_POST['id']: false;
            $_SESION['error']=[];
            if(!empty($id)){
                $validate_id = $id;
            }else{
                $_SESSION['error']['id']= "El id introducido es erroneo";
            }
            
            $product = new Product();
            $product->setId($validate_id);

            $delete = $product->deleteProducts();
            
            if($delete && $delete->num_rows == 1){
                $_SESSION['delete']= 'Deleted completed';
            }else{
                $_SESSION['delete']= 'Deleted failled';
            }
        } else{
            $_SESSION['delete']= 'Deleted failled';
        }
        header('Location:'.base_url.'product/management');
    }
    
    public function productById(){
        Utils::isAdmin();
        $data = $_POST['id'];
       
    if(empty($data)) {
        header('Location:'.base_url.'product/modifyProduct');
    }   
    else{
        
        $product = new Product();
        $object = $product->searchId($data);
        
        if(is_object($object)){
            $result = $object->fetch_object();
            require_once 'views/products/modifyViews.php';
        }else{
            $_SESSION['search']='El id introducido no existe, busque otro producto';
            header('Location:'.base_url.'product/modifyProduct');
        }
          
        }
        
        
        
        
    }
    
}

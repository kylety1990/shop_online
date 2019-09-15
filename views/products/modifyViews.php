<h1>Modificar</h1>
<?php $products = Utils::showProducts();?>
<?php    $data = $_POST['id'];?>


<?php $verify= Utils::checkData($data);?>


<?php if($verify):?>
<?php $categories = Utils::showCategories();?>

<form action="<?= base_url;?>product/saveModify" method="POST">
    <label for="category">Categoria</label>
    <select name="category">
    <?php while($category = $categories->fetch_object()) : ?>
        <option value="<?=$category->id?>"><?= $category->name;?></option>
    <?php endwhile; ?>
    </select>
   
    <?php if(isset($_SESSION['error']['name'])){echo $_SESSION['error']['name'];}?>
    <label for="name">Nombre</label>
    <input type="text" name="name" required>
    <?php if(isset($_SESSION['error']['descrition'])){echo $_SESSION['error']['description'];}?>
    <label for="description">Descripción</label>
    <textarea name="description" rows="10" cols="50" required></textarea>
    <?php if(isset($_SESSION['error']['price'])){echo $_SESSION['error']['price'];}?>
    <label for="price">Precio</label>
    <input type="text" name="price" required>
    <?php if(isset($_SESSION['error']['stock'])){echo $_SESSION['error']['stock'];}?>
    <label for="stock">stock</label>
    <input type="number" name="stock" required> 
    <?php if(isset($_SESSION['error']['image'])){echo $_SESSION['error']['image'];}?>
    <label for="image">Imagen</label>
    <input type="file" name="image" >
    <input type="submit" value="Crear">
    
</form>
<?php else : ?>

    <?php header('Location:'.base_url.'product/modifyViews');?>
<?php endif; ?>

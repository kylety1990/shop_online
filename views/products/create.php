<h1>Crea tu producto</h1>

<?php $categories = Utils::showCategories();?>

<form action="<?= base_url;?>product/saveProduct" method="POST">
    <label for="category">Categoria</label>
    <select name="category">
    <?php while($category = $categories->fetch_object()) : ?>
        <option value="<?=$category->id?>"><?= $category->name;?></option>
    <?php endwhile; ?>
    </select>
    <label for="name">Nombre</label>
    <input type="text" name="name" required>
    <label for="description">Descripción</label>
    <textarea name="description" rows="10" cols="50" required></textarea>
    <label for="price">Precio</label>
    <input type="text" name="price" required>
    <label for="stock">stock</label>
    <input type="number" name="stock" required> 
    <label for="image">Imagen</label>
    <input type="file" name="image" >
    <input type="submit" value="Crear">
</form>
<h1>Gestion de productos</h1>


<a href="<?= base_url;?>product/create" method="POST" class="button button-small tres">Crear Producto</a>
<a href="<?= base_url;?>product/modify" method="POST" class="button button-small tres">Edita Productos</a>
<a href="<?= base_url;?>product/delete" method="POST" class="button button-small tres">Elimina Productos</a><br>

<?php if(isset($_SESSION['product'])):?>

    <strong class='alert_green'><?= $_SESSION['product']; ?></strong>

<?php elseif(isset($_SESSION['delete'])):?>

    <strong class="alert_green"><?= $_SESSION['delete'];?></strong>


<?php endif; ?>

<table border="1">
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Offer</th>
    </tr>
        
<?php if($products):?>
<?php while($product = $products->fetch_object()) : ?>
    <tr>

        <td><?= $product->id; ?></td>
        <td><?= $product->name; ?></td>
        <td><?= $product->description; ?></td>
        <td><?= $product->price; ?></td>
        <td><?= $product->stock; ?></td>
        <td><?= $product->offer; ?></td>

    </tr>
<?php endwhile; ?>
<?php else : ?>
    <strong><br><?= 'No existen Productos por el momento, pulse el boton crear'; ?></strong>
<?php endif; ?>
    </table>
<?php Utils::deleteSession('product');?>
<?php Utils::deleteSession('delete');?>
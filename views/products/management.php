<h1>Gestion de productos</h1>


<a href="<?= base_url;?>product/create" method="POST" class="button button-small tres">CREA TU NUEVO PRODUCTO</a>
<a href="<?= base_url;?>product/modify" method="POST" class="button button-small tres">EDITA TUS PRODUCTOS</a>
<a href="<?= base_url;?>product/delete" method="POST" class="button button-small tres">ELIMINA TUS PRODUCTOS</a>


<table border="1">
    <tr>
        <th>Id</th>
        <th>Category_id</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Offer</th>
        <th>Fecha</th>
        <th>Imagen</th>
    </tr>
        
<?php if($products):?>
<?php while($product = $products->fetch_object()) : ?>
    <tr>

        <td><?= $product->id; ?></td>
        <td><?= $product->category_id; ?></td>
        <td><?= $product->name; ?></td>
        <td><?= $product->description; ?></td>
        <td><?= $product->price; ?></td>
        <td><?= $product->stock; ?></td>
        <td><?= $product->offer; ?></td>
        <td><?= $product->date; ?></td>
        <td><?= $product->image; ?></td>
    </tr>
<?php endwhile; ?>
<?php else : ?>
    <strong><?= 'No existen Productos por el momento, pulse el boton crear'; ?></strong>
<?php endif; ?>
    </table>
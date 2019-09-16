<h1>Editar productos</h1>
    
<a href="<?= base_url;?>product/modify" class="button button-small button-return"><= Volver</a>
    
<form action="<?= base_url;?>product/productById" method="POST">
    
    <label for='id'>Inserta su Id</label>
    <input text='text' name='id'/>
    <input type="submit" value='Seleccionar'/>
    
</form><br>
<table border='1'>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Oferta</th>
    </tr>
    <?php if($products) :?>
    <?php while($product = $products->fetch_object()):?>
    <tr>
        <td><?= $product->id;?></td>
        <td><?= $product->name;?></td>
        <td><?= $product->description;?></td>
        <td><?= $product->price;?></td>
        <td><?= $product->stock;?></td>
         <td><?= $product->offer;?></td>
    <?php endwhile; ?>  
    </tr>
     <?php else :?>   
    <strong class='alert_red'><?= 'No se han encontrado productos que contengan con ese nombre';?></strong>
    <?php endif;?>
</table>
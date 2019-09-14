<h1>Gestionar Categoria</h1>


<a href="<?= base_url;?>category/createCategory" class="button button-small">Crear categoria</a>
<table border="1">
    <tr>
        <th>Id</th>
        <th>Name</th>
    </tr>
<?php if($allCategories):?>
<?php while($category = $allCategories->fetch_object()) : ?>
    <tr>
        <td><?= $category->id; ?></td>
        <td><?= $category->name; ?></td>
    </tr>
<?php endwhile; ?>
<?php else : ?>
    <strong><?= 'No existen categorias por el momento, pulse el boton crear'; ?></strong>
<?php endif; ?>
    </table>

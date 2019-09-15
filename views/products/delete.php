<h1>Borrado de productos</h1>


<form action='<?= base_url; ?>product/deleteProduct' method="POST">
    <label for='id'>Inserte numero ID del producto</label>
    <input type="number" name="id">
    <input type="submit" value='borrar'>
</form>


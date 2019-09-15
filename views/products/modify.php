<h1>Editar productos</h1>

<form action='<?= base_url; ?>product/modifyProduct' method="POST">
    
    <label for='name'>Buscar por nombre</label>
    <input text='text' name='name'/>
    <label for='id'>Buscar por id</label>
    <input type="number" name='id'/>
    <input type="submit" value='buscar'/>
</form>
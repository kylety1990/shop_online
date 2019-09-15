<h1>Crear Categoria</h1>

<form action='<?= base_url?>Category/saveCategory' method="POST">
    <?php if(isset($_SESSION['error']['name'])) :?>
    <strong class="alert_red"> <?= $_SESSION['error']['name'];?></strong>
    <?php endif; ?>
    <label for='name'>Nombre</label>
    <input type='text' name='name' required/>
   
    
    <input type="submit" value="Crear Categoria"/>
</form>

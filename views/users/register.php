<h1>Registrarse</h1>


<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'completed'):?>
    <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong class="alert_red">Registro fallido</strong>
<?php endif; ?>

<?php Utils::deleteSession('register');?>

<form action='<?= base_url?>user/save' method="POST">
    <?php if(isset($_SESSION['error']['name'])) :?>
    <strong class="alert_red"> <?= $_SESSION['error']['name'];?></strong>
    <?php endif; ?>
    <label for='name'>Nombre</label>
    <input type='text' name='name' required/>
    <?php if(isset($_SESSION['error']['surname'])) :?>
    <strong class="alert_red"> <?= $_SESSION['error']['surname'];?></strong>
    <?php endif; ?>
    <label for='surname'>Apellidos</label>
    <input type='text' name='surname' required/>
    <?php if(isset($_SESSION['error']['email'])) :?>
    <strong class="alert_red"> <?= $_SESSION['error']['email'];?></strong>
    <?php endif; ?>
    <label for='email'>Email</label>
    <input type='email' name='email' required/>
    <?php if(isset($_SESSION['error']['password'])) :?>
    <strong class="alert_red"> <?= $_SESSION['error']['password'];?></strong>
    <?php endif; ?>
    <label for="password">Password</label>
    <input type='password' name='password' required/>
    
    <input type="submit" value="Registrarse"/>
</form>


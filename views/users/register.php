<h1>Registrarse</h1>

<form action='<?= base_url?>user/save' method="POST">
    <label for='name'>Nombre</label>
    <input type='text' name='name' required/>
    
    <label for='surname'>Apellidos</label>
    <input type='text' name='surname' required/>
    
    <label for='email'>Email</label>
    <input type='email' name='email' required/>
    
    <label for="password">Password</label>
    <input type='password' name='password' required/>
    
    <input type="submit" value="Registrarse"/>
</form>

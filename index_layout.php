<!DOCTYPE HTML>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>TIENDA ONLINE</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div id="container">
            <!-- CABECERA -->    
            <header id="header">
                <div id="logo">
                    <img src="assets/img/logo.png" alt="logo"/>
                    <a href="index.php">
                        SHOP ONLINE
                    </a>
                </div>
            </header>

            <!-- MENU -->
            <nav id="menu">
                <ul>
                    <li>
                        <a href="#">Inicio</a>
                    </li>
                    <li>
                        <a href="#">Calzado</a>
                    </li>
                    <li>
                        <a href="#">Ropa</a>
                    </li>
                    <li>
                        <a href="#">Accesorios</a>
                    </li>
                    <li>
                        <a href="#">Contacto</a>
                    </li>
                </ul>
            </nav>
            <div id="content">

                <!-- BARRA LATERAL -->
                <aside id="side">
                    <div id="login" class="block_aside">
                        <h3>Entrar a tu cuenta</h3>
                        <form action="" method="POST">
                            <label for="email">Email</label>
                            <input type="email" name="email">
                            <label for="password">Password</label>
                            <input type="password" name="password">  
                            <input type="submit" value="Entrar">
                        </form>
                        <ul>
                            <li>
                                <a href="">Mis pedidos</a>  
                            </li>
                            <li>
                                <a href="">Gestionar pedidos</a> 
                            </li>
                            <li>
                                <a href="">Gestionar categorias</a>
                            </li>
                           </ul> 
                       

                    </div>
                </aside>

                <!-- CONTENIDO PRINCIPAL -->
                <div id="central">
                    <h1>Productos destacados</h1>
                    <div class="product">
                        <img src="assets/img/camiseta.png">
                        <h2>Camiseta Fornite</h2>
                        <p>20€</p>
                        <a href="" class="button">Comprar</a>
                    </div>
                    <div class="product">
                        <img src="assets/img/camiseta.png">
                        <h2>Camiseta Fornite</h2>
                        <p>20€</p>
                        <a href="" class="button">Comprar</a>
                    </div>
                    <div class="product">
                        <img src="assets/img/camiseta.png">
                        <h2>Camiseta Fornite</h2>
                        <p>20€</p>
                        <a href="" class="button">Comprar</a>
                    </div>
                </div>

            </div>

            <!-- FOOTER -->
            <footer id="footer">
                <p>Desarrollado por Christian Albano &COPY; <?= date('Y') ?></p>
            </footer>
        </div>

    </body> 
</html>

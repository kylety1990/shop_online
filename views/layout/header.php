<!DOCTYPE HTML>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>TIENDA ONLINE</title>
        <link rel="stylesheet" href="<?=base_url?>assets/css/style.css">
    </head>
    <body>
        <div id="container">
            <!-- CABECERA -->    
            <header id="header">
                <div id="logo">
                    <img src="<?=base_url?>assets/img/logo.png" alt="logo"/>
                    <a href="<?=base_url?>">
                        SHOP ONLINE
                    </a>
                </div>
            </header>

            <!-- MENU -->
            <?php $categories = Utils::showCategories(); ?>
            <nav id="menu">
                <ul>
                    <li>
                        <a href="<?= base_url;?>">Inicio</a>
                    </li>
                    
                    <?php while($category = $categories->fetch_object()) :?>
                    <li>
                        <a href="<?= base_url;?>"><?= $category->name;?></a>
                    </li>
                    <li>
                        <a href="#">Contacto</a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </nav>
            <div id="content">
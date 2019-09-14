<!-- BARRA LATERAL -->
                <aside id="side">
                    <div id="login" class="block_aside">
                        <?php if(!isset($_SESSION['identity'])): ?>
                        <h3>Entrar a tu cuenta</h3>
                        <form action="<?= base_url?>user/login" method="POST">
                            <label for="email">Email</label>
                            <input type="email" name="email">
                            <label for="password">Password</label>
                            <input type="password" name="password">  
                            <input type="submit" value="Entrar">
                        </form>
                        
                        <?php else :?>
                            
                            <h3><?= 'Bienvenid@ '.$_SESSION['identity']->name. ", ".$_SESSION['identity']->surname ;?></h3>
                                             
                        <?php endif; ?>
                        
                        
                        <ul>
                             
                            <?php if(isset($_SESSION['admin'])) : ?>
                            <li><a href="">Gestionar pedidos</a></li>
                            <li><a href="<?= base_url;?>category/index">Gestionar categorias</a></li>
                            <li><a href="<?= base_url;?>product/management">Gestionar productos</a></li>
                            <li><a href="<?= base_url;?>user/logout">Desconectar</a></li>
                            <?php elseif(isset($_SESSION['identity']) && !isset($_SESSION['admin']) ): ?>
                            <li><a href="">Mis pedidos</a></li>
                            <li><a href="<?= base_url;?>user/logout">Desconectar</a></li>
                            <?php else: ?>
                            <li><a href="<?=base_url;?>user/register">Registrate</a></li>
                            <?php endif; ?>
                           
                        </ul> 
                       

                    </div>
                </aside>

                <!-- CONTENIDO PRINCIPAL -->
                <div id="central">
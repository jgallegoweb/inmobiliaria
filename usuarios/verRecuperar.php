<?php
require '../require/comun.php';
$sesion = new Sesion();
$sesion->siAutentificado("../index.php?e=20");
$bd = new BaseDatos();
$error =  Leer::get("e");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inmobiliaria</title>
        <link rel="stylesheet" type="text/css" href="../css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../css/estilos.css" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <header>
            <img src="../img/logo.png">
        </header>
        <section id="buscador">
            <h1>Registrate o Identifícate</h1>
        </section>
        <?php
        if($error!=null){
        ?>
        <section id="error">
            <?php
            echo Util::muestraMensaje($error);
            ?>
        </section>
        <?php 
        }
        ?>
        <section>
            <div class="centrador">
                <div class="iden centrado">
                    <form action="phpRecuperar.php" method="POST">
                        <label><br/><input type="text" class="login-1" name="recuerdo" value="" placeholder="Usuario o Email"/></label>
                        <input type="submit" value="Recuperar pass" />
                    </form>
                    
                </div>
                
            </div>
        </section>
        <footer>aa</footer>
    </body>
</html>
<?php
require '../require/comun.php';
$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);
$sesion = new Sesion();
$error=Leer::get("e");
$sesion->noAutentificado("verLogin.php");
$objeto = $modelo->get($sesion->getUsuario());
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
            Zona de usuario de <?php echo $objeto->getLogin(); ?>
        </section>
        <?php
        if($error!=0){
        ?>
        <section id="error">
            Ha ocurrido un error.
        </section>
        <?php 
        }
        ?>
        <section>
            
            <div class="clear"></div>
        </section>
        <footer>aa</footer>
    </body>
</html>
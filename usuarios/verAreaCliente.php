<?php
require '../require/comun.php';
$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);
$sesion = new Sesion();
$error=Leer::get("e");
$sesion->noAutentificado("verLogin.php?e=32");
$objeto = $sesion->getUsuario();
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
        <section id="titulolugar">
            <h1>Zona de usuario de <?php echo $objeto->getLogin(); ?></h1>
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
        <section id="principalcliente">
            
            <a href="../index.php" class="inicio-1">Página de inicio</a>
            <a href="../viewGestion.php" class="anuncios-1">Gestión de anuncios</a>
            <?php
                if($objeto->getIsroot() == 1){
            ?>
            <a href="backUsuarios.php" class="usuarios-1">Gestión de usuarios</a>
            <?php
                }
            ?>
            <a href="verEditar.php" class="perfil-1">Ver perfil</a>
            <a href="phpSalir.php" class="salir-1">Cerrar Sesión</a>
            
        </section>
        <footer>aa</footer>
    </body>
</html>
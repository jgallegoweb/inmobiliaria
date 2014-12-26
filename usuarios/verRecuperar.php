<?php
require '../require/comun.php';
$sesion = new Sesion();
$sesion->siAutentificado("../index.php");
$bd = new BaseDatos();
$mensaje =  Leer::get("mensaje");
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
        if($mensaje!=0){
        ?>
        <section id="error">
            <?php
                if($mensaje==1){
            ?>
                No existe el usuario o el correo.
            <?php
                }
            ?>
            <?php
                if($mensaje==2){
            ?>
                Se ha enviado un mensaje a su dirección de correo electrónico.
            <?php
                }
            ?>
        </section>
        <?php 
        }
        ?>
        <section>
            <div class="centrador">
                <div class="iden">
                    <form action="phpRecuperar.php" method="POST">
                        <label>Usuario / Correo<br/><input type="text" name="recuerdo" value="" /></label>
                        <input type="submit" value="Recuperar pass" />
                    </form>
                    
                </div>
                
            </div>
        </section>
        <footer>aa</footer>
    </body>
</html>
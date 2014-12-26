<?php
require '../require/comun.php';
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
            <h1>Elige una nueva pass</h1>
        </section>
        <?php
        if($mensaje!=0){
        ?>
        <section id="error">
            Ha ocurrido un error, inténtelo de nuevo.
        </section>
        <?php 
        }
        ?>
        <section>
            <div class="centrador">
                <div class="iden">
                    <form action="phpNuevaPass.php" method="POST">
                        <label>Nueva pass<br/><input type="text" name="recuerdo" value="" /></label>
                        <label>Confirma pass<br/><input type="text" name="recuerdo" value="" /></label>
                        <input type="submit" value="Guardar pass" />
                    </form>
                    
                </div>
                
            </div>
        </section>
        <footer>aa</footer>
    </body>
</html>
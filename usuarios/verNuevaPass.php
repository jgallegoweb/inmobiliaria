<?php
require '../require/comun.php';
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
            <h1>Elige una nueva pass</h1>
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
                <div class="iden">
                    <form action="phpNuevaPass.php" method="POST">
                        <input type="hidden" name="cod" value="<?php echo Leer::get("cod"); ?>">
                        <input type="hidden" name="login" value="<?php echo Leer::get("login"); ?>">
                        <label>Nueva pass<br/><input type="text" name="clave" value="" /></label>
                        <label>Confirma pass<br/><input type="text" name="clave2" value="" /></label>
                        <input type="submit" value="Guardar pass" />
                    </form>
                </div>
                
            </div>
        </section>
        <footer>aa</footer>
    </body>
</html>
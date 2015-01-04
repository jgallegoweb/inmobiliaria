
<?php
require '../require/comun.php';
$sesion = new Sesion();
$sesion->noAutentificado("../index.php");
$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);
$objeto = $modelo->get($sesion->getUsuario());
$error=0;
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
        if($error!=0){
        ?>
        <section id="error">
            <?php
                if($error==1){
            ?>
                No existe el usuario
            <?php
                }
            ?>
            <?php
                if($error==2){
            ?>
                Contraseña incorrecta
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
                    <form action="phpEditarUser.php" method="POST" enctype="multipart/form-data">
                        <label>Usuario<br/><input type="text" name="login" value="<?php echo $objeto->getLogin(); ?>" disabled="disabled"/></label>
                        <fieldset><legend>Dejar en blanco si no desea cambiar la contraseña</legend>
                        <label>Contraseña<br/><input type="password" name="clave" value="" /></label>
                        <label>Confirma contraseña<br/><input type="password" name="clave2" value="" /></label>
                        <label>Contraseña Antigua<br/><input type="password" name="clavevieja" value="" /></label>
                        </fieldset>
                        <label>Nombre<br/><input type="text" name="nombre" value="<?php echo $objeto->getNombre(); ?>" /></label>
                        <label>Apellidos<br/><input type="text" name="apellido" value="<?php echo $objeto->getApellido(); ?>" /></label>
                        <label>Email<br/><input type="email" name="email" value="<?php echo $objeto->getEmail(); ?>" /></label>
                        <div class="clear"></div>
                        <input type="submit" value="Iniciar sesión" />
                    </form>
                    
                </div>
            </div>
        </section>
        <footer>aa</footer>
    </body>
</html>
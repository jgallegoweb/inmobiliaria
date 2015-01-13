
<?php
require '../require/comun.php';
$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);
$sesion = new Sesion();
$error=Leer::get("e");
$sesion->administrador("../index.php?e=31");
$objeto = $modelo->get(Leer::get("login"));
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>InMotril - Gestión</title>
        <link rel="stylesheet" type="text/css" href="../css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../css/estilosback.css" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <script src="../js/ajax.js"></script>
        <script src="../js/gestionUsuarios.js"></script>
        <style>
            .thumb {
              height: 75px;
              border: 1px solid #000;
              margin: 10px 5px 0 0;
            }
        </style>
    </head>
    <body>
        <header>
            <img src="../img/logo.png">
        </header>
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="verAreaCliente.php">área cliente</a></li>
                <li><a href="backUsuarios.php">ver usuarios</a></li>
            </ul>
        </nav>
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
        <section class="tablacasas">
            
            <section>
                <div class="centrador">

                    <div class="iden">
                        <form action="phpBackEditar.php" method="POST" enctype="multipart/form-data">
                            <label>Usuario<br/><input type="hidden" name="loginpk" value="<?php echo $objeto->getLogin(); ?>" /></label>
                            <label>Usuario<br/><input type="text" name="login" value="<?php echo $objeto->getLogin(); ?>" /></label>
                            <fieldset><legend>Dejar en blanco si no desea cambiar la contraseña</legend>
                            <label>Contraseña<br/><input type="password" name="clave" value="" /></label>
                            <label>Confirma contraseña<br/><input type="password" name="clave2" value="" /></label>
                            </fieldset>
                            <label>Nombre<br/><input type="text" name="nombre" value="<?php echo $objeto->getNombre(); ?>" /></label>
                            <label>Apellidos<br/><input type="text" name="apellido" value="<?php echo $objeto->getApellido(); ?>" /></label>
                            <label>Email<br/><input type="email" name="email" value="<?php echo $objeto->getEmail(); ?>" /></label>
                            <label>Root<br/>
                                <select name="root">
                                    <option value="<?php echo $objeto->getIsroot(); ?>"><?php if($objeto->getIsroot()==0) echo "No"; else echo "Si"; ?></option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </label>
                            <label>Activo<br/>
                                <select name="activo">
                                    <option value="<?php echo $objeto->getIsactivo() ?>"><?php if($objeto->getIsactivo()==0) echo "No"; else echo "Si"; ?></option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </label>
                            <label>Tipo<br/>
                                <select name="rol">
                                    <option><?php echo $objeto->getRol(); ?></option>
                                    <option>administrador</option>
                                    <option>usuario</option>
                                    <option>vendedor</option>
                                </select>
                            </label>
                            <div class="clear"></div>
                            <input type="submit" value="Iniciar sesión" />
                        </form>
                    </div>
                </div>
            </section>
        </section>
    </body>
</html>
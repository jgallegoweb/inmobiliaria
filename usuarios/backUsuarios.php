<?php
require '../require/comun.php';
$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);
$sesion = new Sesion();
$error=Leer::get("e");
$sesion->administrador("../index.php?e=31");
$objeto = $sesion->getUsuario();
$filas = $modelo->getList();
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
            <table id="listausuarios">
                <tr>
                    <th>Login</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Fecha Alta</th>
                    <th>isActivo</th>
                    <th>isroot</th>
                    <th>Tipo usuario</th>
                    <th>ultimologin</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
                <?php
                foreach ($filas as $y => $fila) {
                ?>
                <tr>
                    <td><?php echo $fila->getLogin(); ?></td>
                    <td><?php echo $fila->getNombre(); ?></td>
                    <td><?php echo $fila->getApellido(); ?></td>
                    <td><?php echo $fila->getEmail(); ?></td>
                    <td><?php echo $fila->getFechaalta(); ?></td>
                    <td><?php echo $fila->getIsactivo(); ?></td> 
                    <td><?php echo $fila->getIsroot(); ?></td> 
                    <td><?php echo $fila->getRol(); ?></td>
                    <td><?php echo $fila->getFechalogin(); ?></td>
                    <td><a href="backEditarUsuarios.php?login=<?php echo $fila->getLogin(); ?>">Editar</a></td> 
                    <td><a href="phpBackBorrar.php?login=<?php echo $fila->getLogin(); ?>">Borrar</a></td> 
                </tr>
                <?php
                }
                ?>
            </table>
        </section>
    </body>
</html>
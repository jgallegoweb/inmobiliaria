<?php
    require 'require/comun.php';
    $bd = new BaseDatos();
    $modelo = new ModeloInmueble($bd);
    $filas = $modelo->getList();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>InMotril - Gestión</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/estilosback.css" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <script src="js/codigo.js"></script>
    </head>
    <body>
        <header>
            <img src="img/logo.png">
        </header>
        <section id="central">
            <section class="tablacasas">
                <div class="minicab">Inmuebles actuales</div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Dirección</th>
                        <th>Población</th>
                        <th>C.P.</th>
                        <th>Provincia</th>
                        <th>Nº Habitaciones</th>
                        <th>Nº Baños</th>
                        <th>-</th>
                        <th>-</th>
                    </tr>
                    <?php
                        foreach($filas as $key => $objeto){
                    ?>
                    <tr>
                        <td><?php echo $objeto->getId(); ?></td>
                        <td><?php echo $objeto->getDireccion(); ?></td>
                        <td><?php echo $objeto->getPoblacion(); ?></td>
                        <td><?php echo $objeto->getCodigopostal(); ?></td>
                        <td><?php echo $objeto->getProvincia(); ?></td>
                        <td><?php echo $objeto->getHabitaciones(); ?></td>
                        <td> <?php echo $objeto->getBanos(); ?></td>
                        <td><a href="viewEditar.php?id=<?php echo $objeto->getId();?>">Editar</a></td>
                        <td><a class="eliminar" data-nombre="<?php echo $objeto->getDireccion(); ?>" href="phpEliminar.php?id=<?php echo $objeto->getId();?>">Borrar</a></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>

            </section>
            <section class="gestform">
                <div class="minicab">Nuevo inmueble</div>
                <form action="phpInsertar.php" method="POST" enctype="multipart/form-data" autocomplete="no">
                    <label>Dirección: <input type="text" name="direccion" value="" placeholder="C/Piruleta nº10, Bloque 4, 3ºA" maxlength="80"/></label>
                    <label>Población: <input type="text" name="poblacion" value="" placeholder="Motril" maxlength="60"/></label>
                    <label>C.P.: <input type="number" name="codigopostal" value="" placeholder="18600" maxlength="5"/></label>
                    <label>Provincia: <input type="text" name="provincia" value="" placeholder="Granada" maxlength="60"/></label>
                    <label>Tipo inmueble
                        <select name="tipo">
                            <option>Piso</option>
                            <option>Casa</option>
                            <option>Apartamento</option>
                            <option>Estudio</option>
                            <option>Chalet</option>
                            <option>Garaje</option>
                            <option>Local</option>
                            <option>Oficina</option>
                        </select>
                    </label>
                    <label>Precio: <input type="number" name="precio" value="" placeholder="1000" maxlength="10"/></label>(cambiar comas js)
                    <label>Tipo oferta:
                        <select name="tipooferta">
                            <option>Alquiler</option>
                            <option>Venta</option>
                        </select>
                    </label>
                    <label>Descripcion:<br/>
                        <textarea name="descripcion" rows="4" cols="20"></textarea>
                    </label>
                    <label>Habitaciones: <input type="number" name="habitaciones" value="" placeholder="2" maxlength="3"/></label>
                    <label>Baños: <input type="number" name="banos" value="" placeholder="1" maxlength="3"/></label>
                    <label>Imagenes: <input type="file" name="fotos[]" multiple /></label>
                    <input type="submit" value="Añadir" />
                    <input type="reset" id="limp" value="Limpiar" />
                </form>
            </section>
        </section>
    </body>
</html>
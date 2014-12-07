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
    </head>
    <body>
        <header></header>
        <section>
            <table>
                <tr>
                    <th>ID</th><th>Dirección</th><th>Nº Habitaciones</th><th>Nº Baños</th>
                </tr>
                <?php
                    foreach($filas as $key => $objeto){
                ?>
                <tr>
                    <td><?php echo $objeto->getId(); ?></td><td><?php echo $objeto->getDireccion(); ?></td>
                    <td><?php echo $objeto->getHabitaciones(); ?></td><td> <?php echo $objeto->getBanos(); ?></td>
                    <td><a href="viewEditar.php?id=<?php echo $objeto->getId();?>">Editar</a></td>
                    <td><a href="phpEliminar.php?id=<?php echo $objeto->getId();?>">Borrar</a></td>
                </tr>
                <?php
                    }
                ?>
            </table>
            
        </section>
        <section>
            <form action="phpInsertar.php" method="POST" enctype="multipart/form-data">
                <label>Dirección: <input type="text" name="direccion" value="" placeholder="C/Piruleta nº10, Bloque 4, 3ºA" maxlength="80"/></label><br/>
                <label>Población: <input type="text" name="poblacion" value="" placeholder="Motril" maxlength="60"/></label><br/>
                <label>C.P.: <input type="number" name="codigopostal" value="" placeholder="18600" maxlength="5"/></label><br/>
                <label>Provincia: <input type="text" name="provincia" value="" placeholder="Gramada" maxlength="60"/></label><br/>
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
                </label><br/>
                <label><br/>
                <label>Precio: <input type="number" name="precio" value="" placeholder="1000" maxlength="10"/></label>(cambiar comas js)<br/>
                <label>Tipo oferta:
                    <select name="tipooferta">
                        <option>Alquiler</option>
                        <option>Venta</option>
                    </select>
                </label><br/>
                <label>Descripcion: 
                    <textarea name="descripcion" rows="4" cols="20"></textarea>
                </label><br/>
                <label>Habitaciones: <input type="number" name="habitaciones" value="" placeholder="2" maxlength="3"/></label><br/>
                <label>Baños: <input type="number" name="banos" value="" placeholder="1" maxlength="3"/></label><br/>
                <label>Imagenes: <input type="file" name="fotos[]" multiple /></label><br/>
                <input type="submit" value="Añadir" />
                <input type="reset" value="Limpiar" />
            </form>
        </section>
    </body>
</html>
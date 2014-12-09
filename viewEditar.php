<?php
    require 'require/comun.php';
    $bd = new BaseDatos();
    $modelo = new ModeloInmueble($bd);
    if(Leer::get("id")==null){
        header("Location: viewGestion.php?e=11");
        exit();
    }
    $id = Leer::get("id");
    $objeto = $modelo->get($id);
    if($objeto->getId()==null){
        header("Location: viewGestion.php?e=11");
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Inmueble</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/estilosback.css" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <script src="js/codigo.js"></script>
    </head>
    <body>
        <section class="gestform">
                <div class="minicab">Editar inmueble</div>
                <form action="phpEditar.php" method="POST" enctype="multipart/form-data" autocomplete="no">
                    <input type="hidden" name="id" value="<?php echo $objeto->getId(); ?>">
                    <label>Dirección: <input type="text" name="direccion" value="<?php echo $objeto->getDireccion(); ?>" placeholder="C/Piruleta nº10, Bloque 4, 3ºA" maxlength="80"/></label>
                    <label>Población: <input type="text" name="poblacion" value="<?php echo $objeto->getPoblacion(); ?>" placeholder="Motril" maxlength="60"/></label>
                    <label>C.P.: <input type="number" name="codigopostal" value="<?php echo $objeto->getCodigopostal(); ?>" placeholder="18600" maxlength="5"/></label>
                    <label>Provincia: <input type="text" name="provincia" value="<?php echo $objeto->getProvincia(); ?>" placeholder="Granada" maxlength="60"/></label>
                    <label>Tipo inmueble
                        <select name="tipo">
                            <option><?php echo $objeto->getTipo() ?></option>
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
                    <label>Precio: <input type="number" name="precio" value="<?php echo $objeto->getPrecio(); ?>" placeholder="1000" maxlength="10"/></label>(cambiar comas js)
                    <label>Tipo oferta:
                        <select name="tipooferta">
                            <option><?php echo $objeto->getTipooferta(); ?></option>
                            <option>Alquiler</option>
                            <option>Venta</option>
                        </select>
                    </label>
                    <label>Descripcion:<br/>
                        <textarea name="descripcion" rows="4" cols="20"><?php echo $objeto->getDescripcion(); ?></textarea>
                    </label>
                    <label>Habitaciones: <input type="number" name="habitaciones" value="<?php echo $objeto->getHabitaciones(); ?>" placeholder="2" maxlength="3"/></label>
                    <label>Baños: <input type="number" name="banos" value="<?php echo $objeto->getBanos(); ?>" placeholder="1" maxlength="3"/></label>
                    <div class="clear"></div>
                    <input type="submit" value="Guardar edición" />
                    <input type="reset" id="limp" value="Descartar cambios" />
                </form>
                
            </section>
            <section class="gestform">
                <div class="minicab">Editar Fotos</div>
                <form action="phpNuevaFoto.php" method="POST" enctype="multipart/form-data" autocomplete="no">
                    <input type="hidden" name="id" value="<?php echo $objeto->getId(); ?>">
                    <label>Subir más imagenes: <input type="file" name="fotos[]" multiple /></label>
                    
                    <div class="clear"></div>
                    <input type="submit" value="Guardar edición" />
                    <input type="reset" id="limp" value="Descartar cambios" />
                </form>
                
            </section>
            <section class="gestform">
                <div class="minicab">Editar Fotos</div>
                <?php
                $fotos = $objeto->getFotos();
                foreach ($fotos as $foto) {
                ?>
                <a href="phpBorrarFoto.php?foto=<?php echo $foto; ?>&id=<?php echo $id ?>" class="eliminar">
                    <div class="minifotoborrar">
                        <img src="<?php echo $foto; ?>">
                    </div>
                </a>
                <?php
                }
                ?>
            </section>
    </body>
</html>

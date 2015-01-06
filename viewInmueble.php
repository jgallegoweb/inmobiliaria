<?php
    require 'require/comun.php';
    $bd = new BaseDatos();
    $modelo = new ModeloInmueble($bd);
    $objeto = new Inmueble();
    if(Leer::get("id")==null){
        header("Location: index.php?e=1");
        exit();
    }
    $id = Leer::get("id");
    $objeto = $modelo->get($id);
    if($objeto->getId()==null){
        header("Location: index.php?e=1");
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Homeless - Ver piso</title>
        <script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/lightbox.min.js"></script>
        <link href="css/lightbox.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/estilos.css" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'> 
    </head>
    <body>
        <header>
            <a href="index.php"><img src="img/logo.png"></a>
        </header>
        <section id="buscador">
            <form action="index.php">
                <label>Busco 
                    <select name="tipo">
                        <option></option>
                        <option value="piso">Piso</option>
                        <option value="casa">Casa</option>
                        <option value="apartamento">Apartamento</option>
                        <option value="estudio">Estudio</option>
                        <option value="chalet">Chalet</option>
                        <option value="garaje">Garaje</option>
                        <option value="local">Local</option>
                        <option value="oficina">Oficina</option>
                    </select>
                </label>
                <label>para 
                    <select name="tipooferta">
                        <option></option>
                        <option value="venta">Comprar</option>
                        <option value="alquiler">Alquilar</option>
                    </select>
                </label>
                <label>en 
                    <select name="poblacion">
                        <option></option>
                        <?php
                            echo $modelo->getOption("poblacion");
                        ?>
                    </select>
                </label><br/>
                <input type="submit" value="Nueva Búsqueda" />
                <div class="clear"></div>
            </form>
        </section>
        <section>
            <div id="informacionpiso">
                <div class="infopisob">
                    <span>ID: </span><?php echo $objeto->getId(); ?><br/>
                    <span>Dirección: </span><?php echo $objeto->getDireccion(); ?><br/>
                    <span>Población: </span><?php echo $objeto->getPoblacion(); ?><br/>
                    <span>Código Postal: </span><?php echo $objeto->getCodigopostal(); ?><br/>
                    <span>Provincia: </span><?php echo $objeto->getProvincia(); ?><br/>
                    <span>Tipo: </span><?php echo $objeto->getTipo(); ?><br/>
                    
                </div>
                <div class="infopisob">
                    <span>Precio: </span><?php echo $objeto->getPrecio(); ?><br/>
                    <span>Tipo oferta: </span><?php echo $objeto->getTipooferta(); ?><br/>
                    <span>Habitaciones: </span><?php echo $objeto->getHabitaciones(); ?><br/>
                    <span>Baños: </span><?php echo $objeto->getBanos(); ?><br/>
                    <span>Fecha publicación: </span><?php echo $objeto->getFechapubli(); ?><br/>
                </div>
                <div class="clear">
                    <?php echo $objeto->getDescripcion(); ?>
                </div>
            </div>
            <div id="galeria">
                <?php 
                    foreach($objeto->getFotos() as $valor){
                ?>
                <div class="miniatura">
                    <a href="<?php echo $valor ?>" data-lightbox="imagen1" data-title="<?php echo $objeto->getDireccion(); ?>"><img src="<?php echo $valor ?>"></a>
                </div>
                <?php 
                    }
                ?>
            </div>
        </section>
        <footer>
        </footer>
    </body>
</html>

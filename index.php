<?php
require 'require/comun.php';
$bd = new BaseDatos();
$modelo = new ModeloInmueble($bd);
$tipooferta="%";
$tipo="%";
$poblacion="%";
if(Leer::get("tipooferta")!=null){
    $tipooferta= Leer::get("tipooferta");
}
if(Leer::get("tipo")!=null){
    $tipo= Leer::get("tipo");
}
if(Leer::get("poblacion")!=null){
    $poblacion= Leer::get("poblacion");
}
$condicion="tipooferta LIKE :tipooferta and tipo LIKE :tipo and poblacion LIKE :poblacion";
$param['tipooferta']=$tipooferta;
$param['tipo']=$tipo;
$param['poblacion']=$poblacion;

$filas = $modelo->getList($condicion, $param);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inmobiliaria</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/estilos.css" media="screen" />
        <script>alert("<?php echo $tipooferta?>")</script>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <header>
            <img src="img/logo.png">
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
                <input type="submit" value="Filtrar Búsqueda" />
                <div class="clear"></div>
            </form>
        </section>
        <section>
            <?php
                foreach($filas as $key => $objeto){
                    $filafotos = $modelo->getListFotos($objeto->getId()); 
            ?>
            <div class="anuncio" style="background-image: url('<?php echo $filafotos[0]; ?>')">
                <div class="info">
                    <span class="titulocasa"><?php echo $objeto->getDireccion(); ?> <?php echo $objeto->getPoblacion(); ?> ( <?php echo $objeto->getCodigopostal(); ?> ) </span>
                    <div class="infb">
                        <span class="sec">Dirección: </span><?php echo $objeto->getDireccion(); ?><br>
                        <span class="sec">Población: </span><?php echo $objeto->getPoblacion(); ?> ( <?php echo $objeto->getCodigopostal(); ?> )<br>
                        <span class="sec">Provincia: </span><?php echo $objeto->getProvincia(); ?><br>
                        <span class="sec">Publicado el: </span><?php echo $objeto->getFechapubli(); ?><br>
                        <span class="sec">Tipo: </span><?php echo $objeto->getTipo(); ?><br>
                    </div>
                    <div class="infb">
                        <span class="sec">Precio: </span><?php echo $objeto->getPrecio(); ?>€ ( <?php echo $objeto->getTipooferta(); ?> )<br>
                        <span class="sec">Tipo: </span><?php echo $objeto->getDescripcion(); ?><br>
                        <span class="sec">Nº habitaciones: </span><?php echo $objeto->getHabitaciones() ?><br>
                        <span class="sec">Nº baños: </span><?php echo $objeto->getBanos(); ?><br>
                    </div>
                    <span class="sec">
                        
                        
                    </span>
                    <div class="clear"></div>
                </div>
                
            </div>
            <?php
                }
            ?>
        </section>
        <footer>
            
        </footer>
    </body>
</html>

<!--label>por más de 
    <input type="text" name="precio" value="0" /> €
</label>
<label>y menos de
    <input type="text" name="precio" value="" /> €
</label-->
<?php

require 'require/comun.php';

$direccion = Leer::post("direccion");
$poblacion = Leer::post("poblacion");
$codigopostal = Leer::post("codigopostal");
$provincia = Leer::post("provincia");
$tipo = Leer::post("tipo");
$precio = Leer::post("precio");
$tipooferta = Leer::post("tipooferta");
$descripcion = Leer::post("descripcion");
$habitaciones = Leer::post("habitaciones");
$banos = Leer::post("banos");

$subir = new SubirMultiple("fotos");

$subir->addExtension("jpg");
$subir->addExtension("png");
$subir->addTipo("image/jpeg");
$subir->addTipo("image/png");
$subir->setNuevoNombre(time());
$subir->setAcccion(1);
$subir->setAccionExcede(1);
$subir->setTamanio(1024*1024*5);
$subir->setCantidadMaxima(4);
$subir->setCrearCarpeta(true);
$subir->setDestino("imagenes");
$subir->subir();
$fotos = $subir->getNombres();

$bd = new BaseDatos();
$modelo = new ModeloInmueble($bd);
$objeto = new Inmueble(null, $direccion, $poblacion, $codigopostal, $provincia, 
        null, $tipo, $precio, $tipooferta, $descripcion, $habitaciones, $banos, $fotos);
$r = $modelo->add($objeto);
$objeto->setId($r);
$rf = $modelo->addFoto($objeto);

if($r ==-1 || $rf == -1){
    header("Location: viewGestion.php?e=0");
    exit();
}
header("Location: viewGestion.php?e=1");
exit();



/*
 * $subir = new SubirMultiple("ficheros"); //creamos un objeto de la clase SubirMultiple
            
            $subir->addExtension("txt"); //Añadimos varias extensiones permitidas
            $subir->addExtension("jpg");
            $subir->addExtension("png");
            $subir->addTipo("text/plain"); //Añadimos los tipos MIME de las extensiones anteriores
            $subir->addTipo("image/jpeg");
            $subir->addTipo("image/png");
            $subir->setAcccion(1); //renombramos los archivos en caso de existir
            $subir->setAccionExcede(1); //subimos los archivos que si cumplan las condiciones
            $subir->setCrearCarpeta(true); //creamos el directorio de destino si no existe
            $subir->setDestino("carpetita"); //seleccionamos el destino
            $subir->subir(); //subimos los archivos
            $subir->setTamanio(1024*1024*5);
            $subir->setCantidadMaxima(4);
            $subir->subir();
            echo $subir->getErrores(); //imprime los errores.
 */
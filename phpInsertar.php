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
$vendedor = Leer::post("vendedor");

$subir = new SubirMultiple("fotos");

$subir->addExtension("jpg");
$subir->addExtension("png");
$subir->addTipo("image/jpeg");
$subir->addTipo("image/png");
$subir->setNuevoNombre(time());
$subir->setAcccion(1);
$subir->setAccionExcede(1);
$subir->setTamanio(1024*1024*5);
$subir->setCantidadMaxima(9);
$subir->setCrearCarpeta(true);
$subir->setDestino("imagenes");
$subir->subir();
$fotos = $subir->getNombres();

$bd = new BaseDatos();
$modelo = new ModeloInmueble($bd);
$objeto = new Inmueble(null, $direccion, $poblacion, $codigopostal, $provincia, 
        null, $tipo, $precio, $tipooferta, $descripcion, $habitaciones, $banos, $fotos, $vendedor);
$r = $modelo->add($objeto);
$objeto->setId($r);
$rf = $modelo->addFoto($objeto);

if($r ==-1 || $rf == -1){
    header("Location: viewGestion.php?error=1");
    exit();
}
header("Location: viewGestion.php?error=0");
exit();
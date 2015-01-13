<?php

require 'require/comun.php';

$sesion = new Sesion();
$sesion->noAutentificado("index.php?e=30");

$id = Leer::post("id");

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

if($fotos==null){
    header("Location: viewEditar.php?id=$id&e=3");
    exit();
}
$bd = new BaseDatos();
$modelo = new ModeloInmueble($bd);
$objeto = new Inmueble($id);
$objeto->setFotos($fotos);
print_r($objeto->getFotos());
$r = $modelo->addFoto($objeto);

if($r==-1){
    header("Location: viewEditar.php?id=$id&e=4");
    exit();
}
header("Location: viewEditar.php?id=$id&e=0");
exit();
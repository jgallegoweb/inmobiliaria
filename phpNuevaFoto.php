<?php

require 'require/comun.php';

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

print_r($fotos);
$bd = new BaseDatos();
$modelo = new ModeloInmueble($bd);
$objeto = new Inmueble($id);
$objeto->setFotos($fotos);
print_r($objeto->getFotos());
$r = $modelo->addFoto($objeto);

echo $r;
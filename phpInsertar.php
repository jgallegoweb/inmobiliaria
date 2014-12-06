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

$bd = new BaseDatos();
$modelo = new ModeloInmueble($bd);
$objeto = new Inmueble(null, $direccion, $poblacion, $codigopostal, $provincia, 
        null, $tipo, $precio, $tipooferta, $descripcion, $habitaciones, $banos);
$r = $modelo->add($objeto);
if($r==-1){
    header("Location: viewGestion.php?e=0");
    exit();
}
header("Location: viewGestion.php?e=1");
exit();
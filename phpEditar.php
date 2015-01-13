<?php

require 'require/comun.php';

$sesion = new Sesion();
$sesion->noAutentificado("index.php?e=30");

$id = Leer::post("id");
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
$objeto = new Inmueble($id, $direccion, $poblacion, $codigopostal, $provincia, 
        null, $tipo, $precio, $tipooferta, $descripcion, $habitaciones, $banos);
$r = $modelo->edit($objeto);
if($r ==-1){
    header("Location: viewEditar.php?id=$id&e=1");
    exit();
}
header("Location: viewEditar.php?id=$id&e=0");
exit();

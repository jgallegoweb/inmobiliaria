<?php

require 'require/comun.php';

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
print_r($r);
if($r ==-1){
    //header("Location: viewGestion.php?e=0");
    echo "inhode";
    exit();
}
//header("Location: viewGestion.php?e=1");
echo "sdaf";
exit();

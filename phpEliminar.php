<?php

require 'require/comun.php';

$sesion = new Sesion();
$sesion->noAutentificado("index.php?e=30");

$id = Leer::get("id");

$bd = new BaseDatos();
$modelo = new ModeloInmueble($bd);
$objeto = new Inmueble($id);
$r=$modelo->delete($objeto);
if($r==-1){
    header("Location: viewGestion.php?e=8");
    exit();
}
header("Location: viewGestion.php?e=7");
exit();
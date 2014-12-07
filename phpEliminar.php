<?php

require 'require/comun.php';

$id = Leer::get("id");

$bd = new BaseDatos();
$modelo = new ModeloInmueble($bd);
$objeto = new Inmueble($id);
$r=$modelo->delete($objeto);
if($r==-1){
    header("Location: viewGestion.php?e=2");
    exit();
}
header("Location: viewGestion.php?e=3");
exit();
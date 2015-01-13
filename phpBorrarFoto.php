<?php
require 'require/comun.php';
$sesion = new Sesion();
$sesion->noAutentificado("index.php?e=30");

$bd = new BaseDatos();
$modelo = new ModeloInmueble($bd);
$id = Leer::get("id");
if(Leer::get("foto")==null){
    header("Location: viewEditar.php?e=2");
    exit();
}
$foto = Leer::get("foto");
$modelo->deleteFoto($foto);
header("Location: viewEditar.php?e=2&id=$id");
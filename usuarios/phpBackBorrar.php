<?php

require '../require/comun.php';

$sesion = new Sesion();
$sesion->administrador("../index.php?e=31");

$login = Leer::get("login");


$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);
$objeto = new Usuario($login);
$r=$modelo->delete($objeto);
if($r==-1){
    header("Location: backUsuarios.php?e=8");
    exit();
}
header("Location: backUsuarios.php?e=7");
exit();
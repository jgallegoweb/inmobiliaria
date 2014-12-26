<?php

require '../require/comun.php';
$sesion = new Sesion();
$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);

$login = Leer::post("login");
$clave = Leer::post("clave");

$objeto = $modelo->get($login);
if($objeto->getLogin() == null || !$objeto->getIsactivo()){
    header("Location: verLogin.php?error=1");
    exit();
}
if(!Util::isPass($clave, $objeto->getClave())){
    header("Location: verLogin.php?error=2");
    exit();
}
$sesion->setAutentificado(true);
$sesion->setUsuario($login);
header("Location: ../index.php");
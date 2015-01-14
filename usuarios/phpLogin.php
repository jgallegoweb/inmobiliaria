<?php

require '../require/comun.php';
$sesion = new Sesion();
$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);

$login = Leer::post("login");
$clave = Leer::post("clave");

if(Validar::isCorreo($login)){
    $param['email']=$login;
    $filas = $modelo->getList("email=:email", $param);
    if(sizeof($filas)>0){
        $login = $filas[0]->getLogin();
    }
}

$objeto = $modelo->get($login);
if($objeto->getLogin() == null || !$objeto->getIsactivo()){
    header("Location: verLogin.php?e=40");
    exit();
}
if(!Util::isPass($clave, $objeto->getClave())){
    header("Location: verLogin.php?e=41");
    exit();
}
$sesion->setAutentificado(true);
$modelo->setFechaLogin($login);
$sesion->setUsuario($objeto);
header("Location: ../index.php");
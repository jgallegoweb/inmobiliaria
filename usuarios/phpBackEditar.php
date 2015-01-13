<?php

require '../require/comun.php';
$sesion = new Sesion();
$sesion->administrador("../index.php?e=31");
$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);

$loginpk = Leer::post("loginpk");
$login = Leer::post("login");
$clave = Leer::post("clave");
$clave2 = Leer::post("clave2");
$nombre = Leer::post("nombre");
$apellido = Leer::post("apellido");
$email = Leer::post("email");
$root = Leer::post("root");
$activo = Leer::post("activo");
$rol = Leer::post("rol");

$objeto = $modelo->get($loginpk);

$objeto->setNombre($nombre);
$objeto->setApellido($apellido);
$objeto->setRol($rol);
if(Validar::isCorreo($email)){
    $objeto->setEmail($email);
}

if($clave!=null && $clave!=""){
    if ($clave == $clave2 && Validar::isClave($clave)) {
        $objeto->setClave($clave);
        $r = $modelo->edit($objeto);
        echo "bien2";
    } else {
        header("Location: backEditarUsuarios.php?mensaje=2&login=".$objeto->getLogin());
        exit();
    }
}else{
    echo "bien";
    $r = $modelo->editSinClave($objeto);
}

if($login != $loginpk && Validar::isLogin($login)){
    $objeto->setLogin($login);
    echo $modelo->editLogin($objeto, $loginpk);
    echo "bien3";
}

if($r!=-1){
    header("Location: backEditarUsuarios.php?mensaje=0&login=".$objeto->getLogin());
}else{
    header("Location: backEditarUsuarios.php?mensaje=1&login=".$objeto->getLogin());
}
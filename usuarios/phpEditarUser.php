<?php

require '../require/comun.php';
$sesion = new Sesion();
$sesion->noAutentificado("../index.php?e=30");
$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);
$objeto = $sesion->getUsuario();

$login = Leer::post("login");
$clave = Leer::post("clave");
$clave2 = Leer::post("clave2");
$clavevieja = Leer::post("clavevieja");
$nombre = Leer::post("nombre");
$apellido = Leer::post("apellido");
$email = Leer::post("email");

$objeto->setNombre($nombre);
$objeto->setApellido($apellido);
$objeto->setEmail($email);

if($clave!=null && $clave!=""){
    if(Util::isPass($clavevieja, $objeto->getClave())){
        if($clave == $clave2 && Validar::isClave($clave)){
            $objeto->setClave($clave);
            $r=$modelo->edit($objeto);
        }else{
            header("Location: verEditar.php?e=50");
            exit();
        }
    }else{
        header("Location: verEditar.php?e=41");
        exit();
    }
}else{
    $r = $modelo->editSinClave($objeto);
}

if($r!=-1){
    $sesion->setUsuario($objeto);
    header("Location: verEditar.php?e=0");
}else{
    header("Location: verEditar.php?e=9");
}
<?php
require '../require/comun.php';
$sesion = new Sesion();
$sesion->siAutentificado("../index.php");
$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);

$clave = Leer::post("clave");
$clave2 = Leer::post("clave2");

$login = Leer::post("login");
$cod = Leer::post("cod");
$objeto = $modelo->get($login);

$codbueno = md5($objeto->getEmail().Configuracion::PEZ.$objeto->getLogin());
if($cod == $codbueno){
    if($clave == $clave2){
        $objeto->setClave($clave);
        $modelo->edit($objeto);
        header("Location: ../index.php");
        exit();
    }
    header("Location: verNuevaPass.php?mensaje=2");
    exit();
}
header("Location: verNuevaPass.php?mensaje=1");
exit();


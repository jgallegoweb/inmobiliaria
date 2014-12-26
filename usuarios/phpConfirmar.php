<?php

require '../require/comun.php';

$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);

$login = Leer::get('login');
$cod = Leer::get('cod');

$objeto = $modelo->get($login);

$codigo = md5($objeto->getLogin().Configuracion::PEZ.$objeto->getEmail());

if($cod != $codigo){
    echo 'Algo ha salido mal';
    exit();
}else{
    $objeto->setIsactivo(1);
    echo $modelo->edit($objeto, $objeto->getLogin());
    header("Location: verLogin.php");
}
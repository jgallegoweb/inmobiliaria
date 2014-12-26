<?php

require '../require/comun.php';

$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);

$login = Leer::post("login");
$clave = Leer::post("clave");
$nombre = Leer::post("nombre");
$apellido = Leer::post("apellido");
$email = Leer::post("email");

$usuario = new Usuario($login, $clave, $nombre, $apellido, $email);
$r = $modelo->add($usuario);
echo $r;
if($r==1){
    $codigo = md5($login.Configuracion::PEZ.$email);
    
    $url = Entorno::getEnlaceCarpeta("phpConfirmar.php?cod=$codigo&login=$login");
    
//    mail('javigallego93@gmail.com', 'Mi título', $url, "From: pepe@gmail.com");
    
    echo "Estimado $login: <br/> Necesitamos que confirme su dirección de correo para continuar"
            . "para activarlo solo necesita ir al siguiente enlace: <a href='$url'>Enlace</a>";
}
<?php

require '../require/comun.php';

$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);

$login = Leer::post("login");
$clave = Leer::post("clave");
$clave2 = Leer::post("clave1");
$nombre = Leer::post("nombre");
$apellido = Leer::post("apellido");
$email = Leer::post("email");

if(!Validar::isLogin($login)){
    header("Location: verLogin.php?e=61");
    exit();
}
if(!Validar::isCorreo($email)){
    header("Location: verLogin.php?e=60");
    exit();
}else{
    $param['email']=$email;
    $encontrados = $modelo->getList("email=:email", $param);
    if(sizeof($encontrados)>0){
        header("Location: verLogin.php?e=62");
        exit();
    }
}
if(!Validar::isClave($clave) || $clave != $clave2){
    header("Location: verLogin.php?e=63");
    exit();
}

$usuario = new Usuario($login, $clave, $nombre, $apellido, $email);
$r = $modelo->add($usuario);
$objeto = $modelo->get($login);
echo $r;
if($r==1){
    $codigo = md5($login.Configuracion::PEZ.$email);
    
    $url = Entorno::getEnlaceCarpeta("phpConfirmar.php?cod=$codigo&login=$login");
    
    mail($usuario->getEmail(), 'Confirmación de correo', $url, "From: info@fotohomeles.hol.es");
    
    echo "Estimado $login: <br/> Necesitamos que confirme su dirección de correo para continuar"
            . "para activarlo solo necesita ir al siguiente enlace: <a href='$url'>Enlace</a>";
}
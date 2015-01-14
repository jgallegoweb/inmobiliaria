<?php

require '../require/comun.php';
$sesion = new Sesion();
$sesion->noAutentificado("../index.php?e=30");
$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);
$objeto = $sesion->getUsuario();

$login = $objeto->getLogin();
$clave = Leer::post("clave");
$clave2 = Leer::post("clave2");
$clavevieja = Leer::post("clavevieja");
$nombre = Leer::post("nombre");
$apellido = Leer::post("apellido");
$email = Leer::post("email");

if(!Validar::isLogin($login)){
    header("Location: verEditar.php?e=61");
    exit();
}
if(!Validar::isCorreo($email)){
    header("Location: verEditar.php?e=60");
    exit();
}else{
    $param['email']=$email;
    $param['login']=$login;
    $encontrados = $modelo->getList("email=:email and login!=:login", $param);
    if(sizeof($encontrados)>0){
        header("Location: verEditar.php?e=62");
        exit();
    }
}

$objeto->setNombre($nombre);
$objeto->setApellido($apellido);
if($email != $objeto->getEmail()){
    $objeto->setEmail($email);
    $objeto->setIsactivo(false);
}
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
    if($objeto->getIsactivo()==false){
        $codigo = md5($login.Configuracion::PEZ.$email);
    
        $url = Entorno::getEnlaceCarpeta("phpConfirmar.php?cod=$codigo&login=$login");

        mail($objeto->getEmail(), 'Confirmación de correo', $url, "From: info@fotohomeles.hol.es");

        echo "Estimado $login: <br/> Necesitamos que confirme su dirección de correo para continuar"
                . "para activarlo solo necesita ir al siguiente enlace: <a href='$url'>Enlace</a>";
    }
    //header("Location: verEditar.php?e=0");
}else{
    
    header("Location: verEditar.php?e=9");
}
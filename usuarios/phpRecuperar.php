<?php

require '../require/comun.php';
$sesion = new Sesion();
$sesion->siAutentificado("../index.php?e=20");
$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);

$recuerdo = Leer::post("recuerdo");

if(Validar::isCorreo($recuerdo)){
    $param['email']=$recuerdo;
    $filas = $modelo->getList("email=:email", $param);
    if(sizeof($filas)>0){
        $recuerdo = $filas[0]->getLogin();
    }
}

$objeto = $modelo->get($recuerdo);

if($objeto->getLogin()==null){
    header("Location: verRecuperar.php?e=52");
}
//enviar correo
$codigo = md5($objeto->getEmail().Configuracion::PEZ.$objeto->getLogin());
$url = Entorno::getEnlaceCarpeta("verNuevaPass.php?cod=$codigo&login=".$objeto->getLogin());
echo "Hola ".$objeto->getLogin().". Pulse el siguiente enlace para recuperar la pass: <br> ";
?>
<a href='<?php echo $url; ?>'>Enlace</a>

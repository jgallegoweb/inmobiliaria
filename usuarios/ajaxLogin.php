<?php

require '../require/comun.php';
header("Content-Type: text/xml");
$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);
$login = Leer::get("login");
$r = $modelo->get($login);
if($r->getLogin()==null){
    echo '{"si":true}';
    exit();
}
echo '{"si":false}';
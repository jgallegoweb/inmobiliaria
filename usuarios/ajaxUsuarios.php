<?php

require '../require/comun.php';
header("Content-Type: application/json");
$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);

echo $modelo->getListJSON();
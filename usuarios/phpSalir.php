<?php

require '../require/comun.php';

$sesion = new Sesion();
$bd = new BaseDatos();
$modelo = new modeloUsuario($bd);
$objeto = $sesion->getUsuario();
$modelo->setControl($objeto->getLogin(), "Cerrar sesión");
$sesion->salir();

header("Location: ../index.php");

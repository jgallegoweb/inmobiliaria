<?php

require '../require/comun.php';

$sesion = new Sesion();
$sesion->salir();

header("Location: ../index.php");

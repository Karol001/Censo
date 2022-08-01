<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/empleados.controlador.php";
require_once "controladores/censo.controlador.php";

require_once "modelos/empleados.modelo.php";

require_once "modelos/censo.modelo.php";
require_once "extensiones/vendor/autoload.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
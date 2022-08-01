<?php

require_once "../controladores/censo.controlador.php";
require_once "../modelos/censo.modelo.php";

class AjaxCenso{

	/*=============================================
	EDITAR CENSO
	=============================================*/	

	public $DNI;

	public function ajaxEditarCenso(){

		$item = "DNI";
		$valor = $this->DNI;

		$respuesta = ControladorCenso::ctrMostrarCenso($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CENSO
=============================================*/	
if(isset($_POST["DNI"])){

	$censo = new AjaxCenso();
	$censo -> DNI = $_POST["DNI"];
	$censo -> ajaxEditarCenso();
}

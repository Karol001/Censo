<?php

class ControladorCenso{

	/*=============================================
	CREAR CENSO
	=============================================*/

	static public function ctrCrearCenso(){

		if(isset($_POST["nuevoDNI"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevoDNI"])){

				$tabla = "tbl_personas";

				$datos = array("dni"=>$_POST["nuevoDNI"],
								"nombre"=>$_POST["nuevoNombre"],
								"fecha_nacimiento"=>$_POST["nuevaFechaNacimiento"],
								"direccion"=>$_POST["nuevaDireccion"],
								"telefono"=>$_POST["nuevoTelefono"]);

				$respuesta = ModeloCenso::mdlIngresarCenso($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "el censo ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "censo";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El censo no puede ir vacio!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "censo";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CENSO
	=============================================*/

	static public function ctrMostrarCenso($item, $valor){

		$tabla = "tbl_personas";

		$respuesta = ModeloCenso::mdlMostrarCenso($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR 
	=============================================*/

	static public function ctrEditarCenso(){

		if(isset($_POST["DNI"])){

			if(preg_match('/^[0-9]+$/', $_POST["DNI"])){

				$tabla = "tbl_Personas";

				$datos = array("dni"=>$_POST["DNI"],
				"nombre"=>$_POST["editarNombre"],
				"fecha_nacimiento"=>$_POST["editarFechaNacimiento"],
				"direccion"=>$_POST["editarDireccion"],
				"telefono"=>$_POST["editarTelefono"]);

				$respuesta = ModeloCenso::mdlEditarCenso($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El censo ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "censo";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El censo no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "censo";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR 
	=============================================*/

	static public function ctrBorrarCenso(){

		if(isset($_GET["DNI"])){

			$tabla ="tbl_personas";
			$datos = $_GET["DNI"];

			$respuesta = ModeloCenso::mdlBorrarCenso($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El censo ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "censo";

									}
								})

					</script>';
			}
		}
		
	}
}

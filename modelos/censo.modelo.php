<?php

require_once "conexion.php";

class ModeloCenso{

	/*=============================================
	CREAR CENSO
	=============================================*/

	static public function mdlIngresarCenso($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla VALUES (:dni, :nombre, :fecha_nacimiento, :direccion, :telefono)");

		$stmt -> bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR CENSO
	=============================================*/

	static public function mdlMostrarCenso($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR CENSO
	=============================================*/

	static public function mdlEditarCenso($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NOMBRE = :nombre, FECHA_NACIMIENTO = :fecha_nacimiento, DIRECCION = :direccion, TELEFONO = :telefono WHERE DNI = :dni");

		$stmt -> bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR CENSO
	=============================================*/

	static public function mdlBorrarCenso($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE DNI = :DNI");

		$stmt -> bindParam(":DNI", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}


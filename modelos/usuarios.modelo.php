<?php

require_once "conexion.php";

class ModeloUsuarios {
    /* =============================================
      MOSTRAR USUARIOS
      ============================================= */

    static public function mdlMostrarUsuarios($tabla, $campo, $valor) {
        try {
		if($campo != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $campo = :$campo");

			$stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;
        } catch (PDOException $ex) {
            print "ERROR" . $ex->getMessage();
        }
    }

}

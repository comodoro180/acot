<?php

require_once "conexion.php";

class ModeloCotizacionDetalleTipoEstado{
    

    static public function mdlMostrarCotizacionDetalleTipoEstado($tabla, $campo, $valor) {
        try {
		if($campo != null){
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where $campo = :$campo");
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
            return "ERROR" . $ex->getMessage();
        }
    }
    
    static public function mdlIngresarCotizacionDetalleTipoEstado($tabla,$datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,descripcion) "
                                                . "VALUES (:nombre,:descripcion)");

            $stmt->bindParam(":descripcion", $datos["descripcion"],PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            
            if ($stmt->execute()){
                return "ok";
            }
            
        } catch (PDOException $ex) {
            print "ERROR" . $ex->getMessage();
            return $ex->getMessage();
        } 
    }
    

    static public function mdlEditarCotizacionDetalleTipoEstado($tabla, $datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NOMBRE = :nombre, DESCRIPCION = :descripcion "
                                                . "WHERE idCotizacionDetalleTipoEstado = :idCotizacionDetalleTipoEstado");

            $stmt -> bindParam(":idCotizacionDetalleTipoEstado", $datos["idCotizacionDetalleTipoEstado"], PDO::PARAM_STR);
            $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":descripcion", $datos["descripcion"],PDO::PARAM_STR);

            if($stmt -> execute()){
                    return "ok";
            }else{
                    return "error";	
            }

            $stmt -> close();
            $stmt = null;
            
        } catch (PDOException $ex) {
            print "ERROR:" . $ex->getMessage();
            return $ex->getMessage();
        }             
    }
    

    static public function mdlActualizarCotizacionDetalleTipoEstado($tabla, $item1, $valor1, $item2, $valor2){
        
            require_once "../conf/config.inc.php";

            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

            $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
            $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

            if($stmt -> execute()){
                    return "ok";
            }else{
                    return "error";	
            }

            $stmt -> close();
            $stmt = null;
    } 
 

    static public function mdlBorrarCotizacionDetalleTipoEstado($tabla, $datos){

        //include_once "../conf/config.inc.php";

        try {               
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCotizacionDetalleTipoEstado = :idCotizacionDetalleTipoEstado");

            $stmt -> bindParam(":idCotizacionDetalleTipoEstado", $datos, PDO::PARAM_INT);

            if($stmt -> execute()){
                    return "ok";
            }else{
                    return "error";
            }
            
            $stmt -> close();
            $stmt = null;

        } catch (PDOException $ex) {
            print "ERROR:" . $ex->getMessage();
            return $ex->getMessage();
        }
    }

  
}

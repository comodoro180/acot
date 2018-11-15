<?php

require_once "conexion.php";

class ModeloTipoProducto {
    

    static public function mdlMostrarTiposProducto($tabla, $campo, $valor) {
        try {
		if($campo != null){
                    //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $campo = :$campo");
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM ttipoproducto where $campo = :$campo");
                    $stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
		}else{

                    $stmt = Conexion::conectar()->prepare("SELECT * FROM ttipoproducto");
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
    
    static public function mdlIngresarTipoProducto($tabla,$datos){
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
    

    static public function mdlEditarTipoProducto($tabla, $datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NOMBRE = :nombre, DESCRIPCION = :descripcion WHERE idTipoProducto = :idTipoProducto");

            $stmt -> bindParam(":idTipoProducto", $datos["idTipoProducto"], PDO::PARAM_STR);
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
    

    static public function mdlActualizarTipoProducto($tabla, $item1, $valor1, $item2, $valor2){
        
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
 

    static public function mdlBorrarTipoProducto($tabla, $datos){

        //include_once "../conf/config.inc.php";

        try {               
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idTipoProducto = :idTipoProducto");

            $stmt -> bindParam(":idTipoProducto", $datos, PDO::PARAM_INT);

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

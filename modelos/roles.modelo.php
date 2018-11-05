<?php

require_once "conexion.php";

class ModeloRoles {
    

    static public function mdlMostrarRoles($tabla, $campo, $valor) {
        try {
		if($campo != null){
                    //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $campo = :$campo");
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where $campo = :$campo");
                    $stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
		}else{

                    $stmt = Conexion::conectar()->prepare("SELECT * FROM tperfil");
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
    
    static public function mdlIngresarRol($tabla,$datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,descrpcion) "
                                                . "VALUES (:nombre,:descrpcion)");

            $stmt->bindParam(":descrpcion", $datos["descrpcion"],PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            
            if ($stmt->execute()){
                return "ok";
            }
            
        } catch (PDOException $ex) {
            print "ERROR" . $ex->getMessage();
            return $ex->getMessage();
        } 
    }
    

    static public function mdlEditarRol($tabla, $datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NOMBRE = :nombre, DESCRPCION = :descrpcion WHERE idPerfil = :idPerfil");

            $stmt -> bindParam(":idPerfil", $datos["idPerfil"], PDO::PARAM_STR);
            $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":descrpcion", $datos["descrpcion"],PDO::PARAM_STR);

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
    

    static public function mdlActualizarRol($tabla, $item1, $valor1, $item2, $valor2){
        
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
 

    static public function mdlBorrarRol($tabla, $datos){

            include_once "../conf/config.inc.php";
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idPerfil = :idRol");

            $stmt -> bindParam(":idRol", $datos, PDO::PARAM_INT);

            if($stmt -> execute()){
                    return "ok";
            }else{
                    return "error";
            }
            
            $stmt -> close();
            $stmt = null;
    } 

  
}

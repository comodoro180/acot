<?php

require_once "conexion.php";

class ModeloCiudades {
    
    /* =============================================
      MOSTRAR
      ============================================= */
    static public function mdlMostrarCiudades($tabla, $campo, $valor) {
        try {
		if($campo != null){
                    
                    $stmt = Conexion::conectar()->prepare(
                                "SELECT c.*, \n"
                              . "d.NOMBRE as DEPARTAMENTO, \n"
                              . "p.NOMBRE as PAIS\n"
                              . "FROM tciudad c, tdepartamento d, tpais p\n"
                              . "WHERE c.IDDEPARTAMENTO = d.IDDEPARTAMENTO\n"
                              . "and d.IDPAIS = p.IDPAIS\n"
                              . "and $campo = :$campo"
                            );
                    
                    $stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);
                    $stmt -> execute();
                    
                    return $stmt -> fetch();
                    
		}else{

                    $stmt = Conexion::conectar()->prepare(
                                "SELECT c.*, \n"
                              . "d.NOMBRE as DEPARTAMENTO, \n"
                              . "p.NOMBRE as PAIS\n"
                              . "FROM tciudad c, tdepartamento d, tpais p\n"
                              . "WHERE c.IDDEPARTAMENTO = d.IDDEPARTAMENTO\n"
                              . "and d.IDPAIS = p.IDPAIS\n"                            
                            );
                    
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

    /* =============================================
      INGRESAR
      ============================================= */    
    static public function mdlIngresarCiudad($tabla,$datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, iddepartamento) "
                                                . "VALUES (:nombre, :iddepartamento)");

            $stmt->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);            
            $stmt->bindParam(":iddepartamento", $datos["iddepartamento"],PDO::PARAM_STR);
            
            if ($stmt->execute()){
                return "ok";
            }
            
        } catch (PDOException $ex) {
            print "ERROR" . $ex->getMessage();
            return $ex->getMessage();
        } 
    }
    
    /*=============================================
    EDITAR 
    =============================================*/
    static public function mdlEditarCiudad($tabla, $datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, iddepartamento = :iddepartamento WHERE idciudad = :idciudad");

            $stmt -> bindParam(":idciudad", $datos["idciudad"], PDO::PARAM_STR);
            $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":iddepartamento", $datos["iddepartamento"], PDO::PARAM_STR);

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

 
    /*=============================================
    BORRAR
    =============================================*/    
    static public function mdlBorrarCiudad($tabla, $datos){

            include_once "../conf/config.inc.php";
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idciudad = :idciudad");

            $stmt -> bindParam(":idciudad", $datos, PDO::PARAM_INT);

            if($stmt -> execute()){
                    return "ok";
            }else{
                    return "error";
            }
            
            $stmt -> close();
            $stmt = null;
    } 
  
}

<?php

require_once "conexion.php";

class ModeloDepartamentos {
    
    /* =============================================
      MOSTRAR USUARIOS
      ============================================= */
    static public function mdlMostrarDepartamentos($tabla, $campo, $valor) {
        try {
		if($campo != null){
                    //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $campo = :$campo");
                    $stmt = Conexion::conectar()->prepare("SELECT d.*,p.NOMBRE as PAIS from tdepartamento d, tpais p where d.IDPAIS = p.IDPAIS and $campo = :$campo ORDER by p.NOMBRE,d.NOMBRE");
                    $stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
		}else{

                    $stmt = Conexion::conectar()->prepare("SELECT d.*,p.NOMBRE as PAIS from tdepartamento d, tpais p where d.IDPAIS = p.IDPAIS ORDER by p.NOMBRE,d.NOMBRE");
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
    
    static public function mdlIngresarDepartamento($tabla,$datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, idpais) "
                                                . "VALUES (:nombre, :idpais)");

            $stmt->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":idpais", $datos["idpais"],PDO::PARAM_STR);
            
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
    static public function mdlEditarDepartamento($tabla, $datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, idpais = :idpais WHERE iddepartamento = :iddepartamento");

            $stmt -> bindParam(":iddepartamento", $datos["iddepartamento"], PDO::PARAM_STR);
            $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":idpais", $datos["idpais"], PDO::PARAM_STR);

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
    static public function mdlBorrarDepartamento($tabla, $datos){

            include_once "../conf/config.inc.php";
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE iddepartamento = :iddepartamento");

            $stmt -> bindParam(":iddepartamento", $datos, PDO::PARAM_INT);

            if($stmt -> execute()){
                    return "ok";
            }else{
                    return "error";
            }
            
            $stmt -> close();
            $stmt = null;
    } 
  
}

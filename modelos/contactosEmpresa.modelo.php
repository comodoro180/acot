<?php

require_once "conexion.php";

class ModeloContactosEmpresa{
    
    /* =============================================
      MOSTRAR 
      ============================================= */
    static public function mdlMostrarContactosEmpresa($tabla, $campo, $valor) {
        try {
		if($campo != null){                    
                    $stmt = Conexion::conectar()->prepare("SELECT ce.*, e.nombre as EMPRESA "
                                                        . "FROM tempresacontactos ce, tempresa e "
                                                        . "WHERE ce.IDEMPRESA = e.IDEMPRESA "
                                                        . "AND $campo = :$campo");
                    $stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                    
		}else{
                    $stmt = Conexion::conectar()->prepare("SELECT ce.*, e.nombre as EMPRESA "
                                                        . "FROM tempresacontactos ce, tempresa e "
                                                        . "WHERE ce.IDEMPRESA = e.IDEMPRESA ");
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
    static public function mdlIngresarContactosEmpresa($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO tempresacontactos"
                                                . " (EMAIL, ESTADO, PRINCIPAL, NOMBRE, IDEMPRESA) VALUES "
                                                . "(:email, 0, :principal, :nombre, :idEmpresa)");

            $stmt->bindParam(":email", $datos["email"],PDO::PARAM_STR);
            $stmt->bindParam(":principal", $datos["principal"],PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":idEmpresa", $datos["idEmpresa"],PDO::PARAM_STR);
            
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
    static public function mdlEditarContactoEmpresa($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("UPDATE tempresacontactos "
                                                . "SET EMAIL=:email, PRINCIPAL=:principal, "
                                                . "NOMBRE=:nombre, IDEMPRESA=:idEmpresa "
                                                . "WHERE IDEMPRESACONTACTOS=:idEmpresaContactos");
            
            $stmt->bindParam(":idEmpresaContactos", $datos["idEmpresaContactos"],PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"],PDO::PARAM_STR);
            $stmt->bindParam(":principal", $datos["principal"],PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":idEmpresa", $datos["idEmpresa"],PDO::PARAM_STR);

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
    ACTUALIZAR
    =============================================*/
    static public function mdlActualizarContactoEmpresa($tabla, $item1, $valor1, $item2, $valor2){
        
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
 
    /*=============================================
    BORRAR
    =============================================*/    
    static public function mdlBorrarContactoEmpresa($datos){
        try{
            include_once "../conf/config.inc.php";
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM tempresacontactos WHERE IDEMPRESACONTACTOS = :idEmpresaContactos");

            $stmt -> bindParam(":idEmpresaContactos", $datos, PDO::PARAM_INT);

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

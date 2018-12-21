<?php

require_once "conexion.php";

class ModeloContactosProveedor{
    
    /* =============================================
      MOSTRAR 
      ============================================= */
    static public function mdlMostrarContactosProveedor($tabla, $campo, $valor) {
        try {
		if($campo != null){                    
                    $stmt = Conexion::conectar()->prepare("SELECT cp.*, p.nombre as PROVEEDOR "
                                                        . "FROM tproveedorcontactos cp, tproveedor p "
                                                        . "WHERE cp.IDPROVEEDOR = p.IDPROVEEDOR "
                                                        . "AND $campo = :$campo");
                    $stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                    
		}else{
                    $stmt = Conexion::conectar()->prepare("SELECT cp.*, p.nombre as PROVEEDOR "
                                                        . "FROM tproveedorcontactos cp, tproveedor p "
                                                        . "WHERE cp.IDPROVEEDOR = p.IDPROVEEDOR ");
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
    static public function mdlIngresarContactosProveedor($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO tproveedorcontactos"
                                                . " (EMAIL, ESTADO, PRINCIPAL, NOMBRE, IDPROVEEDOR) VALUES "
                                                . "(:email, 0, :principal, :nombre, :idProveedor)");

            $stmt->bindParam(":email", $datos["email"],PDO::PARAM_STR);
            $stmt->bindParam(":principal", $datos["principal"],PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":idProveedor", $datos["idProveedor"],PDO::PARAM_STR);
            
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
    static public function mdlEditarContactoProveedor($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("UPDATE tproveedorcontactos "
                                                . "SET EMAIL=:email, NOMBRE=:nombre, "
                                                . "PRINCIPAL=:principal, "
                                                . "IDPROVEEDOR=:idProveedor WHERE "
                                                . "IDEMPRESACONTACTOS=:idEmpresaContactos");
            
            $stmt->bindParam(":idEmpresaContactos", $datos["idEmpresaContactos"],PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"],PDO::PARAM_STR);
            $stmt->bindParam(":principal", $datos["principal"],PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":idProveedor", $datos["idProveedor"],PDO::PARAM_STR);

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
    static public function mdlActualizarContactoProveedor($tabla, $item1, $valor1, $item2, $valor2){
        
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
    static public function mdlBorrarContactoProveedor($datos){
        try{
            include_once "../conf/config.inc.php";
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM tproveedorcontactos WHERE IDEMPRESACONTACTOS = :idProveedorContactos");

            $stmt -> bindParam(":idProveedorContactos", $datos, PDO::PARAM_INT);

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

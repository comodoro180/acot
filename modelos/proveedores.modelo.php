<?php

require_once "conexion.php";

class ModeloProveedores{
    
    /* =============================================
      MOSTRAR 
      ============================================= */
    static public function mdlMostrarProveedores($campo, $valor) {
        try {
		if($campo != null){                    
                    $stmt = Conexion::conectar()->prepare("SELECT p.*, c.nombre as CIUDAD, d.nombre as DEPARTAMENTO, pa.nombre as PAIS  "
                                                        . "FROM tproveedor p, tciudad c, tdepartamento d, tpais pa  "
                                                        . "WHERE p.IDCIUDAD = c.IDCIUDAD "
                                                        . "AND c.IDDEPARTAMENTO = d.IDDEPARTAMENTO "
                                                        . "AND d.IDPAIS = pa.IDPAIS "
                                                        . "AND $campo = :$campo");
                    $stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                    
		}else{
                    $stmt = Conexion::conectar()->prepare("SELECT p.*, c.nombre as CIUDAD, d.nombre as DEPARTAMENTO, pa.nombre as PAIS  "
                                                        . "FROM tproveedor p, tciudad c, tdepartamento d, tpais pa  "
                                                        . "WHERE p.IDCIUDAD = c.IDCIUDAD "
                                                        . "AND c.IDDEPARTAMENTO = d.IDDEPARTAMENTO "
                                                        . "AND d.IDPAIS = pa.IDPAIS ");
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
    static public function mdlIngresarProveedor($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO tproveedor (NIT, NOMBRE, DIRECCION,TELEFONO1, TELEFONO2, ESTADO, IDCIUDAD) VALUES "
                                                . "(:nit, :nombre, :direccion, :telefono1, :telefono2, 0, :idCiudad)");

            $stmt->bindParam(":nit", $datos["nit"],PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $datos["direccion"],PDO::PARAM_STR);
            $stmt->bindParam(":telefono1", $datos["telefono1"],PDO::PARAM_STR);
            $stmt->bindParam(":telefono2", $datos["telefono2"],PDO::PARAM_STR);
            $stmt->bindParam(":idCiudad", $datos["idCiudad"],PDO::PARAM_STR);
            
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
    static public function mdlEditarProveedor($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("UPDATE tproveedor SET NIT=:nit, "
                                                . "NOMBRE=:nombre, DIRECCION=:direccion, "
                                                . "TELEFONO1=:telefono1, TELEFONO2=:telefono2, "
                                                . "IDCIUDAD=:idCiudad "
                                                . "WHERE IDPROVEEDOR=:idProveedor");
            
            $stmt->bindParam(":idProveedor", $datos["idProveedor"],PDO::PARAM_STR);
            $stmt->bindParam(":nit", $datos["nit"],PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $datos["direccion"],PDO::PARAM_STR);
            $stmt->bindParam(":telefono1", $datos["telefono1"],PDO::PARAM_STR);
            $stmt->bindParam(":telefono2", $datos["telefono2"],PDO::PARAM_STR);
            $stmt->bindParam(":idCiudad", $datos["idCiudad"],PDO::PARAM_STR);

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
    static public function mdlActualizarProveedor($tabla, $item1, $valor1, $item2, $valor2){
        
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
    static public function mdlBorrarProveedor($datos){
        try{
            include_once "../conf/config.inc.php";
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM tproveedor WHERE IDPROVEEDOR = :idProveedor");

            $stmt -> bindParam(":idProveedor", $datos, PDO::PARAM_INT);

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


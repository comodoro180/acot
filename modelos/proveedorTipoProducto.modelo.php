<?php

require_once "conexion.php";

class ModeloProveedorTipoProducto{
    
    /* =============================================
      MOSTRAR 
      ============================================= */
    static public function mdlMostrarProveedorTipoProducto($tabla, $campo, $valor) {
        try {
		if($campo != null){                    
                    $stmt = Conexion::conectar()->prepare("SELECT ptp.*, pv.nombre as PROVEEDOR, "
                                                        . "tp.nombre as TIPOPRODUCTO "
                                                        . "FROM tproveedortipoproducto ptp, tproveedor pv, ttipoproducto tp "
                                                        . "WHERE ptp.IDPROVEEDOR = pv.IDPROVEEDOR "
                                                        . "AND ptp.IDTIPOPRODUCTO = tp.IDTIPOPRODUCTO "
                                                        . "AND $campo = :$campo");
                    $stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                    
		}else{
                    $stmt = Conexion::conectar()->prepare("SELECT ptp.*, pv.nombre as PROVEEDOR, "
                                                        . "tp.nombre as TIPOPRODUCTO "
                                                        . "FROM tproveedortipoproducto ptp, tproveedor pv, ttipoproducto tp "
                                                        . "WHERE ptp.IDPROVEEDOR = pv.IDPROVEEDOR "
                                                        . "AND ptp.IDTIPOPRODUCTO = tp.IDTIPOPRODUCTO ");
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
    static public function mdlIngresarProveedorTipoProducto($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO tproveedortipoproducto (IDPROVEEDOR, IDTIPOPRODUCTO) VALUES "
                                                . "(:idProveedor, :idTipoProducto)");

            $stmt->bindParam(":idProveedor", $datos["idProveedor"],PDO::PARAM_STR);
            $stmt->bindParam(":idTipoProducto", $datos["idTipoProducto"],PDO::PARAM_STR);
            
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
    static public function mdlEditarProveedorTipoProducto($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("UPDATE tproveedortipoproducto SET "
                                                . "IDPROVEEDOR=:idProveedor, "
                                                . "IDTIPOPRODUCTO=:idTipoProducto "
                                                . "WHERE IDPROVEEDORTIPOPRODUCTO=:idProveedorTipoProducto");
            
            $stmt -> bindParam(":idProveedorTipoProducto", $datos["idProveedorTipoProducto"], PDO::PARAM_STR);
            $stmt->bindParam(":idProveedor", $datos["idProveedor"],PDO::PARAM_STR);
            $stmt->bindParam(":idTipoProducto", $datos["idTipoProducto"],PDO::PARAM_STR);

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
    static public function mdlActualizarProveedorTipoProducto($tabla, $item1, $valor1, $item2, $valor2){
        
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
    static public function mdlBorrarProveedorTipoProducto($datos){
        try{
            include_once "../conf/config.inc.php";
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM tproveedortipoproducto WHERE IDPROVEEDORTIPOPRODUCTO = :idProveedorTipoProducto");

            $stmt -> bindParam(":idProveedorTipoProducto", $datos, PDO::PARAM_INT);

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

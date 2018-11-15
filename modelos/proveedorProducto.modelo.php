<?php

require_once "conexion.php";

class ModeloProveedorProductos{
    
    /* =============================================
      MOSTRAR 
      ============================================= */
    static public function mdlMostrarProveedorProductos($tabla, $campo, $valor) {
        try {
		if($campo != null){                    
                    $stmt = Conexion::conectar()->prepare("SELECT pp.*, pv.nombre as PROVEEDOR, "
                                                        . "pd.nombre as PRODUCTO "
                                                        . "FROM tproveedorproducto pp, tproveedor pv, tproducto pd "
                                                        . "WHERE pp.IDPROVEEDOR = pv.IDPROVEEDOR "
                                                        . "AND pp.IDPRODUCTO = pd.IDPRODUCTO "
                                                        . "AND $campo = :$campo");
                    $stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                    
		}else{
                    $stmt = Conexion::conectar()->prepare("SELECT pp.*, pv.nombre as PROVEEDOR, "
                                                        . "pd.nombre as PRODUCTO "
                                                        . "FROM tproveedorproducto pp, tproveedor pv, tproducto pd "
                                                        . "WHERE pp.IDPROVEEDOR = pv.IDPROVEEDOR "
                                                        . "AND pp.IDPRODUCTO = pd.IDPRODUCTO");
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
    static public function mdlIngresarProveedorProducto($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO tproveedorproducto (IDPROVEEDOR, IDPRODUCTO, VALORUNITARIO) VALUES "
                                                . "(:idProveedor, :idProducto, :valorUnitario)");

            $stmt->bindParam(":idProveedor", $datos["idProveedor"],PDO::PARAM_STR);
            $stmt->bindParam(":idProducto", $datos["idProducto"],PDO::PARAM_STR);
            $stmt->bindParam(":valorUnitario", $datos["valorUnitario"],PDO::PARAM_STR);
            
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
    static public function mdlEditarProveedorProducto($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("UPDATE tproveedorproducto SET "
                                                . "IDPROVEEDOR=:idProveedor, "
                                                . "IDPRODUCTO=:idProducto, "
                                                . "VALORUNITARIO=:valorUnitario WHERE IDPROVEEDORPRODUCTO=:idProveedorProducto");
            
            $stmt -> bindParam(":idProveedorProducto", $datos["idProveedorProducto"], PDO::PARAM_STR);
            $stmt->bindParam(":idProveedor", $datos["idProveedor"],PDO::PARAM_STR);
            $stmt->bindParam(":idProducto", $datos["idProducto"],PDO::PARAM_STR);
            $stmt->bindParam(":valorUnitario", $datos["valorUnitario"],PDO::PARAM_STR);

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
    static public function mdlActualizarProveedorProducto($tabla, $item1, $valor1, $item2, $valor2){
        
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
    static public function mdlBorrarProveedorProducto($datos){
        try{
            include_once "../conf/config.inc.php";
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM tproveedorproducto WHERE IDPROVEEDORPRODUCTO = :idProveedorProducto");

            $stmt -> bindParam(":idProveedorProducto", $datos, PDO::PARAM_INT);

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

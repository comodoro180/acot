<?php

require_once "conexion.php";

class ModeloProductos{
    
    /* =============================================
      MOSTRAR 
      ============================================= */
    static public function mdlMostrarProductos($tabla, $campo, $valor) {
        try {
		if($campo != null){                    
                    $stmt = Conexion::conectar()->prepare("SELECT p.*, tp.nombre as TIPOPRODUCTO "
                                                        . "FROM tproducto p, ttipoproducto tp "
                                                        . "WHERE p.IDTIPOPRODUCTO = tp.IDTIPOPRODUCTO "
                                                        . "AND $campo = :$campo");
                    $stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                    
		}else{
                    $stmt = Conexion::conectar()->prepare("SELECT p.*,tp.nombre as TIPOPRODUCTO "
                                                        . "FROM tproducto p, ttipoproducto tp "
                                                        . "WHERE p.IDTIPOPRODUCTO = tp.IDTIPOPRODUCTO");
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
    static public function mdlIngresarProducto($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO tproducto (NOMBRE, DESCRIPCION, ESTADO, IDTIPOPRODUCTO) VALUES "
                                                . "(:nombre, :descripcion, 0, :idTipoProducto)");

            $stmt->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $datos["descripcion"],PDO::PARAM_STR);
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
    static public function mdlEditarProducto($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("UPDATE tproducto SET NOMBRE=:producto, DESCRIPCION=:descripcion, IDTIPOPRODUCTO=:idTipoProducto WHERE IDPRODUCTO=:idProducto");
            
            $stmt -> bindParam(":idProducto", $datos["idProducto"], PDO::PARAM_STR);
            $stmt -> bindParam(":producto", $datos["producto"], PDO::PARAM_STR);
            $stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
            $stmt -> bindParam(":idTipoProducto", $datos["idTipoProducto"], PDO::PARAM_STR);

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
    static public function mdlActualizarProducto($tabla, $item1, $valor1, $item2, $valor2){
        
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
    static public function mdlBorrarProducto($datos){
        try{
            include_once "../conf/config.inc.php";
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM tproducto WHERE IDPRODUCTO = :idProducto");

            $stmt -> bindParam(":idProducto", $datos, PDO::PARAM_INT);

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

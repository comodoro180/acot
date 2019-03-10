<?php

require_once "conexion.php";

class ModeloPedidoDetalles{
    
    /* =============================================
      MOSTRAR 
      ============================================= */
    static public function mdlMostrarPedidoDetalles($tabla, $campo, $valor) {
        try {
		if($campo != null){                    
                    $stmt = Conexion::conectar()->prepare("SELECT dp.*, pr.nombre as PRODUCTO, p.observaciones as PEDIDO "
                                                        . "FROM tpedidodetalle dp, tproducto pr, tpedido p "
                                                        . "WHERE dp.IDPRODUCTO = pr.IDPRODUCTO "
                                                        . "AND dp.IDPEDIDO = p.IDPEDIDO "
                                                        . "AND $campo = :$campo");
                    $stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                    
		}else{
                    $stmt = Conexion::conectar()->prepare("SELECT dp.*, pr.nombre as PRODUCTO, p.observaciones as PEDIDO "
                                                        . "FROM tpedidodetalle dp, tproducto pr, tpedido p "
                                                        . "WHERE dp.IDPRODUCTO = pr.IDPRODUCTO "
                                                        . "AND dp.IDPEDIDO = p.IDPEDIDO");
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
    static public function mdlIngresarPedidoDetalles($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO tpedidodetalle (CANTIDAD, IDPRODUCTO, IDPEDIDO) VALUES "
                                                . "(:cantidad, :idProducto, :idPedido)");

            $stmt->bindParam(":cantidad", $datos["cantidad"],PDO::PARAM_STR);
            $stmt->bindParam(":idProducto", $datos["idProducto"],PDO::PARAM_STR);
            $stmt->bindParam(":idPedido", $datos["idPedido"],PDO::PARAM_STR);
            
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
    static public function mdlEditarPedidoDetalles($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("UPDATE tpedidodetalle SET CANTIDAD=:cantidad, "
                                                . "IDPRODUCTO=:idProducto, "
                                                . "IDPEDIDO=:idPedido "
                                                . "WHERE IDPEDIDODETALLE=:idPedidoDetalle");
            
            $stmt->bindParam(":idPedidoDetalle", $datos["idPedidoDetalle"],PDO::PARAM_STR);
            $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
            $stmt->bindParam(":idProducto", $datos["idProducto"],PDO::PARAM_STR);
            $stmt->bindParam(":idPedido", $datos["idPedido"],PDO::PARAM_STR);

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
    static public function mdlActualizarPedidoDetalle($tabla, $item1, $valor1, $item2, $valor2){
        
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
    static public function mdlBorrarPedidoDetalle($datos){
        try{
            include_once "../conf/config.inc.php";
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM tpedidodetalle WHERE IDPEDIDODETALLE = :idPedidoDetalle");

            $stmt -> bindParam(":idPedidoDetalle", $datos, PDO::PARAM_INT);

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


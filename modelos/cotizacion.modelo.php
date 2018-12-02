<?php

require_once "conexion.php";

class ModeloCotizacion{
    
    /* =============================================
      MOSTRAR 
      ============================================= */
    static public function mdlMostrarCotizacion($tabla, $campo, $valor) {
        try {
		if($campo != null){                    
                    $stmt = Conexion::conectar()->prepare("SELECT c.*, ce.nombre as ESTADO, "
                                                        . "p.nombre as PROVEEDOR, "
                                                        . "CONCAT(u.nombre,' ',u.apellido) as USUARIO, "
                                                        . "pe.observaciones as PEDIDO "
                                                        . "FROM tcotizacion c, tcotizaciontipoestado ce, "
                                                        . "tusuario u , tpedido pe, tproveedor p "
                                                        . "WHERE c.IDCOTIZACIONTIPOESTADO = ce.IDCOTIZACIONTIPOESTADO "
                                                        . "AND c.IDUSUARIO = u.IDUSUARIO "
                                                        . "AND c.IDPEDIDO = pe.IDPEDIDO "
                                                        . "AND c.IDPROVEEDOR = p.IDPROVEEDOR "
                                                        . "AND $campo = :$campo");
                    $stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                    
		}else{
                    $stmt = Conexion::conectar()->prepare("SELECT c.*, ce.nombre as ESTADO, "
                                                        . "p.nombre as PROVEEDOR, "
                                                        . "CONCAT(u.nombre,' ',u.apellido) as USUARIO, "
                                                        . "pe.observaciones as PEDIDO "
                                                        . "FROM tcotizacion c, tcotizaciontipoestado ce, "
                                                        . "tusuario u , tpedido pe, tproveedor p "
                                                        . "WHERE c.IDCOTIZACIONTIPOESTADO = ce.IDCOTIZACIONTIPOESTADO "
                                                        . "AND c.IDUSUARIO = u.IDUSUARIO "
                                                        . "AND c.IDPEDIDO = pe.IDPEDIDO "
                                                        . "AND c.IDPROVEEDOR = p.IDPROVEEDOR ");
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
    static public function mdlIngresarCotizacion($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO tcotizacion (FECHAVENCIMIENTO, OBSERVACIONES, IDCOTIZACIONTIPOESTADO, IDPEDIDO, IDPROVEEDOR, IDUSUARIO) VALUES "
                                                . "(:fechaVencimiento, :observaciones, :idCotizacionTipoEstado, :idPedido, :idProveedor, :idUsuario)");

            $stmt->bindParam(":fechaVencimiento", $datos["fechaVencimiento"],PDO::PARAM_STR);
            $stmt->bindParam(":observaciones", $datos["observaciones"],PDO::PARAM_STR);
            $stmt->bindParam(":idCotizacionTipoEstado", $datos["idCotizacionTipoEstado"],PDO::PARAM_STR);
            $stmt->bindParam(":idPedido", $datos["idPedido"],PDO::PARAM_STR);
            $stmt->bindParam(":idProveedor", $datos["idProveedor"],PDO::PARAM_STR);
            $stmt->bindParam(":idUsuario", $datos["idUsuario"],PDO::PARAM_STR);
            
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
    static public function mdlEditarCotizacion($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("UPDATE tcotizacion SET FECHAVENCIMIENTO=:fechaVencimiento, "
                                                . "OBSERVACIONES=:observaciones, "
                                                . "IDCOTIZACIONTIPOESTADO=:idCotizacionTipoEstado, "
                                                . "IDPEDIDO=:idPedido, "
                                                . "IDPROVEEDOR=:idProveedor, "
                                                . "IDUSUARIO=:idUsuario "
                                                . "WHERE IDCOTIZACION=:idCotizacion");
            
            $stmt->bindParam(":idCotizacion", $datos["idCotizacion"],PDO::PARAM_STR);
            $stmt->bindParam(":fechaVencimiento", $datos["fechaVencimiento"],PDO::PARAM_STR);
            $stmt->bindParam(":observaciones", $datos["observaciones"],PDO::PARAM_STR);
            $stmt->bindParam(":idCotizacionTipoEstado", $datos["idCotizacionTipoEstado"],PDO::PARAM_STR);
            $stmt->bindParam(":idPedido", $datos["idPedido"],PDO::PARAM_STR);
            $stmt->bindParam(":idProveedor", $datos["idProveedor"],PDO::PARAM_STR);
            $stmt->bindParam(":idUsuario", $datos["idUsuario"],PDO::PARAM_STR);

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
    static public function mdlActualizarCotizacion($tabla, $item1, $valor1, $item2, $valor2){
        
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
    static public function mdlBorrarCotizacion($datos){
        try{
            include_once "../conf/config.inc.php";
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM tcotizacion WHERE IDCOTIZACION = :idCotizacion");

            $stmt -> bindParam(":idCotizacion", $datos, PDO::PARAM_INT);

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


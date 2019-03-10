<?php

require_once "conexion.php";

class ModeloCotizacionDetalles{
    
    /* =============================================
      MOSTRAR 
      ============================================= */
    static public function mdlMostrarCotizacionDetalles($tabla, $campo, $valor) {
        try {
		if($campo != null){                    
                    $stmt = Conexion::conectar()->prepare("SELECT dc.*, d.nombre as DETALLE, "
                                                        . "p.nombre as PRODUCTO, c.observaciones as COTIZACION "
                                                        . "FROM tcotizaciondetalle dc, "
                                                        . "tcotizaciondetalletipoestado d, tproducto p, "
                                                        . "tcotizacion c "
                                                        . "WHERE dc.IDCOTIZACIONDETALLETIPOESTADO = d.IDCOTIZACIONDETALLETIPOESTADO "
                                                        . "AND dc.IDPRODUCTO = p.IDPRODUCTO "
                                                        . "AND dc.IDCOTIZACION = c.IDCOTIZACION "
                                                        . "AND $campo = :$campo");
                    $stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                    
		}else{
                    $stmt = Conexion::conectar()->prepare("SELECT dc.*, d.nombre as DETALLE, "
                                                        . "p.nombre as PRODUCTO, c.observaciones as COTIZACION "
                                                        . "FROM tcotizaciondetalle dc, "
                                                        . "tcotizaciondetalletipoestado d, tproducto p, "
                                                        . "tcotizacion c "
                                                        . "WHERE dc.IDCOTIZACIONDETALLETIPOESTADO = d.IDCOTIZACIONDETALLETIPOESTADO "
                                                        . "AND dc.IDPRODUCTO = p.IDPRODUCTO "
                                                        . "AND dc.IDCOTIZACION = c.IDCOTIZACION ");
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
    static public function mdlIngresarCotizacionDetalles($datos){
        try {
            
                $stmt = Conexion::conectar()->prepare("INSERT INTO tcotizaciondetalle (VALORUNITARIO, VALORCOTIZADO, CANTIDADORIGINAL, CANTIDADCOTIZADA, IDCOTIZACIONDETALLETIPOESTADO, IDCOTIZACION, IDPRODUCTO)"
                                                . " VALUES (:valorUnitario, :valorCotizado, :cantidadOriginal, :cantidadCotizada, :idCotizacionDetalleTipoEstado, :idCotizacion, :idProducto)");

            $stmt->bindParam(":valorUnitario", $datos["valorUnitario"],PDO::PARAM_STR);
            $stmt->bindParam(":valorCotizado", $datos["valorCotizado"],PDO::PARAM_STR);
            $stmt->bindParam(":cantidadOriginal", $datos["cantidadOriginal"],PDO::PARAM_STR);
            $stmt->bindParam(":cantidadCotizada", $datos["cantidadCotizada"],PDO::PARAM_STR);
            $stmt->bindParam(":idCotizacionDetalleTipoEstado", $datos["idCotizacionDetalleTipoEstado"],PDO::PARAM_STR);
            $stmt->bindParam(":idCotizacion", $datos["idCotizacion"],PDO::PARAM_STR);
            $stmt->bindParam(":idProducto", $datos["idProducto"],PDO::PARAM_STR);
            
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
    static public function mdlEditarCotizacionDetalles($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("UPDATE tcotizaciondetalle SET VALORUNITARIO=:valorUnitario, "
                                                . "VALORCOTIZADO=:valorCotizado, "
                                                . "CANTIDADORIGINAL=:cantidadOriginal, "
                                                . "CANTIDADCOTIZADA=:cantidadCotizada, "
                                                . "IDCOTIZACIONDETALLETIPOESTADO=:idCotizacionDetalleTipoEstado, "
                                                . "IDCOTIZACION=:idCotizacion, IDPRODUCTO=:idProducto "
                                                . "WHERE IDCOTIZACIONDETALLE=:idCotizacionDetalle");
            
            $stmt->bindParam(":idCotizacionDetalle", $datos["idCotizacionDetalle"],PDO::PARAM_STR);
            $stmt->bindParam(":valorUnitario", $datos["valorUnitario"],PDO::PARAM_STR);
            $stmt->bindParam(":valorCotizado", $datos["valorCotizado"],PDO::PARAM_STR);
            $stmt->bindParam(":cantidadOriginal", $datos["cantidadOriginal"],PDO::PARAM_STR);
            $stmt->bindParam(":cantidadCotizada", $datos["cantidadCotizada"],PDO::PARAM_STR);
            $stmt->bindParam(":idCotizacionDetalleTipoEstado", $datos["idCotizacionDetalleTipoEstado"],PDO::PARAM_STR);
            $stmt->bindParam(":idCotizacion", $datos["idCotizacion"],PDO::PARAM_STR);
            $stmt->bindParam(":idProducto", $datos["idProducto"],PDO::PARAM_STR);

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
    static public function mdlActualizarCotizacionDetalle($tabla, $item1, $valor1, $item2, $valor2){
        
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
    static public function mdlBorrarCotizacionDetalle($datos){
        try{
            include_once "../conf/config.inc.php";
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM tcotizaciondetalle WHERE IDCOTIZACIONDETALLE = :idCotizacionDetalle");

            $stmt -> bindParam(":idCotizacionDetalle", $datos, PDO::PARAM_INT);

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


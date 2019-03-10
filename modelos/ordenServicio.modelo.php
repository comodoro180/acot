<?php

require_once "conexion.php";

class ModeloOrdenServicio{
    
    /* =============================================
      MOSTRAR 
      ============================================= */
    static public function mdlMostrarOrdenServicio($tabla, $campo, $valor) {
        try {
		if($campo != null){                    
                    $stmt = Conexion::conectar()->prepare("SELECT os.*, e.nombre as ESTADO, "
                                                        . "CONCAT(u.nombre,' ',u.apellido) as USUARIO, "
                                                        . "c.observaciones as COTIZACION "
                                                        . "FROM tordenservicio os, tordenserviciotipoestado e, "
                                                        . "tusuario u, tcotizacion c  "
                                                        . "WHERE os.IDORDENSERVICIOTIPOESTADO = e.IDORDENSERVICIOTIPOESTADO "
                                                        . "AND os.IDCOTIZACION = c.IDCOTIZACION "
                                                        . "AND os.IDUSUARIO = u.IDUSUARIO "
                                                        . "AND $campo = :$campo");
                    $stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                    
		}else{
                    $stmt = Conexion::conectar()->prepare("SELECT os.*, e.nombre as ESTADO, "
                                                        . "CONCAT(u.nombre,' ',u.apellido) as USUARIO, "
                                                        . "c.observaciones as COTIZACION "
                                                        . "FROM tordenservicio os, tordenserviciotipoestado e, "
                                                        . "tusuario u, tcotizacion c  "
                                                        . "WHERE os.IDORDENSERVICIOTIPOESTADO = e.IDORDENSERVICIOTIPOESTADO "
                                                        . "AND os.IDCOTIZACION = c.IDCOTIZACION "
                                                        . "AND os.IDUSUARIO = u.IDUSUARIO ");
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
    static public function mdlIngresarOrdenServicio($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO tordenservicio (IDORDENSERVICIOTIPOESTADO, IDCOTIZACION, IDUSUARIO) VALUES "
                                                . "(:idOrdenServicioTipoEstado, :idCotizacion, :idUsuario)");

            $stmt->bindParam(":idOrdenServicioTipoEstado", $datos["idOrdenServicioTipoEstado"],PDO::PARAM_STR);
            $stmt->bindParam(":idCotizacion", $datos["idCotizacion"],PDO::PARAM_STR);
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
    static public function mdlEditarOrdenServicio($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("UPDATE tordenservicio SET IDORDENSERVICIOTIPOESTADO=:idOrdenServicioTipoEstado, "
                                                . "IDCOTIZACION=:idCotizacion, "
                                                . "IDUSUARIO=:idUsuario "
                                                . "WHERE IDORDENSERVICIO=:idOrdenServicio");
            
            $stmt->bindParam(":idOrdenServicio", $datos["idOrdenServicio"],PDO::PARAM_STR);
            $stmt->bindParam(":idOrdenServicioTipoEstado", $datos["idOrdenServicioTipoEstado"], PDO::PARAM_STR);
            $stmt->bindParam(":idCotizacion", $datos["idCotizacion"],PDO::PARAM_STR);
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
    static public function mdlActualizarOrdenServicio($tabla, $item1, $valor1, $item2, $valor2){
        
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
    static public function mdlBorrarOrdenServicio($datos){
        try{
            include_once "../conf/config.inc.php";
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM tordenservicio WHERE IDORDENSERVICIO = :idOrdenServicio");

            $stmt -> bindParam(":idOrdenServicio", $datos, PDO::PARAM_INT);

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


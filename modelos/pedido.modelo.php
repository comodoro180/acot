<?php

require_once "conexion.php";

class ModeloPedidos{
    
    /* =============================================
      MOSTRAR 
      ============================================= */
    static public function mdlMostrarPedidos($tabla, $campo, $valor) {
        try {
		if($campo != null){                    
                    $stmt = Conexion::conectar()->prepare("SELECT p.*, pe.nombre as ESTADO, e.nombre as EMPRESA, CONCAT(u.nombre,' ',u.apellido) as USUARIO "
                                                        . "FROM tpedido p, tpedidotipoestado pe, tempresa e, tusuario u  "
                                                        . "WHERE p.IDPEDIDOTIPOESTADO = pe.IDPEDIDOTIPOESTADO "
                                                        . "AND p.IDEMPRESA = e.IDEMPRESA "
                                                        . "AND p.IDUSUARIO = u.IDUSUARIO "
                                                        . "AND $campo = :$campo");
                    $stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                    
		}else{
                    $stmt = Conexion::conectar()->prepare("SELECT p.*, pe.nombre as ESTADO, e.nombre as EMPRESA, CONCAT(u.nombre,' ',u.apellido) as USUARIO "
                                                        . "FROM tpedido p, tpedidotipoestado pe, tempresa e, tusuario u  "
                                                        . "WHERE p.IDPEDIDOTIPOESTADO = pe.IDPEDIDOTIPOESTADO "
                                                        . "AND p.IDEMPRESA = e.IDEMPRESA "
                                                        . "AND p.IDUSUARIO = u.IDUSUARIO");
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
    static public function mdlIngresarPedido($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO tpedido (FECHAENTREGA, OBSERVACIONES, IDPEDIDOTIPOESTADO, IDEMPRESA, IDUSUARIO) VALUES "
                                                . "(:fechaEntrega, :observaciones, :idPedidoTipoEstado, :idEmpresa, :idUsuario)");

            $stmt->bindParam(":fechaEntrega", $datos["fechaEntrega"],PDO::PARAM_STR);
            $stmt->bindParam(":observaciones", $datos["observaciones"],PDO::PARAM_STR);
            $stmt->bindParam(":idPedidoTipoEstado", $datos["idPedidoTipoEstado"],PDO::PARAM_STR);
            $stmt->bindParam(":idEmpresa", $datos["idEmpresa"],PDO::PARAM_STR);
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
    static public function mdlEditarPedido($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("UPDATE tpedido SET FECHAENTREGA=:fechaEntrega, "
                                                . "OBSERVACIONES=:observaciones, "
                                                . "IDPEDIDOTIPOESTADO=:idPedidoTipoEstado, "
                                                . "IDEMPRESA=:idEmpresa, IDUSUARIO=:idUsuario "
                                                . "WHERE IDPEDIDO=:idPedido");
            
            $stmt->bindParam(":idPedido", $datos["idPedido"],PDO::PARAM_STR);
            $stmt->bindParam(":fechaEntrega", $datos["fechaEntrega"], PDO::PARAM_STR);
            $stmt->bindParam(":observaciones", $datos["observaciones"],PDO::PARAM_STR);
            $stmt->bindParam(":idPedidoTipoEstado", $datos["idPedidoTipoEstado"],PDO::PARAM_STR);
            $stmt->bindParam(":idEmpresa", $datos["idEmpresa"],PDO::PARAM_STR);
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
    static public function mdlActualizarPedido($tabla, $item1, $valor1, $item2, $valor2){
        
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
    static public function mdlBorrarPedido($datos){
        try{
            include_once "../conf/config.inc.php";
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM tpedido WHERE IDPEDIDO = :idPedido");

            $stmt -> bindParam(":idPedido", $datos, PDO::PARAM_INT);

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


<?php

require_once "conexion.php";

class ModeloEmpresas{
    
    /* =============================================
      MOSTRAR 
      ============================================= */
    static public function mdlMostrarEmpresas($tabla,$campo, $valor) {
        try {
		if($campo != null){                    
                    $stmt = Conexion::conectar()->prepare("SELECT e.*,c.nombre as CIUDAD, d.nombre as DEPARTAMENTO, p.nombre as PAIS "
                                                        . "FROM tempresa e, tciudad c, tdepartamento d, tpais p "
                                                        . "WHERE e.IDCIUDAD = c.IDCIUDAD "
                                                        . "AND c.IDDEPARTAMENTO = d.IDDEPARTAMENTO "
                                                        . "AND d.IDPAIS = p.IDPAIS "
                                                        . "AND $campo = :$campo");
                    $stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
                    
		}else{
                    $stmt = Conexion::conectar()->prepare("SELECT e.*,c.nombre as CIUDAD, d.nombre as DEPARTAMENTO, p.nombre as PAIS "
                                                        . "FROM tempresa e, tciudad c, tdepartamento d, tpais p "
                                                        . "WHERE e.IDCIUDAD = c.IDCIUDAD "
                                                        . "AND c.IDDEPARTAMENTO = d.IDDEPARTAMENTO "
                                                        . "AND d.IDPAIS = p.IDPAIS");
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
    static public function mdlIngresarEmpresa($datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO tempresa (NOMBRE, TELEFONOPRINCIPAL, DIRECCION, NIT, ESTADO, IDCIUDAD) VALUES "
                                                . "(:nombre, :telefono, :direccion, :nit, 0, :idCiudad)");

            $stmt->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"],PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $datos["direccion"],PDO::PARAM_STR);
            $stmt->bindParam(":nit", $datos["nit"],PDO::PARAM_STR);
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
    static public function mdlEditarEmpresa($datos){
        try {
            
            //$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, clave = :clave, idperfil = :idperfil, email = :email  WHERE idusuario = :idusuario");
            $stmt = Conexion::conectar()->prepare("UPDATE tempresa SET NOMBRE=:empresa, TELEFONOPRINCIPAL=:telefono, DIRECCION=:direccion, NIT=:nit, IDCIUDAD=:idCiudad WHERE IDEMPRESA=:idEmpresa");
            
            $stmt -> bindParam(":idEmpresa", $datos["idEmpresa"], PDO::PARAM_STR);
            $stmt -> bindParam(":empresa", $datos["empresa"], PDO::PARAM_STR);
            $stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt -> bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
            $stmt -> bindParam(":nit", $datos["nit"], PDO::PARAM_INT);            
            $stmt -> bindParam(":idCiudad", $datos["idCiudad"], PDO::PARAM_STR);

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
    static public function mdlActualizarEmpresa($tabla, $item1, $valor1, $item2, $valor2){
        
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
    static public function mdlBorrarEmpresa($datos){
        try{
            include_once "../conf/config.inc.php";
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM tempresa WHERE IDEMPRESA = :idEmpresa");

            $stmt -> bindParam(":idEmpresa", $datos, PDO::PARAM_INT);

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

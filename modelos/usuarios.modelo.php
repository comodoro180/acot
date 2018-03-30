<?php

require_once "conexion.php";

class ModeloUsuarios {
    
    /* =============================================
      MOSTRAR USUARIOS
      ============================================= */
    static public function mdlMostrarUsuarios($tabla, $campo, $valor) {
        try {
		if($campo != null){
                    //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $campo = :$campo");
                    $stmt = Conexion::conectar()->prepare("SELECT u.*,p.`NOMBRE` AS PERFIL,p.`IDPERFIL` AS IDPERFIL FROM $tabla u, tperfil p where u.`IDPERFIL`=p.`IDPERFIL` and $campo = :$campo");
                    $stmt -> bindParam(":".$campo, $valor, PDO::PARAM_STR);
                    $stmt -> execute();
                    return $stmt -> fetch();
		}else{

                    $stmt = Conexion::conectar()->prepare("SELECT u.*,p.`NOMBRE` AS PERFIL,p.`IDPERFIL` AS IDPERFIL FROM tusuario u, tperfil p where u.`IDPERFIL`=p.`IDPERFIL`");
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
    
    static public function mdlIngresarUsuario($tabla,$datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, email, clave, estado, idperfil) "
                                                . "VALUES (:nombre, :apellido, :email, :clave, 0, :idperfil)");

            $stmt->bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"],PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"],PDO::PARAM_STR);
            $stmt->bindParam(":clave", $datos["clave"],PDO::PARAM_STR);
            $stmt->bindParam(":idperfil", $datos["idperfil"],PDO::PARAM_STR);
            
            if ($stmt->execute()){
                return "ok";
            }
            
        } catch (PDOException $ex) {
            print "ERROR" . $ex->getMessage();
            return $ex->getMessage();
        } 
    }
    
    /*=============================================
    EDITAR USUARIO
    =============================================*/
    static public function mdlEditarUsuario($tabla, $datos){
        try {
            
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, clave = :clave, idperfil = :idperfil, email = :email  WHERE idusuario = :idusuario");

            $stmt -> bindParam(":idusuario", $datos["idusuario"], PDO::PARAM_STR);
            $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt -> bindParam(":clave", $datos["clave"], PDO::PARAM_STR);
            $stmt -> bindParam(":idperfil", $datos["idperfil"], PDO::PARAM_INT);            
            $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);

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
    ACTUALIZAR USUARIO
    =============================================*/
    static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){
        
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
    BORRAR USUARIO
    =============================================*/    
    static public function mdlBorrarUsuario($tabla, $datos){

            include_once "../conf/config.inc.php";
            
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idusuario = :idusuario");

            $stmt -> bindParam(":idusuario", $datos, PDO::PARAM_INT);

            if($stmt -> execute()){
                    return "ok";
            }else{
                    return "error";
            }
            
            $stmt -> close();
            $stmt = null;
    } 

    /*=============================================
    ACTUALIZAR USUARIO
    =============================================*/
    static public function mdlActualizarUsuario2($tabla, $item1, $valor1, $item2, $valor2){
        
            //require_once "../conf/config.inc.php";

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
}

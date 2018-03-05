<?php

class Conexion {

    static public function conectar() {       
        
        require_once 'conf/config.inc.php';
        
        try {
            $link = new PDO('mysql:host=' . NOMBRE_SERVIDOR . '; dbname=' . NOMBRE_BD, NOMBRE_USUARIO, PASSWORD);

            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $link->exec("set names utf8");

            return $link;
            
        } catch (PDOException $ex) {
            print "ERROR: " . $ex->getMessage() . "<br>";
            die();
        }
    }

}

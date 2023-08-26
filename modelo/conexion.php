<?php

namespace modelo;
use PDO;
use Exception;

class conexion{

    // private $ip = "sql102.0hi.me";//tambien 127.0.0.1 al ser servidor local phpmyadmin
    // private $bd = "0hi_33815300_bdmma";//nombre de la base de datos
    // private $usuario = "0hi_33815300";
    // private $contrasena = "mmalara123";

    
    private $ip = "localhost";
    private $bd = "bdmma";
    private $usuario = "root";
    private $contrasena = "";


    //metodo para conectar la base de datos
    protected function conecta(){
    	
    	$pdo = new PDO("mysql:host=".$this->ip.";dbname=".$this->bd."",$this->usuario,$this->contrasena); //la variable $pdo es una instancia de la clase PDO

    	$pdo->exec("set names utf8");
        return $pdo;
    }

    protected function registrar_bitacora($cedula, $accion, $id_modulo)
    {
        $sql = "INSERT INTO bitacora_usuario (cedula_usuario, id_modulo, fecha_registro, hora_registro, accion_realizada) 
        VALUES(:ced, :id, CURDATE(), CURTIME(), :accion)";

        $stmt = $this->conecta()->prepare($sql);

        $accion = $this->encriptar($accion);

        $stmt->execute(array(
            ":ced" => $cedula,
            ":id" => $id_modulo,
            ":accion" => $accion
        ));
    }

    protected function encriptar($texto){
        $publicKey = openssl_pkey_get_public(file_get_contents('keys/public.key'));

        openssl_public_encrypt($texto,$textoEncriptado,$publicKey);

        return base64_encode($textoEncriptado);
    }

    protected function desencriptar($texto){
        $privateKey = openssl_pkey_get_private(file_get_contents('keys/private.key'));

        openssl_private_decrypt(base64_decode($texto),$textoDesencriptado,$privateKey);

        return $textoDesencriptado;
    }
		
}
?>
<?php

namespace modelo;
use PDO;
use Exception;

/* APP */
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use flight;

class conexion{
    
    private $ip = DB_HOST;
    private $bd = DB_NAME;
    private $usuario = DB_USER;
    private $contrasena = DB_PASSWORD;


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
        $publicKey = openssl_pkey_get_public(file_get_contents(PATH_PUBLIC_KEY));

        openssl_public_encrypt($texto,$textoEncriptado,$publicKey);

        return base64_encode($textoEncriptado);
    }

    protected function desencriptar($texto){
        $privateKey = openssl_pkey_get_private(file_get_contents(PATH_PRIVATE_KEY));

        openssl_private_decrypt(base64_decode($texto),$textoDesencriptado,$privateKey);

        return $textoDesencriptado;
    }

    /* ---- APP ----*/
    protected function getTokenApp(){
        //obtener headers http 
        $headers = apache_request_headers();
        if(!isset($headers['jwt'])){
            Flight::halt(403,json_encode([
                'error' => 'Unauthenticated request',
                'status' => 'error'
            ]));
        }
        
        $jwt = explode(" ", $headers['jwt'])[1];

        try {
            return JWT::decode($jwt,new Key($_ENV['JWT_SECRET_KEY'],'HS256'));
        } catch (\Throwable $th) {
            //cualquier error al decoder se presentara en el message
            Flight::halt(403,json_encode([
                'error' => $th->getMessage(),
                'status' => 'error'
            ]));
        }

    }
    
    protected function validarTokenApp(){
        $info = $this->getTokenApp();
        $db = $this->conecta();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->prepare('SELECT cedula FROM usuarios WHERE cedula = :cedula');
        //data que proveniente de la creacion del token
        $query->execute([":cedula" => $info->data]);
        $rows = $query->fetchColumn();
        return $rows;
    }
		
}
?>
<?php

require('../vendor/autoload.php');
//inicializacion de instancia env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

//configuracion de la base de datos
$ip = $_ENV['DB_HOST'];
$bd = $_ENV['DB_NAME'];
$usuario = $_ENV['DB_USER'];
$contrasena = $_ENV['DB_PASSWORD'];

Flight::register('db', 'PDO', array("mysql:host=".$ip.";dbname=".$bd."",$usuario,$contrasena),function ($db){
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
});

function encriptar ($mensaje){

    $publicKey = openssl_pkey_get_public(file_get_contents($_ENV['PATH_PUBLIC_KEY_APP']));

    openssl_public_encrypt(json_encode($mensaje),$encriptado,$publicKey);

    return base64_encode($encriptado);
    
}

function desencriptar ($mensajeEncriptado) {
    $privateKey = file_get_contents($_ENV['PATH_PRIVATE_KEY_APP']);

    openssl_private_decrypt(base64_decode($mensajeEncriptado), $dataDesencriptado, $privateKey);

    return json_decode($dataDesencriptado,true);
    
}

Flight::route('POST /auth', function(){

    $db = Flight::db();

    $datos = desencriptar(Flight::request()->data->data);

    $cedula = $datos['cedula'];
    $contrasena = $datos['contrasena'];

    if(preg_match_all('/^[0-9]{7,8}$/',$cedula)){
        if(preg_match_all('/^[A-Za-z0-9ñÑ_.@$!%*?&#\/\b-]{6,70}$/',$contrasena)){
            
            $query = $db->prepare('SELECT * from usuarios where cedula = :cedula');
        
            if($query->execute([':cedula' => $cedula])){
                $usuario = $query->fetch();
                if ($usuario['cedula']){
        
                    if(password_verify($contrasena, $usuario['contrasena'])){
        
                        $key = $_ENV['JWT_SECRET_KEY'];
            
                        $payload = [
                            'iat' => time(), //tiempo de emision del token
                            'exp' => time() + 3600,//tiempo de expiracion del token (1 hora)
                            'data' => $usuario['cedula']
                        ];

                        $jwt = JWT::encode($payload, $key, 'HS256');

                        $array = [
                            
                            'token' => encriptar($jwt),
                            'data' =>encriptar([
                                'status' => 'success',
                                'cedula' => $usuario['cedula'],
                                'nombre' => $usuario['nombre'],
                                'correo' => $usuario['correo'],
                                'rol' => $usuario['id_rol']
                            ])
                        ];
                    }else{
                        $array = [
                            'data'=>encriptar([

                                'error' => 'Datos incorrectos , intente de nuevo',
                                'status' => 'error'
                            ])
                        ];
                    }
                }
                else {
                    $array = [
                        'data' =>encriptar([
                            'error' => 'Usuario no existe , intente de nuevo',
                            'status' => 'error'
                        ])
                    ];
                }
            }
        }
        else{
            $array = [

                'data' => encriptar([
                    'error' => 'Error en contraseña, intente de nuevo',
                    'status' => 'error'
                ])
            ];
        }
    }else{
        $array = [
            'data' => encriptar([
                'status' => 'error',
                'error' => 'Error en cedula, intente de nuevo',
            ])
        ];
    }

    
    Flight::json($array);
});

Flight::start();
<?php
// namespace modelo;
require('../vendor/autoload.php'); // Asegúrate de que la ruta sea correcta

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=bdmma','root',''),function ($db){
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
});


Flight::route('POST /auth', function(){

    
    $db = Flight::db();
    $cedula = Flight::request()->data->cedula;
    $contrasena = Flight::request()->data->contrasena;

    if(preg_match_all('/^[0-9]{7,8}$/',$cedula)){
        if(preg_match_all('/^[A-Za-z0-9ñÑ_.@$!%*?&#\/\b-]{6,70}$/',$contrasena)){
            
            $query = $db->prepare('SELECT * from usuarios where cedula = :cedula');
        
            if($query->execute([':cedula' => $cedula])){
                $usuario = $query->fetch();
                if ($usuario['cedula']){
        
                    if(password_verify($contrasena, $usuario['contrasena'])){
        
                        $key = 'Key_JWT_MMA';
            
                        $payload = [
                            'iat' => time(), //tiempo de emision del token
                            'exp' => time() + 3600,//tiempo de expiracion del token (1 hora)
                            'data' => ''
                        ];
                        $jwt = JWT::encode($payload, $key, 'HS256');
            
                        $array = [
                            'success' => true,
                            'statusCode' => 200,
                            'message' => 'Credential is valid',
                            'data' => [
                                'token' => $jwt,
                                'cedula' => $usuario['cedula'],
                                'nombre' => $usuario['nombre'],
                                'correo' => $usuario['correo'],
                                'rol' => $usuario['id_rol']
                            ]
                        ];
                    }else{
                        $array = [
                            'error' => 'datos incorrectos , intente de nuevo',
                            'status' => 'error'
                        ];
                    }
                }
                else {
                    $array = [
                        'error' => 'usuario no existe , intente de nuevo',
                        'status' => 'error'
                    ];
                }
            }
        }
        else{
            $array = [
                'error' => 'Error en contraseña, intente de nuevo',
                'status' => 'error'
            ];
        }
    }else{
        $array = [
            'error' => 'Error en cedula, intente de nuevo',
            'status' => 'error'
        ];
    }

    
    Flight::json($array);
});

Flight::start();
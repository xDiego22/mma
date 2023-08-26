<?php 
    /* parametros para generar las llaves*/
    $parametros = array(
        "config" => "C:/xampp/php/extras/openssl/openssl.cnf",
        "private_key_bits" => 2048,
        "default_md" => "sha256",
    );
    /*generacion de llaves con los parametros establecidos*/
    $generar = openssl_pkey_new($parametros);

    //exportacion de la llave privada
    openssl_pkey_export($generar,$privateKey,NULL,$parametros);

    //exportacion de la llave publica
    $publicKey = openssl_pkey_get_details($generar);

    //guardado del archivo que contiene las llaves
    file_put_contents('keys/private.key',$privateKey);
    file_put_contents('keys/public.key',$publicKey['key']);
?>
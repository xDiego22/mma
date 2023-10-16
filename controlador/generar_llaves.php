<?php 
    //comprobar si ya las llaves han sido creadas anteriormente
    if (is_file('keys/private.key') && is_file('keys/public.key')){
        echo "las llaves ya existen";
        exit();
    }
    /* parametros de configuracion para generar las llaves*/
    $parametros = array(
        "config" => "C:/xampp/php/extras/openssl/openssl.cnf",
        "private_key_bits" => 2048,
        "default_md" => "sha256",
    );
     /* generacion de llaves con los parametros establecidos */
    $llaves_generadas = openssl_pkey_new($parametros);

    /* exportacion de la llave privada */
    openssl_pkey_export($llaves_generadas, $privateKey, NULL, $parametros);
    
    /* exportacion de la llave publica */
    $publicKey = openssl_pkey_get_details($llaves_generadas);

    file_put_contents('keys/private.key',$privateKey);
    file_put_contents('keys/public.key',$publicKey['key']);

    echo "llaves generadas";
?>
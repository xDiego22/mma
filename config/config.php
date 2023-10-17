<?php
	try{
        //inicializacion de instancia env
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();

        define('DB_HOST',$_ENV['DB_HOST']);
        define('DB_NAME',$_ENV['DB_NAME']);
        define('DB_USER',$_ENV['DB_USER']);
        define('DB_PASSWORD',$_ENV['DB_PASSWORD']);
        define('PATH_PUBLIC_KEY',$_ENV['PATH_PUBLIC_KEY']);
        define('PATH_PRIVATE_KEY',$_ENV['PATH_PRIVATE_KEY']);}
    catch (\Throwable $th) {
        die('Error: no existe .env');
    }
?>
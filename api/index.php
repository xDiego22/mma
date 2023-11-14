<?php

require('../vendor/autoload.php');
//inicializacion de instancia env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use modelo\inicio_sesion;
use modelo\gestionar_atleta;
use modelo\gestionar_eventos;
use modelo\resultados_eventos;

$auth = new inicio_sesion();
$atletas = new gestionar_atleta();
$eventos = new gestionar_eventos();
$resultados = new resultados_eventos();

Flight::route('POST /auth', array($auth, 'authentication'));

Flight::route('GET /atletas', array($atletas, 'atletasApp'));

Flight::route('GET /eventos', array($eventos, 'eventosApp'));

Flight::route('GET /resultados',array($resultados, 'resultadosApp'));

Flight::start();
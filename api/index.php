<?php

require('../vendor/autoload.php');
//inicializacion de instancia env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use modelo\inicio_sesion;
use modelo\gestionar_atleta;
use modelo\gestionar_eventos;
use modelo\resultados_eventos;
use modelo\historial_atleta;

$auth = new inicio_sesion();
$atletas = new gestionar_atleta();
$eventos = new gestionar_eventos();
$resultados = new resultados_eventos();
$historial = new historial_atleta();

Flight::route('POST /auth', array($auth, 'authentication'));

Flight::route('GET /atletas', array($atletas, 'atletasApp'));

Flight::route('GET /eventos', array($eventos, 'eventosApp'));

Flight::route('GET /resultados',array($resultados, 'resultadosApp'));

Flight::route('GET /historial',array($historial, 'consultaApp'));

Flight::route('GET /historial-atleta/@atleta:[0-9]{1,9}',array($historial, 'mostrarApp'));

Flight::start();
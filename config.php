<?php

    // Configuraciones generales
    define('DS', DIRECTORY_SEPARATOR);
    define('IS_LOCAL', in_array($_SERVER["SERVER_ADDR"], array("::1", "127.0.0.1")));
    define('URL', IS_LOCAL ? '/grupotecnimotors/' : 'https://grupotecnimotors.com/');
    define('ASSETS', URL . 'assets/');
    define('CSS', ASSETS.'css/');
    define('JS', ASSETS.'js/');
    define('IMG', ASSETS.'img/');
    define('PLUGINS', ASSETS.'plugins/');

    // Configuracion de la base de datos
    define('DB_NAME', 'admintec_db');
    define('DB_HOST', 'localhost');
    define('DB_USER', 'admintec_root');
    define('DB_PASSWORD', 'O#U4Tp25e{{O');
    define('DB_DSN', 'mysql:host='.DB_HOST.';dbname='.DB_NAME);
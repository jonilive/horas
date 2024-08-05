<?php

// CONFIGURATION
error_reporting(E_ALL);
ini_set('display_errors', 1);
define('APP_NAME', 'HORAS');
define('APP_LOGIN', 'admin');
define('APP_PASSWORD', 'admin');
define('DB_HOST', 'localhost');
define('DB_USER', '');
define('DB_PASS', '');
define('DB_NAME', '');

// APPLICATION
require_once('application/_sql.php');

session_start();

if (!isset($_SESSION['login']) or $_SESSION['login'] != APP_LOGIN)
    return require_once('application/_login.php');

if (!isset($_SESSION['password']) or $_SESSION['password'] != APP_PASSWORD)
    return require_once('application/_login.php');

$action = isset($_GET['action']) ? $_GET['action'] : 'tarefas';
switch ($action) {
    case 'tarefas':
        require_once('application/_tarefas.php');
        break;
    case 'novatarefa':
        require_once('application/_novatarefa.php');
        break;
    case 'apagartarefa':
        require_once('application/_apagartarefa.php');
        break;
    case 'operarios':
        require_once('application/_operarios.php');
        break;
    case 'novooperario':
        require_once('application/_novooperario.php');
        break;
    case 'apagaroperario':
        require_once('application/_apagaroperario.php');
        break;
    case 'calcular':
        require_once('application/_calcular.php');
        break;
    case 'sair':
        session_destroy();
        header('Location: ./');
        break;
    default:
        require_once('application/_404.php');
}

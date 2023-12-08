<?php
ini_set('display_errors', 1);
require_once 'pdoconfig.php';
require_once 'controllers/UserController.php';
include 'header.php';

$controller = new UserController($dsn, $username, $password);

// Determine action
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $controller->read();
        break;
    case 'create_user':
        $controller->create();
        break;
    case 'login':
        $controller->login();
        break;
    case 'connected':
        $controller->displayUSerConnected();
        break;

    default:
        // Handle other actions or errors
        break;
}
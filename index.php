<?php
ini_set('display_errors', 1);
require_once 'controllers/UserController.php';
$controller = new UserController();

// Determine action
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $controller->read();
        break;
    case 'create':
        $controller->create();
        break;
   
    default:
        // Handle other actions or errors
        break;
}
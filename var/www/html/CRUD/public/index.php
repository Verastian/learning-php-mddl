<?php

// Carga del archivo de configuración y otros archivos necesarios
require_once('../config/database.config.php');
require_once('../src/models/User.model.php');
require_once('../src/repositories/User.repository.php');
require_once('../src/services/User.service.php');
require_once('../src/controllers/User.controller.php');
require_once('../src/routes/User.routes.php');
require_once('../src/utils/controls.php');

// Establecer una conexión a la base de datos
$mssql = MSSQLConnect();

// Crear una instancia de la clase de controlador de usuario
$userRepository = new UserRepository($mssql);
$userService = new UserService($userRepository);
$userController = new UserController($userService);

// Manejar la solicitud según la ruta
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'index';
}

// Manejar la solicitud basada en la ruta
// $route = $_GET['route'] ?? '';
$route = $_GET['route'] ?? 'user-list';

if (array_key_exists($route, $routes)) {
    list($controllerName, $method) = explode('@', $routes[$route]);
    $controller = new $controllerName($userService);
    $params = $_POST + $_GET;
    unset($params['route']);
    call_user_func_array([$controller, $method], $params);
} else {
    // rutas no definidas o mostrar una página de error 404
}
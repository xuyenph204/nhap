<?php
$controller = $_GET['controller'] ?? 'news';
$action = $_GET['action'] ?? 'index';

$controller = ucfirst($controller) . 'Controller';

require_once "controllers/$controller.php";
$controllerInstance = new $controller();
$id = $_GET['id'] ?? null;

if ($id) {
    $controllerInstance->$action($id);
} else {
    $controllerInstance->$action();
}
?>
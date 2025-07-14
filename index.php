<?php
require_once './controller/ClienteController.php';
require_once './controller/ProyectoController.php';
require_once './controller/UsuarioController.php';
$accion = isset($_GET['accion']) ? $_GET['accion'] : 'cargarcliente';


switch ($accion) {
    case 'cargarcliente':
        $controller = new ClienteController();
        $controller->mostrar();
        break;
    case 'guardarcliente':
        $controller = new ClienteController();
        $controller->guardar();
        break;
    case 'eliminarcliente':
        $controller = new ClienteController();
        $controller->eliminar();
        break;
    case 'cargarproyecto':
        $controller = new ProyectoController();
        $controller->mostrar();
        break;
    case 'guardarproyecto':
        $controller = new ProyectoController();
        $controller->guardar();
        break;
    case 'eliminarproyecto':
        $controller = new ProyectoController();
        $controller->eliminar();
        break;
    case 'login':
        $controller = new UsuarioController();
        $controller->login();
        break;
    case 'logout':
        $controller = new UsuarioController();
        $controller->logout();
        break;
    case 'asignarproyecto':
        $controller = new ProyectoController();
        $controller->asignar();
        break;
    case 'misproyectos':
        $controller = new ProyectoController();
        $controller->proyectosAsignados();
        break;
}

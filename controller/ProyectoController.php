<?php
require_once './model/ProyectoModel.php';
require_once './model/ClienteModel.php';
require_once './model/UsuarioModel.php';
require_once './model/Proyecto.php';
require_once './model/Usuario.php';

class ProyectoController
{
    public function mostrar()
    {
        $model = new ProyectoModel();
        $proyectos = $model->mostrar();
        require_once 'view/viewCargarProyecto.php';
    }

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = new ProyectoModel();
            $proyecto = new Proyecto();
            $proyecto->setNombreProyecto($_POST['txtnombre_proyecto']);
            $proyecto->setDescripcion($_POST['txtdescripcion']);
            $proyecto->setIdCliente($_POST['txtid_cliente']);
            $proyecto->setIdGerenteProyecto($_POST['txtid_gerente']);
            $proyecto->setEstado($_POST['txtestado']);
            $proyecto->setFechaInicio(date('Y-m-d H:i:s'));
            $proyecto->setFechaEstimada($_POST['txtfecha_estimada']);
            $proyecto->setFechaFin($_POST['txtfecha_fin']);
            $proyecto->setPresupuesto($_POST['txtpresupuesto']);

            $model->guardar($proyecto);
            header('location:index.php?accion=cargarproyecto');
        } else {
            session_start();

            $clienteModel = new ClienteModel();
            $id_usuario = $_SESSION['usuario']['id'];
            $clientes = $clienteModel->mostrarPorUsuario($id_usuario);

            $usuarioModel = new UsuarioModel();
            $usuarios = $usuarioModel->listar();

            require_once 'view/viewGuardarProyecto.php';
        }
    }

    public function eliminar()
    {
        if (isset($_GET['id_prj'])) {
            $model = new ProyectoModel();
            $model->eliminar($_GET['id_prj']);
            header('location: index.php?accion=cargarproyecto');
        }
    }
    public function asignar()
    {
        $proyectoModel = new ProyectoModel();
        $usuarioModel = new UsuarioModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idProyecto = $_POST['id_proyecto'];
            $idUsuario = $_POST['id_usuario'];

            $proyectoModel->asignarGerente($idProyecto, $idUsuario);
            header('Location: index.php?accion=cargarproyecto');
            exit();
        } else {
            $proyectos = $proyectoModel->mostrar();
            $usuarios = $usuarioModel->listarSoloGerentes(); // Solo rol 'gerente_proyecto'
            require 'view/viewAsignarProyecto.php';
        }
    }
    public function proyectosAsignados()
    {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?accion=login");
            exit();
        }

        $id_usuario = $_SESSION['usuario']['id'];
        $model = new ProyectoModel();
        $proyectos = $model->listarPorUsuario($id_usuario);

        require_once 'view/viewProyectosAsignados.php';
    }
    public function misProyectos() {
    session_start();

    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php?accion=login");
        exit();
    }

    $id_usuario = $_SESSION['usuario']['id'];

    require_once './model/ProyectoModel.php'; // Asegúrate de que esté presente
    $model = new ProyectoModel();
    $proyectos = $model->listarPorGerente($id_usuario); // esta línea llena $proyectos

    require 'view/viewMisProyectos.php'; // esta vista debe recibir $proyectos
}

}

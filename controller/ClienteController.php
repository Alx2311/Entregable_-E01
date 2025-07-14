<?php
    require_once './model/ClienteModel.php';
    class ClienteController{
        public function mostrar(){
            session_start();
            if (!isset($_SESSION['usuario']) || !is_array($_SESSION['usuario'])) {
            header('Location: index.php?accion=login');
            exit();
            }
            $model = new ClienteModel();
            $cliente = $model->mostrarPorUsuario($_SESSION['usuario']['id']);
            require_once 'view/viewCargarCliente.php';
        }

        public function guardar(){
            session_start();
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $model=new ClienteModel();
                $cliente=new Cliente();
                $cliente->setNombreEmpresa($_POST['txtnombre_empresa']);
                $cliente->setContacto($_POST['txtcontacto']);
                $cliente->setEmail($_POST['txtemail']);
                $cliente->setTelefono($_POST['txttelefono']);
                $cliente->setDireccion($_POST['txtdireccion']);
                $cliente->setFchRegistro(date('Y-m-d H:i:s'));

                $cliente->setIdUsuario($_SESSION['usuario']['id']);

                $model->guardar($cliente);
                header('location:index.php');
              }
              else{
                require_once 'view/viewGuardarCliente.php';
              }
        }

        public function eliminar(){
            if (isset($_GET['idcl'])){
                $model=new ClienteModel();
                $model->eliminar($_GET['idcl']);
                header('location: index.php');
            }
        }

    }
?>
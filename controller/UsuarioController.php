<?php
require_once './model/UsuarioModel.php';

class UsuarioController {
  public function login() {
    if (session_status() === PHP_SESSION_NONE) {
    session_start();}
    $error_message = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = $_POST['email'];
      $clave = $_POST['password'];

      $model = new UsuarioModel();
      $usuario = $model->validar($email, $clave);
      echo "<pre>";
      var_dump($usuario);
      echo "</pre>";

      if ($usuario) {
        $_SESSION['usuario'] = [
        'id' => $usuario->getId(),
        'nombre' => $usuario->getNombre(),
        'apellido' => $usuario->getApellido(),
        'email' => $usuario->getEmail(),
        'rol' => $usuario->getRol()
        ];
        header("Location: index.php?accion=cargarcliente");
        exit();
        } 
      else {
        $error_message = 'Email o contraseña incorrectos';
      }
    }

    require 'view/viewLogin.php';
  }

  public function logout() {
    session_start();
    session_destroy();
    header("Location: index.php?accion=login");
  }
}
?>
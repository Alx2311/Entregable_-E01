<?php
require_once './model/Usuario.php';
require_once './config/DB.php';

class UsuarioModel
{
    private $db;

    public function __construct()
    {
        $this->db = DB::conectar();
    }

    public function validar($email, $clave)
    {
        $sql = "SELECT u.id, u.nombre, u.apellido, u.email, u.rol, c.password_hash 
                FROM usuarios u 
                JOIN credenciales c ON u.id = c.id_usuario 
                WHERE u.email = :email AND c.estado = 'activo'";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila && $fila['password_hash'] === $clave) {
            $usuario = new Usuario();
            $usuario->setId($fila['id']);
            $usuario->setNombre($fila['nombre']);
            $usuario->setApellido($fila['apellido']);
            $usuario->setEmail($fila['email']);
            $usuario->setRol($fila['rol']);
            return $usuario;
        }

        return false;
    }
    public function listar()
    {
        $sql = "SELECT id, nombre, apellido, email, rol FROM usuarios";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $filas = $stmt->fetchAll();

        $usuarios = [];
        foreach ($filas as $f) {
            $u = new Usuario();
            $u->setId($f['id']);
            $u->setNombre($f['nombre']);
            $u->setApellido($f['apellido']);
            $u->setEmail($f['email']);
            $u->setRol($f['rol']);
            $usuarios[] = $u;
        }

        return $usuarios;
    }
    public function listarSoloGerentes()
    {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

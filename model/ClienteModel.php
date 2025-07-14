<?php
require_once './config/DB.php';
require_once './model/Cliente.php';

class ClienteModel
{
    private $db;

    public function __construct()
    {
        $this->db = DB::conectar();
    }

    public function guardar(Cliente $cliente)
    {
        $sql = "INSERT INTO clientes (nombre_empresa, contacto_principal, email_contacto, telefono_contacto, direccion, fecha_registro, id_usuario) VALUES (:nom,:cont,:eml,:tlf,:drc,:fch,:id_usuario)";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":nom", $cliente->getNombreEmpresa());
        $ps->bindParam(":cont", $cliente->getContacto());
        $ps->bindParam(":eml", $cliente->getEmail());
        $ps->bindParam(":tlf", $cliente->getTelefono());
        $ps->bindParam(":drc", $cliente->getDireccion());
        $ps->bindParam(":fch", $cliente->getFchRegistro());
        $ps->bindValue(':id_usuario', $cliente->getIdUsuario());
        $ps->execute();
    }

    public function mostrarPorUsuario($id_usuario)
    {
        $sql = "SELECT * FROM clientes WHERE id_usuario = :id_usuario";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':id_usuario', $id_usuario);
        $ps->execute();
        $clientes = [];
        foreach ($ps->fetchAll() as $fl) {
            $cl = new Cliente();
            $cl->setId($fl['id']);
            $cl->setNombreEmpresa($fl['nombre_empresa']);
            $cl->setContacto($fl['contacto_principal']);
            $cl->setEmail($fl['email_contacto']);
            $cl->setTelefono($fl['telefono_contacto']);
            $cl->setDireccion($fl['direccion']);
            $cl->setFchRegistro($fl['fecha_registro']);
            $cl->setIdUsuario($fl['id_usuario']);
            $clientes[] = $cl;
        }
        return $clientes;
    }



    public function eliminar($id)
    {
        $sql = "DELETE FROM clientes WHERE id=:idcl";
        $ps = $this->db->prepare(($sql));
        $ps->bindParam('idcl', $id);
        $ps->execute();
    }
    public function asignarGerente($idProyecto, $idGerente)
    {
        $sql = "UPDATE proyectos SET id_gerente_proyecto = :id_gerente WHERE id = :id_proyecto";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':id_gerente', $idGerente, PDO::PARAM_INT);
        $ps->bindParam(':id_proyecto', $idProyecto, PDO::PARAM_INT);
        $ps->execute();
    }
}

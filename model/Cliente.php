<?php
class Cliente {
    private $id;
    private $nombre_empresa;
    private $contacto;
    private $email;
    private $telefono;
    private $direccion;
    private $fch_registro;
    private $id_usuario;


    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getNombreEmpresa() {
        return $this->nombre_empresa;
    }
    public function setNombreEmpresa($nombre_empresa) {
        $this->nombre_empresa = $nombre_empresa;
    }
    public function getContacto() {
        return $this->contacto;
    }
    public function setContacto($contacto) {
        $this->contacto = $contacto;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getTelefono() {
        return $this->telefono;
    }
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function getFchRegistro() {
        return $this->fch_registro;
    }
    public function setFchRegistro($fch_registro) {
        $this->fch_registro = $fch_registro;
    }
    public function getIdUsuario() {
    return $this->id_usuario;
    }
    public function setIdUsuario($id_usuario) {
    $this->id_usuario = $id_usuario;
    }
}
?>
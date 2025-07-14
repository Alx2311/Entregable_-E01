<?php
class Proyecto
{
    private $id;
    private $nombre_proyecto;
    private $descripcion;
    private $id_cliente;
    private $id_gerente_poyecto;
    private $estado;
    private $fecha_inicio;
    private $fecha_estimada;
    private $fecha_fin;
    private $presupuesto;
    private $nombre_cliente;


    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNombreProyecto()
    {
        return $this->nombre_proyecto;
    }
    public function setNombreProyecto($nombre_proyecto)
    {
        $this->nombre_proyecto = $nombre_proyecto;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function getIdCliente()
    {
        return $this->id_cliente;
    }
    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }
    public function getIdGerenteProyecto()
    {
        return $this->id_gerente_poyecto;
    }
    public function setIdGerenteProyecto($id_gerente_poyecto)
    {
        $this->id_gerente_poyecto = $id_gerente_poyecto;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }
    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }
    public function getFechaEstimada()
    {
        return $this->fecha_estimada;
    }
    public function setFechaEstimada($fecha_estimada)
    {
        $this->fecha_estimada = $fecha_estimada;
    }
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }
    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }
    public function getPresupuesto()
    {
        return $this->presupuesto;
    }
    public function setPresupuesto($presupuesto)
    {
        $this->presupuesto = $presupuesto;
    }
    public function getNombreCliente()
    {
        return $this->nombre_cliente;
    }
    public function setNombreCliente($nombre_cliente)
    {
        $this->nombre_cliente = $nombre_cliente;
    }
}

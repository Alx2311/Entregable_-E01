<?php
require_once './config/DB.php';
require_once './model/Proyecto.php';

class ProyectoModel
{
    private $db;

    public function __construct()
    {
        $this->db = DB::conectar();
    }

    public function guardar(Proyecto $proyecto)
    {
        $sql = "INSERT INTO proyectos (nombre_proyecto, descripcion,id_cliente,id_gerente_proyecto,estado,fecha_inicio,fecha_fin_estimada,fecha_fin_real,presupuesto) VALUES (:nom,:des,:idcli,:idgert,:est,:fch_ini,:fch_stm,:fch_fin,:pres)";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":nom", $proyecto->getNombreProyecto());
        $ps->bindParam(":des", $proyecto->getDescripcion());
        $ps->bindParam(":idcli", $proyecto->getIdCliente());
        $ps->bindParam(":idgert", $proyecto->getIdGerenteProyecto());
        $ps->bindParam(":est", $proyecto->getEstado());
        $ps->bindParam(":fch_ini", $proyecto->getFechaInicio());
        $ps->bindParam(":fch_stm", $proyecto->getFechaEstimada());
        $ps->bindParam(":fch_fin", $proyecto->getFechaFin());
        $ps->bindParam(":pres", $proyecto->getPresupuesto());
        $ps->execute();
    }

    public function mostrar()
    {
        $sql = "SELECT 
                p.*, 
                c.nombre_empresa AS cliente_nombre,
                u.nombre || ' ' || u.apellido AS gerente_nombre
            FROM proyectos p
            JOIN clientes c ON p.id_cliente = c.id
            JOIN usuarios u ON p.id_gerente_proyecto = u.id";

        $ps = $this->db->prepare($sql);
        $ps->execute();
        $filas = $ps->fetchAll(PDO::FETCH_ASSOC);

        $Proyectos = array();
        foreach ($filas as $fl) {
            $prj = new Proyecto();
            $prj->setId($fl['id']);
            $prj->setNombreProyecto($fl['nombre_proyecto']);
            $prj->setDescripcion($fl['descripcion']);
            $prj->setIdCliente($fl['cliente_nombre']); // <--- aquí ya no va el ID
            $prj->setIdGerenteProyecto($fl['gerente_nombre']); // <--- sino el nombre completo
            $prj->setEstado($fl['estado']);
            $prj->setFechaInicio($fl['fecha_inicio']);
            $prj->setFechaEstimada($fl['fecha_fin_estimada']);
            $prj->setFechaFin($fl['fecha_fin_real']);
            $prj->setPresupuesto($fl['presupuesto']);
            array_push($Proyectos, $prj);
        }

        return $Proyectos;
    }


    public function eliminar($id)
    {
        $sql = "DELETE FROM proyectos WHERE id=:id_prj";
        $ps = $this->db->prepare($sql);
        $ps->bindParam('id_prj', $id);
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
    public function listarPorUsuario($id_usuario) {
    $sql = "SELECT * FROM proyectos WHERE id_gerente_proyecto = :id";
    $ps = $this->db->prepare($sql);
    $ps->bindParam(":id", $id_usuario, PDO::PARAM_INT);
    $ps->execute();
    $filas = $ps->fetchAll();
    
    $proyectos = [];
    foreach ($filas as $fl) {
        $prj = new Proyecto();
        $prj->setId($fl['id']);
        $prj->setNombreProyecto($fl['nombre_proyecto']);
        $prj->setDescripcion($fl['descripcion']);
        $prj->setIdCliente($fl['id_cliente']);
        $prj->setIdGerenteProyecto($fl['id_gerente_proyecto']);
        $prj->setEstado($fl['estado']);
        $prj->setFechaInicio($fl['fecha_inicio']);
        $prj->setFechaEstimada($fl['fecha_fin_estimada']);
        $prj->setFechaFin($fl['fecha_fin_real']);
        $prj->setPresupuesto($fl['presupuesto']);
        $proyectos[] = $prj;
    }

    return $proyectos;
}
public function listarPorGerente($id_gerente) {
    $sql = "SELECT p.*, c.nombre_empresa 
            FROM proyectos p 
            JOIN clientes c ON p.id_cliente = c.id 
            WHERE p.id_gerente_proyecto = :id";

    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id_gerente);
    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $proyectos = [];
    foreach ($resultados as $row) {
        $proyecto = new Proyecto();
        $proyecto->setId($row['id']);
        $proyecto->setNombreProyecto($row['nombre_proyecto']);
        $proyecto->setDescripcion($row['descripcion']);
        $proyecto->setIdCliente($row['id_cliente']);
        $proyecto->setIdGerenteProyecto($row['id_gerente_proyecto']);
        $proyecto->setEstado($row['estado']);
        $proyecto->setFechaInicio($row['fecha_inicio']);
        $proyecto->setFechaEstimada($row['fecha_fin_estimada']);
        $proyecto->setFechaFin($row['fecha_fin_real']);
        $proyecto->setPresupuesto($row['presupuesto']);
        $proyecto->setNombreCliente($row['nombre_empresa']);

        $proyectos[] = $proyecto;
    }

    return $proyectos;
}


}

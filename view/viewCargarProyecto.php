<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos Registrados</title>
</head>
<body>
    <div>
        <?php
            include 'Menu.php';
        ?>
        <h1>PROYECTOS REGISTRADOS</h1>
        <hr>
        <a href="index.php?accion=guardarproyecto">Registrar proyecto nuevo</a>
        <table border="1">  
            <thead>
                <th>ID</th>
                <th>Nombre del Proyecto</th>
                <th>Descripción</th>
                <th>ID Cliente</th>
                <th>ID Gerente de Proyecto</th>
                <th>Estado</th>
                <th>Fecha de Inicio</th>
                <th>Fecha Estimada de Fin</th>
                <th>Fecha Real de Fin</th>
                <th>Presupuesto</th>
                <th>Eliminar</th>
            </thead>
            <tbody>
                <?php 
                    foreach($proyectos as $prj){
                ?>
                <tr>
                    <td><?=$prj->getId()?></td>
                    <td><?=$prj->getNombreProyecto()?></td>
                    <td><?=$prj->getDescripcion()?></td>
                    <td><?=$prj->getIdCliente()?></td>
                    <td><?=$prj->getIdGerenteProyecto()?></td>
                    <td><?=$prj->getEstado()?></td>
                    <td><?=$prj->getFechaInicio()?></td>
                    <td><?=$prj->getFechaEstimada()?></td>
                    <td><?=$prj->getFechaFin()?></td>
                    <td><?=$prj->getPresupuesto()?></td>
                    <td><a href="index.php?accion=eliminarproyecto&id_prj=<?=$prj->getId()?>">Eliminar</a></td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>
    </div>
</body>
</html>
<?php
?>

<h2>Mis Proyectos Asignados</h2>
<a href="index.php">Volver al inicio</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Proyecto</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Fecha Inicio</th>
            <th>Fecha Estimada Fin</th>
            <th>Presupuesto</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($proyectos)) : ?>
            <?php foreach ($proyectos as $p): ?>
                <tr>
                    <td><?= $p->getId() ?></td>
                    <td><?= $p->getNombreProyecto() ?></td>
                    <td><?= $p->getDescripcion() ?></td>
                    <td><?= $p->getEstado() ?></td>
                    <td><?= $p->getFechaInicio() ?></td>
                    <td><?= $p->getFechaEstimada() ?></td>
                    <td>S/ <?= number_format($p->getPresupuesto(), 2) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7">No tienes proyectos asignados.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRAR NUEVO PROYECTO</title>
</head>

<body>
    <div>
        <h1>Registrar un nuevo proyecto</h1>
        <hr>
        <form action="index.php?accion=guardarproyecto" method="post">
            <input type="text" name="txtnombre_proyecto" placeholder="Nombre del Proyecto" required>
            <input type="text" name="txtdescripcion" placeholder="Descripción del Proyecto" required>
            
            <label>Cliente:</label>
            <select name="txtid_cliente" required>
                <option value="">-- Selecciona un cliente --</option>
                <?php foreach ($clientes as $cli): ?>
                    <option value="<?= $cli->getId() ?>"><?= $cli->getNombreEmpresa() ?></option>
                <?php endforeach; ?>
            </select>

            <label>Asignar a usuario:</label>
            <select name="txtid_gerente" required>
                <option value="">-- Selecciona un usuario --</option>
                <?php foreach ($usuarios as $usr): ?>
                    <option value="<?= $usr['id'] ?>">
                        <?= $usr['nombre'] . ' ' . $usr['apellido'] . ' (' . $usr['rol'] . ')' ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="text" name="txtestado" placeholder="Estado del Proyecto" required>
            <input type="date" name="txtfecha_estimada" placeholder="Fecha Estimada de Fin" required>
            <input type="date" name="txtfecha_fin" placeholder="Fecha Real de Fin">
            <input type="number" name="txtpresupuesto" placeholder="Presupuesto del Proyecto">
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>

</html>

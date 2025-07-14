<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Asignar Proyecto a Gerente</title>
</head>
<body>
  <h2>Asignar Proyecto a Usuario</h2>
  <form action="index.php?accion=asignarproyecto" method="POST">
    <label for="proyecto">Proyecto:</label>
    <select name="id_proyecto" required>
      <?php foreach ($proyectos as $proyecto): ?>
        <option value="<?= $proyecto->getId() ?>">
          <?= $proyecto->getNombreProyecto() ?>
        </option>
      <?php endforeach; ?>
    </select>

    <label for="usuario">Usuario (Gerente):</label>
    <select name="id_usuario" required>
      <?php foreach ($usuarios as $usuario): ?>
        <option value="<?= $usuario['id'] ?>">
          <?= $usuario['nombre'] . ' ' . $usuario['apellido'] ?>
        </option>
      <?php endforeach; ?>
    </select>

    <input type="submit" value="Asignar">
  </form>
</body>
</html>

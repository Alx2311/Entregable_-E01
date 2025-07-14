<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clientes Registrados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <?php
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (!isset($_SESSION['usuario'])) {
      header("Location: index.php?accion=login");
      exit();
    }

    include 'Menu.php';
  ?>

  <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="text-primary">Clientes Registrados</h2>
      <a href="index.php?accion=guardarcliente" class="btn btn-success">Registrar cliente nuevo</a>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-hover table-sm align-middle">
        <thead class="table-dark text-center">
          <tr>
            <th>ID</th>
            <th>Empresa</th>
            <th>Contacto</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Fecha Registro</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($cliente as $cnl): ?>
            <tr>
              <td><?= $cnl->getId() ?></td>
              <td><?= $cnl->getNombreEmpresa() ?></td>
              <td><?= $cnl->getContacto() ?></td>
              <td><?= $cnl->getEmail() ?></td>
              <td><?= $cnl->getTelefono() ?></td>
              <td><?= $cnl->getDireccion() ?></td>
              <td><?= $cnl->getFchRegistro() ?></td>
              <td class="text-center">
                <a href="index.php?accion=eliminarcliente&idcl=<?= $cnl->getId() ?>" class="btn btn-sm btn-danger">Eliminar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>

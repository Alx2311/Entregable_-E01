<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

  <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
    <h4 class="text-center mb-4">Iniciar sesión</h4>

    <form method="POST" action="index.php?accion=login">
      <div class="mb-3">
        <label class="form-label">Email:</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Contraseña:</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Ingresar</button>
      </div>

      <?php if (!empty($error_message)) : ?>
        <div class="alert alert-danger mt-3" role="alert">
          <?= $error_message ?>
        </div>
      <?php endif; ?>
    </form>
  </div>

</body>
</html>

<nav>
    <ul>
        <a href="index.php?accion=cargarproyecto">
            <li>PROYECTOS</li>
        </a>
        <a href="index.php?accion=cargarcliente">
            <li>CLIENTES</li>
        </a>
        <a href="index.php?accion=logout">
            <li style="color:red;">CERRAR SESIÓN</li>
        </a>
        <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] === 'administrador'): ?>
            <a href="index.php?accion=asignarproyecto">
                <li>ASIGNAR PROYECTO</li>
            </a>
        <?php endif; ?>
        <?php if (isset($_SESSION['usuario'])): ?>
            <a href="index.php?accion=misproyectos">
                <li>MIS PROYECTOS</li>
            </a>
        <?php endif; ?>

    </ul>
</nav>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Registrar un nuevo cliente</h1>
        <hr>
        <form action="index.php?accion=guardarcliente" method="post">
            <input type="text" name="txtnombre_empresa" placeHolder="Nombres de la empresa">
            <input type="text" name="txtcontacto" placeHolder="nombres del propietario">
            <input type="text" name="txtemail" placeHolder="Email">
            <input type="text" name="txttelefono" placeHolder="Telefono">
            <input type="text" name="txtdireccion" placeHolder="Direccion">
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>
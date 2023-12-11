<?php
include_once("../conexion.php");
$conexionInstance = new CConexion();
$connect = $conexionInstance->ConexionBD();

// Verificar si se proporciona un ID en la URL
if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];

    // Consultar la base de datos para obtener los datos del usuario con el ID proporcionado
    $sql = "SELECT * FROM public.usuario WHERE numidentidad = :idUsuario";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_OBJ);
} else {
    // Si no se proporciona un ID, redirigir o manejar el error según tus necesidades
    header("Location: lista.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="../src/css/crearu.css">
</head>

<body>
    <h1>Modificar Usuario</h1>
    <form action="logica_modificar_usuario.php" method="post">
        <!-- Aquí debes incluir todos los campos del formulario -->
        <label for="tipo-documento">Tipo de Documento</label>
        <input type="text" name="tipo-documento" value="<?php echo $usuario->fk_tipodocumento; ?>" required>

        <label for="num-identidad">Num. Identidad</label>
        <input type="text" name="num-identidad" value="<?php echo $usuario->numidentidad; ?>" required>

        <label for="primer-nombre">Primer Nombre</label>
        <input type="text" name="primer-nombre" value="<?php echo $usuario->primernombre; ?>" required>

        <label for="segundo-nombre">Segundo Nombre</label>
        <input type="text" name="segundo-nombre" value="<?php echo $usuario->segundonombre; ?>">

        <label for="primer-apellido">Primer Apellido</label>
        <input type="text" name="primer-apellido" value="<?php echo $usuario->primerapellido; ?>" required>

        <label for="segundo-apellido">Segundo Apellido</label>
        <input type="text" name="segundo-apellido" value="<?php echo $usuario->segundoapellido; ?>">

        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" value="<?php echo $usuario->direccion; ?>">

        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena" value="<?php echo $usuario->contraseña; ?>" required>

        <label for="fecha-registro">Fecha Registro</label>
        <input type="text" name="fecha-registro" value="<?php echo $usuario->fecharegistro; ?>" disabled>

        <label for="rol">Rol</label>
        <input type="text" name="rol" value="<?php echo $usuario->fk_rol; ?>" required>

        <!-- Continúa con los demás campos -->

        <input type="hidden" name="id-usuario" value="<?php echo $usuario->numidentidad; ?>">
        <button type="submit">Guardar cambios</button>
    </form>
</body>

</html>
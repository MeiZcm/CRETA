<?php
session_start();

include_once("../conexion.php");
$conexionInstance = new CConexion();
$conn = $conexionInstance->ConexionBD();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $tipoUsuario = $_POST["tipo-usuario"];
    $numIdentidad = $_POST["numidentidad"];
    $contrasena = $_POST["contraseña"];

    // Realizar la consulta SQL para obtener el usuario
    $consulta = "SELECT * FROM public.login WHERE rol = :tipoUsuario AND numidentidad = :numidentidad AND contraseña = :contrasena";

    // Preparar la consulta
    $stmt = $conn->prepare($consulta);

    // Bind de los parámetros
    $stmt->bindParam(":tipoUsuario", $tipoUsuario, PDO::PARAM_STR);
    $stmt->bindParam(":numidentidad", $numIdentidad, PDO::PARAM_STR);
    $stmt->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si el usuario existe
    if ($usuario) {
        // Iniciar sesión
        session_start();
        $_SESSION['tipo-usuario'] = $tipoUsuario;
        $_SESSION['identidad'] = $numIdentidad;
        $_SESSION['rol_id'] = $usuario['rol_id'];

        // Redirigimos al usuario a la página principal
        header("Location: ../pagina2.php");
    } else {
        // El usuario no existe
        // Almacena el mensaje de error en una variable de sesión
        $_SESSION['error_message'] = 'Nombre de usuario y/o contraseña incorrectos';

        // Redirigir de nuevo a index.php
        header("Location: ../index.php");
    }

}
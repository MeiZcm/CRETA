<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario de inicio de sesión</title>
    <link rel="stylesheet" href="src/css/login.css">
</head>

<body>
    <header>
        <h1>Comienza tu aventura con nosotros</h1>
    </header>
    <main>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="tipo-usuario">Tipo de usuario</label>
                <select name="tipo-usuario" id="tipo-usuario">
                    <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                    <option value="DOCENTE">DOCENTE</option>
                    <option value="ALUMNO">ALUMNO</option>
                </select>
            </div>
            <div class="form-group">
                <label for="numidentidad">Numero de identidad</label>
                <input type="text" name="numidentidad" id="numidentidad" required>
            </div>

            <div class="form-group">
                <label for="contraseña">Contraseña</label>
                <input type="password" name="contraseña" id="contraseña" required>
            </div>
            <button type="submit">Acceder</button>
        </form>
    </main>
    <footer>
        <a href="#">Administras un colegio?</a>
        <a href="#">Afíliate</a>
    </footer>

    <?php
include_once("conexion.php");
$conexionInstance = new CConexion();
$conn = $conexionInstance->ConexionBD();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $tipoUsuario = $_POST["tipo-usuario"];
    $numIdentidad = $_POST["numidentidad"];
    $contrasena = $_POST["contraseña"];

    // Llamar al script Python para validar el tamaño
    $output = shell_exec("python3 src/py/validaciones.py $numIdentidad 8 20");
    if (!empty($output)) {
        echo $output;
        // Puedes redirigir o manejar el error de alguna manera apropiada
    } else {
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
            header("Location: pagina2.php");
        } else {
            // El usuario no existe
            echo "Usuario no válido";
        }
    }
}
?>


</body>

</html>
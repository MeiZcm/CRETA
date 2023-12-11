<?php
include_once("../conexion.php");
$conexionInstance = new CConexion();
$conn= $conexionInstance->ConexionBD();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $tipoDocumento = $_POST["tipo-documento"];
    $numIdentidad = $_POST["num-identidad"];
    $primerNombre = $_POST["primer-nombre"];
    $segundoNombre = $_POST["segundo-nombre"];
    $primerApellido = $_POST["primer-apellido"];
    $segundoApellido = $_POST["segundo-apellido"];
    $direccion = $_POST["direccion"];
    $contrasena = $_POST["contrasena"];
    $rol = $_POST["rol"];

    // Insertar el nuevo usuario en la base de datos
    $sql = "INSERT INTO public.usuario (fk_tipodocumento, numidentidad, primernombre, segundonombre, primerapellido, segundoapellido, direccion, contraseña, fk_rol)
            VALUES (:tipoDocumento, :numIdentidad, :primerNombre, :segundoNombre, :primerApellido, :segundoApellido, :direccion, :contrasena, :rol)";
    
    // Verificar si la conexión es válida antes de preparar la consulta
    if ($conn) {
        $stmt = $conn->prepare($sql);

        // Bind de los parámetros
        $stmt->bindParam(":tipoDocumento", $tipoDocumento, PDO::PARAM_INT);
        $stmt->bindParam(":numIdentidad", $numIdentidad, PDO::PARAM_INT);
        $stmt->bindParam(":primerNombre", $primerNombre, PDO::PARAM_STR);
        $stmt->bindParam(":segundoNombre", $segundoNombre, PDO::PARAM_STR);
        $stmt->bindParam(":primerApellido", $primerApellido, PDO::PARAM_STR);
        $stmt->bindParam(":segundoApellido", $segundoApellido, PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
        $stmt->bindParam(":rol", $rol, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Redirigir a alguna página de éxito o mostrar un mensaje
        header("Location: crear.php");
    } else {
        echo "Error de conexión a la base de datos.";
    }
}
?>
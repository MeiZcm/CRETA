<?php
include_once("../conexion.php");
$conexionInstance = new CConexion();
$connect = $conexionInstance->ConexionBD();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
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
        $idUsuario = $_POST["id-usuario"];

        // Actualizar el usuario en la base de datos
        $sql = "UPDATE public.usuario
                SET fk_tipodocumento = :tipoDocumento,
                    primernombre = :primerNombre,
                    segundonombre = :segundoNombre,
                    primerapellido = :primerApellido,
                    segundoapellido = :segundoApellido,
                    direccion = :direccion,
                    contraseña = :contrasena,
                    fk_rol = :rol
                WHERE numidentidad = :idUsuario";

        // Verificar si la conexión es válida antes de preparar la consulta
        if ($connect) {
            $stmt = $connect->prepare($sql);

            // Bind de los parámetros
            $stmt->bindParam(":tipoDocumento", $tipoDocumento, PDO::PARAM_INT);
            $stmt->bindParam(":primerNombre", $primerNombre, PDO::PARAM_STR);
            $stmt->bindParam(":segundoNombre", $segundoNombre, PDO::PARAM_STR);
            $stmt->bindParam(":primerApellido", $primerApellido, PDO::PARAM_STR);
            $stmt->bindParam(":segundoApellido", $segundoApellido, PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
            $stmt->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
            $stmt->bindParam(":rol", $rol, PDO::PARAM_INT);
            $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);

            // Ejecutar la consulta
            $stmt->execute();

            // Redirigir a alguna página de éxito o mostrar un mensaje
            header("Location: lista.php");
            exit(); // Asegurar que no haya más salida después de la redirección
        } else {
            echo "Error de conexión a la base de datos.";
        }
    } catch (PDOException $e) {
        echo "Error en la ejecución de la consulta: " . $e->getMessage();
    }
}
?>
<?php
include_once("../conexion.php");
$conexionInstance = new CConexion();
$connect = $conexionInstance->ConexionBD();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Obtener el ID del usuario a eliminar desde la URL
    $idUsuario = $_GET["id"];

    // Verificar si la conexión es válida antes de preparar la consulta
    if ($connect) {
        try {
            // Preparar la consulta para eliminar el usuario
            $sql = "DELETE FROM public.usuario WHERE numidentidad = :idUsuario";
            $stmt = $connect->prepare($sql);

            // Bind de los parámetros
            $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);

            // Ejecutar la consulta
            $stmt->execute();

            // Redirigir a alguna página de éxito o mostrar un mensaje
            header("Location: lista.php");
        } catch (PDOException $e) {
            // Manejar cualquier excepción de la base de datos
            echo "Error al eliminar el usuario: " . $e->getMessage();
        }
    } else {
        echo "Error de conexión a la base de datos.";
    }
} else {
    echo "Parámetros no válidos para eliminar el usuario.";
}
?>
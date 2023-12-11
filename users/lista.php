<?php
include '../src/php/nav.php';

include_once("../conexion.php");
$conexionInstance = new CConexion();
$connect = $conexionInstance->ConexionBD();

$sqlUsuario = "SELECT
            U.numidentidad,
            U.primernombre,
            U.segundonombre,
            U.primerapellido,
            U.segundoapellido,
            U.direccion,
            U.contraseña,
            U.fecharegistro,
            R.rol,
            TD.tipodocumento
        FROM usuario U
        INNER JOIN rol R ON U.fk_rol = R.idrol
        INNER JOIN tipodocumento TD ON U.fk_tipodocumento = TD.idtipodocumento";

$queryUsuario = $connect->prepare($sqlUsuario);
$queryUsuario->execute();
$resultsUsuario = $queryUsuario->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
</head>

<body>
    <div id="container">
        <main>
            <a href="crear.php">Crear usuario</a>

            <?php
            if ($queryUsuario->rowCount() > 0) {
                echo '<table id="t-usuarios" class="display nowrap" style="width: 80%" border="1"> <thead>';
                echo '<th>Num. Identidad</th>';
                echo '<th>Primer Nombre</th>';
                echo '<th>Segundo Nombre</th>';
                echo '<th>Primer Apellido</th>';
                echo '<th>Segundo Apellido</th>';
                echo '<th>Dirección</th>';
                echo '<th>Fecha Registro</th>';
                echo '<th>Rol</th>';
                echo '<th>Tipo Documento</th>';
                echo '<th>Acciones</th>'; // Nueva columna para acciones
                echo '</thead><tbody>';

                foreach ($resultsUsuario as $resultUsuario) {
                    echo '<tr>
                            <td>' . $resultUsuario->numidentidad . '</td>
                            <td>' . $resultUsuario->primernombre . '</td>
                            <td>' . $resultUsuario->segundonombre . '</td>
                            <td>' . $resultUsuario->primerapellido . '</td>
                            <td>' . $resultUsuario->segundoapellido . '</td>
                            <td>' . $resultUsuario->direccion . '</td>
                            <td>' . $resultUsuario->fecharegistro . '</td>
                            <td>' . $resultUsuario->rol . '</td>
                            <td>' . $resultUsuario->tipodocumento . '</td>
                            <td>
                                <a href="modificar_usuario.php?id=' . $resultUsuario->numidentidad . '">Modificar</a> |
                                <a href="eliminar_usuario.php?id=' . $resultUsuario->numidentidad . '">Eliminar</a>
                            </td>
                        </tr>';
                }

echo '</tbody></table>';
            }
            ?>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js">
            </script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
            </script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js">
            </script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
            </script>
            <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js">
            </script>
            <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js">
            </script>
            <script>
            $(document).ready(function() {
                $('#t-usuarios').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
            </script>
        </main>
    </div>
</body>

</html>
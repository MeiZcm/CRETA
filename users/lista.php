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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js">
    </script>
</head>

<body>
    <div id="container">
        <main>
            <a href="crear.php">Crear usuario</a>

            <?php
            if ($queryUsuario->rowCount() > 0) {
                echo '<table id="t-usuarios" class="display nowrap" style="width: 80%" border="1"> <thead>';
                echo '<th data-searchable="true">Num. Identidad</th>';
                echo '<th data-searchable="true">Primer Nombre</th>';
                echo '<th data-searchable="true">Segundo Nombre</th>';
                echo '<th data-searchable="true">Primer Apellido</th>';
                echo '<th data-searchable="true">Segundo Apellido</th>';
                echo '<th data-searchable="true">Dirección</th>';
                echo '<th data-searchable="true">Fecha Registro</th>';
                echo '<th data-searchable="true">Rol</th>';
                echo '<th data-searchable="true">Tipo Documento</th>';
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
                var table = $('#t-usuarios').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    colReorder: true, // Habilita la extensión ColReorder
                    stateSave: true, // Guarda el estado actual de la tabla
                    stateDuration: -1, // Permite que el estado guardado sea permanente
                });
            });
            </script>
        </main>
    </div>
</body>

</html>
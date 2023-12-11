<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario de inicio de sesión</title>
    <link rel="stylesheet" href="src/css/login.css">
    <script src="src/js/validaciones.js" type="text/javascript"></script>
</head>

<body>

    <header>
        <h1>Iniciar Sesion</h1>
    </header>
    <main>
        <form action="users/validacion.php" method="post">
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
                <input type="text" name="numidentidad" id="numidentidad" required
                    oninput="validarNumeros('numidentidad')">
            </div>

            <div class="form-group">
                <label for="contraseña">Contraseña</label>
                <input type="password" name="contraseña" id="contraseña" required
                    oninput="validarTamano('contraseña', 2, 20)">
            </div>
            <button type="submit">Acceder</button>
        </form>
    </main>
    <footer>
        <a href="#">Administras un colegioo?</a>
        <a href="#">Afíliate</a>
    </footer>
</body>

</html>



<?php
session_start();

// Verificar si hay un mensaje de error
if (isset($_SESSION['error_message'])) {
    echo '<p class="error-message">' . $_SESSION['error_message'] . '</p>';

    // Limpiar el mensaje de error después de mostrarlo
    unset($_SESSION['error_message']);
}
?>
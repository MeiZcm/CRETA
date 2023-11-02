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
                    <option value="administrador">Administrador</option>
                    <option value="docente">Docente</option>
                    <option value="alumno">Alumno</option>
                    <option value="asistente">Asistente</option>
                </select>
            </div>
            <div class="form-group">
                <label for="correo">Correo electrónico</label>
                <input type="email" name="correo" id="correo" required>
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
</body>

</html>
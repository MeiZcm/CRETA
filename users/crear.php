<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="../src/css/crearu.css">

</head>

<body>
    <header>
        <h1>Crear Nuevo Usuario</h1>
    </header>
    <main>
        <form action="logicacrear.php" method="post">
            <div>
                <label for="tipo-documento">Tipo de Documento:</label>
                <select name="tipo-documento" id="tipo-documento" required>
                    <option value="1">Documento 1</option>
                    <option value="2">Documento 2</option>
                    <!-- Agrega las opciones correspondientes -->
                </select>
            </div>
            <div>
                <label for="num-identidad">Número de Identidad:</label>
                <input type="text" name="num-identidad" id="num-identidad" required>
            </div>
            <div>
                <label for="primer-nombre">Primer Nombre:</label>
                <input type="text" name="primer-nombre" id="primer-nombre" required>
            </div>
            <div>
                <label for="segundo-nombre">Segundo Nombre:</label>
                <input type="text" name="segundo-nombre" id="segundo-nombre">
            </div>
            <div>
                <label for="primer-apellido">Primer Apellido:</label>
                <input type="text" name="primer-apellido" id="primer-apellido" required>
            </div>
            <div>
                <label for="segundo-apellido">Segundo Apellido:</label>
                <input type="text" name="segundo-apellido" id="segundo-apellido">
            </div>
            <div>
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" id="direccion">
            </div>
            <div>
                <label for="contrasena">Contraseña:</label>
                <input type="password" name="contrasena" id="contrasena" required>
            </div>
            <div>
                <label for="rol">Rol:</label>
                <select name="rol" id="rol" required>
                    <option value="1">Rol 1</option>
                    <option value="2">Rol 2</option>
                    <!-- Agrega las opciones correspondientes -->
                </select>
            </div>
            <button type="submit">Crear Usuario</button>
        </form>
    </main>
</body>

</html>
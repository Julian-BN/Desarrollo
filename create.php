<?php
require_once 'conexion.php';
require_once 'validacionEntrada.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $genero_id = $_POST['genero_id'];
    $identificacion = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $fecha_nac = $_POST['fecha_nac'];
    $observaciones = $_POST['observaciones'];

    // Validar los datos
    if (validarEntrada($_POST)) {
        // Los datos son válidos, proceder con la inserción en la base de datos
        $sql = "INSERT INTO personas (genero_id, identificacion, nombre, email, fecha_nac, observaciones)
                VALUES ('$genero_id', '$identificacion', '$nombre', '$email', '$fecha_nac', '$observaciones')";

        if ($conexion->query($sql) === TRUE) {
            echo "La persona se ha insertado correctamente";
        } else {
            echo "Error al insertar la persona: " . $conexion->error;
        }
    } else {
        // Los datos no son válidos, mostrar mensaje de error
        echo "Los datos ingresados no son válidos";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Crear Persona</title>
</head>
<body>
    <center>
    <form action="create.php" method="POST">
        <label>Genero ID:</label>
        <input type="number" name="genero_id" required>
        <br>
        <label>Identificación:</label>
        <input type="text" name="identificacion" maxlength="10" required>
        <br>
        <label>Nombre:</label>
        <input type="text" name="nombre" maxlength="100" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" maxlength="100" required>
        <br>
        <label>Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nac" required>
        <label>Observaciones:</label>
        <textarea name="observaciones" rows="5" cols="45"></textarea>
        <br>
        <input type="submit" value="Crear">
    </form>
    </center>
</body>
</html>


<?php
// Código PHP para procesar la actualización de una persona
require_once 'conexion.php';
require_once 'validacionEntrada.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $genero_id = $_POST['genero_id'];
    $identificacion = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $fecha_nac = $_POST['fecha_nac'];
    $observaciones = $_POST['observaciones'];

    // Validar los datos
    if (validarEntrada($_POST)) {
        // Los datos son válidos, proceder con la actualización en la base de datos
        $sql = "UPDATE personas SET genero_id = '$genero_id', identificacion = '$identificacion',
                nombre = '$nombre', email = '$email', fecha_nac = '$fecha_nac', observaciones = '$observaciones'
                WHERE id = $id";

        if ($conexion->query($sql) === TRUE) {
            echo "La persona se ha actualizado correctamente";
        } else {
            echo "Error al actualizar la persona: " . $conexion->error;
        }
    } else {
        echo "Los datos ingresados no son válidos";
    }
  }
  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Persona</title>
</head>
<body>
<link rel="stylesheet" href="style.css">
    <h1>Actualizar Persona</h1>
    <div class="form-container">
        <form action="update.php" method="POST">
            <label>ID de la Persona:</label>
            <input type="number" name="id" required>
            <label>Genero ID:</label>
            <input type="number" name="genero_id" required>
            <label>Identificación:</label>
            <input type="text" name="identificacion" maxlength="10" required>
            <label>Nombre:</label>
            <input type="text" name="nombre" maxlength="100" required>
            <label>Email:</label>
            <input type="email" name="email" maxlength="100" required>
            <label>Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nac" required>
            <label>Observaciones:</label>
            <textarea name="observaciones" rows="4" cols="45"></textarea>
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>

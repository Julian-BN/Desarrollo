<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Eliminar Persona</title>
</head>
<body>
    <h1>Eliminar Persona</h1>
    <form action="delete.php" method="POST">
        <label>ID de la Persona:</label>
        <input type="number" name="id" required>
        <br>
        <input type="submit" value="Eliminar">
    </form>
</body>
</html>
<?php
// Código PHP para procesar la eliminación de una persona
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el ID de la persona a eliminar
    $id = $_POST['id'];

    // Código PHP para procesar la eliminación de una persona
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el ID de la persona a eliminar
    $id = $_POST['id'];

    // Verificar si existe el registro en la tabla personas antes de eliminarlo
    $sql = "SELECT * FROM personas WHERE id = $id";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        // El registro existe, proceder con la eliminación
        $sql = "DELETE FROM personas WHERE id = $id";

        if ($conexion->query($sql) === TRUE) {
            echo "La persona se ha eliminado correctamente";
        } else {
            echo "Error al eliminar la persona: " . $conexion->error;
        }
    } else {
        echo "La persona no existe en la base de datos";
    }
}

}
?>

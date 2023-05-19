<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <link rel="stylesheet" href="style.css">
    <title>Ver Personas</title>
    <?php
    // Código PHP para obtener y mostrar las personas de la base de datos
    require_once 'conexion.php';

    $sql = "SELECT p.nombre, g.nombre AS genero
            FROM personas p
            INNER JOIN genero g ON p.genero_id = g.id";

    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Nombre</th><th>Género</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["nombre"]."</td><td>".$row["genero"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron personas";
    }

    $conexion->close();
    ?>
</body>
</html>

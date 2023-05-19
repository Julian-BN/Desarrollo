<?php
$localhost = "localhost";
$root = "root";
$password = "";
$database = "desarrollo_web";

$conexion = new mysqli($localhost, $root, $password, $database);

if ($conexion->connect_error) {
    die("Error al conectar a la base de datos: " . $conexion->connect_error);
//} else {
    //echo "Conexión exitosa a la base de datos";
}
?>

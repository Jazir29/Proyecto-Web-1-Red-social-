<?php
$host = "127.0.0.1:3305"; // Nombre del host de la base de datos
$user = "root"; // Nombre de usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$dbname = "redsocial"; // Nombre de la base de datos


// Crear una conexión a la base de datos
$conexion = mysqli_connect($host, $user, $password, $dbname);

// Verificar si la conexión a la base de datos se estableció correctamente
if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}else{
    echo("Conexion exitosa");
}

?>
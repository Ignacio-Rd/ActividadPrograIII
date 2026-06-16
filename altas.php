<?php
$server   = "localhost";
$usuario  = "root";
$password = "root";

$conexion = new mysqli($server, $usuario, $password, "midb");

if ($conexion->connect_error) {
    die("Error al conectar: " . $conexion->connect_error);
}

$nombre           = $_POST["nombre"];
$apellido         = $_POST["apellido"];
$tipo_doc         = $_POST["tipo_doc"];
$documento        = $_POST["documento"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$email            = $_POST["email"];
$banco_emisor     = $_POST["banco_emisor"];
$usuario_form     = $_POST["usuario"];
$passwordA        = $_POST["passwordA"];
$passwordB        = $_POST["passwordB"];

if ($passwordA !== $passwordB) {
    die("Error: las contraseñas no coinciden.");
}

$password_hash = password_hash($passwordA, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios 
        (nombre, apellido, tipo_doc, documento, fecha_nacimiento, email, banco_emisor, usuario, password)
        VALUES 
        ('$nombre','$apellido','$tipo_doc','$documento','$fecha_nacimiento','$email','$banco_emisor','$usuario_form','$password_hash')";

if (!$conexion->query($sql)) {
    die("Error al guardar: " . $conexion->error);
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro exitoso</title>
</head>
<body>
    <h1>Gracias por registrarte</h1>
    <p>Tu usuario fue creado con éxito.</p>
    <a href="ingreso.html">Iniciar sesión</a>
</body>
</html>


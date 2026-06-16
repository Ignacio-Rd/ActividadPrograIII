<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "midb";

$conn = new mysqli($servername, $username, $password, $dbname);
// Chequea conexión
if ($conn->connect_error) {
die("Error al conectar a la base de datos: " . $conn->connect_error);
}

$tipo_doc         = $_POST["tipo_doc"];
$documento        = $_POST["documento"];
$usuario_form     = $_POST["usuario"];
$password         = $_POST["password"];

$sql = "SELECT password FROM usuarios WHERE usuario='$usuario_form' AND tipo_doc='$tipo_doc' AND documento='$documento'";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        echo "Bienvenido, $usuario_form!";
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
} else {
    echo "Usuario o contraseña incorrectos.";
}

$conn->close();

?>


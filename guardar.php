<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recuperar datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['contraseña'];
// Insertar datos en la base de datos
$sql = "INSERT INTO usuario (nombre, email, contraseña) VALUES ('$nombre', '$email','$password')";

if ($conn->query($sql) === TRUE) {
    echo "Datos guardados correctamente";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

// Cerrar la conexión           
$conn->close();
?>  

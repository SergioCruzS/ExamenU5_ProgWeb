<?php
include 'connectDB.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conexion = connectDB();
    $user = $_POST['email'];
    $pwd = $_POST['password'];//sha1(trim($_POST['password']));

    //Hacer la consulta para buscar el cliente
    $sql = "SELECT * FROM clientes WHERE email = '$user' AND password = '$pwd'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) == 0) {
        header('Location: ../../login.php?error=credenciales', true, 303);
        die("Usuario y/o contraseña incorrectos");
    }

    $fila = mysqli_fetch_assoc($resultado);
    session_start();

    // Almacenar un valor en la sesión
    $_SESSION['nombre'] = $fila['nombre'];
    $_SESSION['apellido'] = $fila['apellido'];
    $_SESSION['email'] = $fila['email'];
    header('Location: ../../catalogo.php?category=none');
    mysqli_close($conexion);
    //switch ($rol) {
    //    case 'admin':
    //        header('Location: ../../homeAdmin.php');
    //        break;
    //    case 'empleado':
    //        header('Location: ../../homeEmpleados.php');
    //        break;
//
    //    default:
    //        header('Location: ../../index.php');
    //        break;
    //}
}
?>
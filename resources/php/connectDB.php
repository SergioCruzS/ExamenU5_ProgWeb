<?php
function connectDB()
{
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "swebspac_sistema";
    $conexion = mysqli_connect($server, $user, $password, $database);

    if (!$conexion) {
        die("La conexión ha fallado: " . mysqli_connect_error());
    } else {
        mysqli_query($conexion, "SET NAMES 'UTF8'");
    }
    return $conexion;
}

//$sql = "INSERT INTO empleados (nombres, apellidos, puesto, idDepto, email, genero) 
//VALUES ('$nombres', '$apellidos', '$puesto', $idDepto, '$email', '$genero')";

//$sql = "DELETE FROM empleados WHERE idEmp = $idEmp";
//$sql = "UPDATE empleados SET nombres=?, apellidos=?, puesto=?, idDepto=?, email=?, genero=? WHERE idEmp=?";

//$sql = "INSERT INTO usuarios VALUES ('juan@me.com','".sha1("juan")."','empleado')";
//if (mysqli_query($conexion, $sql)) {
//    echo "Nuevo Registro creado exitosamente";
//} else {
//    echo "Error: ".$conexion.": ".mysqli_error($conn);
//}

?>
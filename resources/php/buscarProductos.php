<?php
include 'connectDB.php';
function obtenerProductos($busqueda, $orden)
{
    $conexion = connectDB();

    //Hacer la consulta para los productos
    $sql = "SELECT * FROM productos WHERE nombre LIKE('%$busqueda%') ORDER BY $orden"; 
    $resultado = mysqli_query($conexion, $sql);
    mysqli_close($conexion);
    return $resultado;
}

?>
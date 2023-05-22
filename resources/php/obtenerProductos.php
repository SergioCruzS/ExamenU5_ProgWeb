<?php
include 'connectDB.php';
function obtenerProductos($category, $orden)
{
    $conexion = connectDB();

    //Hacer la consulta para los productos
    if ($category == "none") {
        $sql = "SELECT * FROM productos ORDER BY $orden";
    }else{
        $sql = "SELECT * FROM productos WHERE categoria = '$category' ORDER BY $orden";
    }    
    $resultado = mysqli_query($conexion, $sql);
    mysqli_close($conexion);
    return $resultado;
}

?>
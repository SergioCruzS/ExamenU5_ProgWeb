<?php
session_start();

$arreglo = $_SESSION['carrito'];

for($i=0;$i<count($arreglo);$i++){
    
    if($arreglo[$i]['id'] == $_POST['id']){
        $arregloN = array(
            'id' => $arreglo[$i]['id'],
            'nombre' => $arreglo[$i]['nombre'],
            'precio' => $arreglo[$i]['precio'],
            'imagen' => $arreglo[$i]['imagen'],
            'cantidad' => $arreglo[$i]['cantidad']
        );
    }
    
}

if(isset($arregloN)){
    $_SESSION['carrito'] = $arregloN;
}else{
    unset($_SESSION['carrito']);
}
echo "listo";
?>
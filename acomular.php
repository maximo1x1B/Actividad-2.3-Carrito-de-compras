<?php
if($_POST)
{
    $producto = $_POST['producto']; 
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad']; 
    $subTotal = $precio * $cantidad;
    $fechaHora = Date("F_j_Y");
    $pedido = array();
    $ruta = $fechaHora. "_pedido.json";

    if(file_exists($ruta)) //leer el archivo JSON (
    {
        $archivo = file_get_contents($ruta); 
        $pedido = json_decode($archivo, true);
    
        $pedido[] = array('producto' => $producto, 'precio' => $precio, 'cantidad' => $cantidad, 'subTotal' => $subTotal); 
        $json_string = json_encode($pedido);
    
        echo $json_string;
        
        $file = $ruta;
        file_put_contents($file, $json_string);//guardar datos en archivos JSON echo CHETA HTTP-EQUIV="REFRESH" CONTENT="3;URL-index.php">";
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=index.php">';
    }
    else{
        $file = $ruta;
        $json_string = json_encode($pedido);
        $pedido[] = array('producto' => $producto, 'precio' => $precio, 'cantidad' => $cantidad, 'subTotal' => $subTotal); 
        file_put_contents($file,$json_string);
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=index.php">';
    }
}
?>


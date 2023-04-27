<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <?php
    
    if (isset($_POST['nombre'])) {
        $Criterio = "producto";
        $valor =  $_POST['nombre'];
        $NombreArchivo=Date("F_j_Y")."_Pedido.json"; 
        if(file_exists($NombreArchivo)){
            $archivo=file_get_contents($NombreArchivo); //obtener 
            $productos = json_decode($archivo); //se descompone el
            $contador = 0;
            foreach($productos as $producto){
                if($Criterio=="producto"){
                    if($producto->{'producto'}==$valor){
                    echo "<h1>Nombre producto: ".$producto->{'producto'}."</h1><br>";
                    break;
                }
            }
            $contador++;
        }
        echo $contador."<br>";
        unset($productos[$contador]);
        $productos = array_values($productos);
        $json_string = json_encode($productos);
        echo "<h2>Nueva cadena de JSON </h2>";
        echo $json_string;
        file_put_contents($NombreArchivo, $json_string);
    }
    else{
        echo "No existe el archivo";
    }
    }{
        echo 'No lo recibio';
    }
    ?>
    <a class="button" href="Index.php">Index</a>';
    <a class="button" href="leerJSON.php">Regresa</a>';
</body>
</html>
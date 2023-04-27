<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <header>
    </header>
    <h1><center>Modificaciones</center></h1> </header>

    <?php
    if (isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['cantidad']) && isset($_POST['cantidad_nueva'])) {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $cantidad_nuevoR = $_POST['cantidad_nueva'];
        


        $NombreArchivo = Date("F_j_Y") . "_pedido.json";
        if (file_exists($NombreArchivo)) {
            $archivo = file_get_contents($NombreArchivo);
            $productos = json_decode($archivo);

            $contador = 0;

            foreach ($productos as $producto) {
                if ($producto->{'producto'} == $nombre) {
                    $precio = $producto->{'precio'};
                    break;
                }
                $contador++;
            }

            echo "<h2>Nombre producto: " . $nombre . "</h1><br>";
            echo "<h2>Precio: " . $precio . "</h2><br>";
            echo "<h2>Cantidad: " . $cantidad_nuevoR . "</h2><br>";

            $cantidad_nuevo = $cantidad_nuevoR;
            $Subtotal_nuevo = $precio * $cantidad_nuevo;

            $productos = json_decode($archivo, true);
            $productos[$contador]['cantidad'] = $cantidad_nuevo;
            $productos[$contador]['subTotal'] = $Subtotal_nuevo;
            $json_string = json_encode($productos);

            echo "<h2>Nueva Cadena de JSON</h2>";
            echo $json_string;

            file_put_contents($NombreArchivo, $json_string);
        } else {
            echo "No existe el archivo";
        }
    } else {
        echo "Faltan parámetros";
    }
    ?>
    <a class="button" href="Index.php">Index</a>';
    <a class="button" href="leerJSON.php">Regresa</a>';

</body

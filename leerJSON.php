<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leer</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <header>
    </header>
    <h1>
        <center>Pedido registrado en JSON PHP</center>
    </h1>
    </header>

    <section id="Cuadricula">
        <table class="grilla" id="tablajson">
            <thead>
                <th>Nombre</th>
                <th>Precio_p</th>
                <th>Cantidad</th>
                <th>SubTotal</th>
            </thead>
            <?php
            $NombreArchivo = Date("F_j_Y") . "_Pedido.json";
            $Total = 0;
            if (file_exists($NombreArchivo)) {
                $archivo = file_get_contents($NombreArchivo);
                $productos = json_decode($archivo);
                foreach ($productos as $producto) {
                    echo '<tr><td><h4>' . $producto->{'producto'} . '</h4></td>';
                    echo '<td><h4>$' . $producto->{'precio'} . '</h1></td>';
                    echo '<td><h4>' . $producto->{'cantidad'} . '</h4></td>';
                    echo '<td><h4>$' . $producto->{'subTotal'} . '</h4></td></td>';
                    echo '<td>
        <form class="columnas-From2" action="modificar.php" method="post">
        <input type="hidden" name="nombre" value="' . $producto->{'producto'} . '">
        <input type="hidden" name="precio" value="' . $producto->{'precio'} . '">
        <input type="hidden" name="cantidad" value="' . $producto->{'cantidad'} . '">
        <input type="text" name="cantidad_nueva">
        <input type="submit" value="Modificar" style="margin: 4% auto 1% auto; background-color: #4caf50; color: #fff; padding: 10px 20px; border: none; font-size: 16px; font-weight: bold; text-transform: uppercase; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease-in-out;">
        </form>
        </td>';
                    echo '<td>
        <form class="columnas-From2" action="eliminarJson.php" method="post">
        <input type="hidden" name="nombre" value="' . $producto->{'producto'} . '">
        <input type="submit" value="EliminarElemento" style="background-color: #4caf50; color: #fff; padding: 10px 20px; border: none; font-size: 16px; font-weight: bold; text-transform: uppercase; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease-in-out;">
        </form>
        </td>';
                    $Total = $Total + $producto->{'subTotal'};
                }
            } else {
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=index.php">';
            }
            echo '<a class="button" href="index.php">Index</a>';
            ?>
    </section>
    <section id="Total">
        <?php
        echo '<h3>Total a pagar: ' . $Total . ' $</h3>';
        ?>


    </section>

</body>

</html>
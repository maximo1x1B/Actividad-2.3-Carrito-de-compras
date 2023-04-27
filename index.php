<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Galeria de Productos</title>
</head>
<body>
    <header>

    </header>
    <section>
        <h1>Galeria de Productos</h1>
        <h2>Bienvenido Maximo Giovanni Bolaños Gonzalez</h2>
        <table>
        <?php
        include("conectbd.php");
        $Resultado=mysqli_query($conexion, "SELECT * FROM `productos`;");
        echo '<tr><th>Nombre</th><th>Marca</th><th>Imagen de Muestra</th><th>Precio</th><th>Descripción del producto</th><th>Existencias</th></tr>';
        while($row = mysqli_fetch_array($Resultado)){
            echo '<tr><td>'.($row['Nombre_PRO']).'</td>';
            echo '<td>'.($row['Marca_PRO']).'</td>';
            echo '<td><img src="img/'.$row['Imagen_PRO'].'" class="ImagenesP"></td>';
            echo '<td>$'.$row['Precio_PRO'].' MXN</td>';
            echo '<td>'.($row['DescriocionCorta_PRO']).'</td>';
            echo '<td>'.($row['Existencias_PRO']).'</td>';
            echo '<td><a href="datalles.php?id='.$row['ID_PRO'].'"><img src="img/carrito.png" class="ImagenC"></a> </td></tr>';
        }
        mysqli_close($conexion);
        ?>
        </table>
        <?php
        $NombreArchivo=DATE("F_j_Y")."_Pedido.json";
        if(file_exists($NombreArchivo)){
            echo '<a class="button" href="leerJSON.php">Ver Pedido</a>';
        }
        ?>
    </section>
</body>
</html>

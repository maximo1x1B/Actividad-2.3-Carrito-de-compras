<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agregar al Carrito</title>
</head>

<body>
    <header>

    </header>
    <section>
        <div class="centerDetails">
            <h1>
                Deatelles del Producto
            </h1>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                include("conectbd.php");
                $Resultado = mysqli_query($conexion, "SELECT * FROM `productos` WHERE `ID_PRO`='" . $id . "';");
                while ($row = mysqli_fetch_array($Resultado)) {
                    echo '<form class="columnas-From" action="acomular.php" method="post" name="AgregarCarrito">';
                    echo '<div class="dividir" >';
                        echo '<input class="acomodar" type="text" name="producto" value="' . ($row['Nombre_PRO']) . '" readonly="readonly">';
                        echo '<img  src="img/' . $row['Imagen_PRO'] . '" class="ImagenesA">';
                    echo '</div>';
                    echo '<div class="dividir" >';
                        echo '<div class="acomodar" >';
                            echo '<input type="number" name="precio" size="1" value="' . $row['Precio_PRO'] . '"  readonly="readonly">MXN';
                        echo '</div>';
                    echo '<input class="acomodar" type="number" name="cantidad" placeholder="Cantidad a Pedir" size="8" max="10" min="1">';
                    echo '<input class="acomodar" name="Agregar" type="submit" id="btnagregar" value="Agregar" style="background-color: #4caf50; color: #fff; padding: 10px 20px; border: none; font-size: 16px; font-weight: bold; text-transform: uppercase; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease-in-out;">';
                    echo '<h3>' . ($row['DescriocionCorta_PRO']) . '</h3>';
                    echo '</div>';
                    echo '</form>';
                }
            } else {
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php">';
            }
            mysqli_close($conexion);
            ?>
        </div>
    </section>
    <a class="button" href="index.php">Index</a>'
</body>

</html>
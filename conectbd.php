<?php
//Conectamos con MySQL
    $conexion = mysqli_connect("localhost", "root", "") or die("Fallo en el establecimiento de la conexión");
    #Seleccionamos la base de datos a utilizar
    mysqli_select_db($conexion, "videojuegos_accesorios") or die("Error en la selección de la base de datos");
    #Consulta para leer Productos
?>
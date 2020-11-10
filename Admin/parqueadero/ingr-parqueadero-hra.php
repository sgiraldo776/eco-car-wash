<?php
    require "../../conexion.php";
    
    if ($conn->connect_error) {
        die("Conección exitosa: " . $conn->connect_error);
    }

    $tipo=$_POST['tipo'];
    $placa=$_POST['placa'];
    $hora=$_POST['hora'];

    $sql="INSERT INTO tblparqueadero (placa,tipo_vehiculo,hora_ingreso,hora_salida,precio) VALUES ('$placa', '$tipo', '$hora', null,null)";
    if ($conn->query($sql) === FALSE) {
        echo "<script> alert ('No se ha podido ingresar'); </script>";
    } else {
        echo "<script> 	alert ('Ingresado Correctamente'); </script>";
        echo "<script> 	location.href='form-parqueadero-hra.php'; </script>";
    }
?>
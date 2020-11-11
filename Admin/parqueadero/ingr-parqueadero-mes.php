<?php
    require "../../conexion.php";
    
    if ($conn->connect_error) {
        die("Conección exitosa: " . $conn->connect_error);
    }

    $cliente=$_POST['cliente'];
    $tipo=$_POST['tipo'];
    $correo=$_POST['correo'];
    $celular=$_POST['celular'];
    $placa=$_POST['placa'];
    $hora=$_POST['hora'];
    $precio=$_POST['preciomes'];

    $sql= $conn->query ("INSERT INTO tblparqueadero (placa,tipo_vehiculo,hora_ingreso,hora_salida, precio, Celular, Correo) VALUES ('$placa', '$tipo', '$hora' ,null, '$precio', '$celular', '$correo' )");
    if($sql == TRUE){
        echo "<script> 	alert ('Ingresado Correctamente'); </script>";
        echo "<script> 	location.href='form-parqueadero-mes.php'; </script>";
        
    } else {
        echo "<script> alert ('No se ha podido ingresar'); </script>";
    }
?>
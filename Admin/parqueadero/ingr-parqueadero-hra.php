<?php
    require "../../conexion.php";
    
    if ($conn->connect_error) {
        die("Conección exitosa: " . $conn->connect_error);
    }

    $tipo=$_POST['tipo'];
    if($tipo=="Moto"){
        $tipo_parque=4;
    }elseif ($tipo=="Carro"){
        $tipo_parque=1;
    }
    $placa=$_POST['placa'];
    $hora=$_POST['hora'];

    $sql= $conn->query ("INSERT INTO tblparqueadero (Cliente,placa,tipo_vehiculo,hora_ingreso,hora_salida, id_parqueo, Correo, Celular) VALUES (null,'$placa', '$tipo', '$hora' ,null, '$tipo_parque', null, null )");
    if($sql == TRUE){
        echo "<script> 	alert ('Ingresado Correctamente'); </script>";
        echo "<script> 	location.href='form-parqueadero-hra.php'; </script>";
    } else {
        echo "<script> alert ('No se ha podido ingresar'); </script>";
    }
?>
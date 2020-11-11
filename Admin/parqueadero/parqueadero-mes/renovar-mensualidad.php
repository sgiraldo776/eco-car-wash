<?php
    require "../../../conexion.php";
    
    if ($conn->connect_error) {
        die("Conección exitosa: " . $conn->connect_error);
    }

    $id=$_GET['id'];

    $sql= $conn->query ("INSERT INTO tblparqueadero (Cliente,placa,tipo_vehiculo,hora_ingreso,hora_salida, id_parqueo, Correo, Celular) VALUES ('$cliente','$placa', '$tipo', '$hora' ,null, '$tipo_parque', '$correo', '$celular' )");
    if($sql == TRUE){
        echo "<script> 	alert ('Ingresado Correctamente'); </script>";
        echo "<script> 	location.href='form-parqueadero-mes.php'; </script>";
        
    } else {
        echo "<script> alert ('No se ha podido ingresar'); </script>";
    }
?>
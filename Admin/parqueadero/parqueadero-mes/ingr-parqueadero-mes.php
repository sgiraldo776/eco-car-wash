<?php
    require "../../../conexion.php";
    session_start();
    if($_SESSION['rol']!=1){
        echo "<script> location.href='../../index.php'; </script>";
    } 
    
    if ($conn->connect_error) {
        die("Conección exitosa: " . $conn->connect_error);
    }

    $cliente=$_POST['cliente'];
    $tipo=$_POST['tipo'];
    if($tipo=="Moto"){
        $tipo_parque=6;
    }elseif ($tipo=="Carro"){
        $tipo_parque=2;
    }
    $correo=$_POST['correo'];
    $celular=$_POST['celular'];
    $placa=$_POST['placa'];
    $hora=$_POST['hora'];

    $sql= $conn->query ("INSERT INTO tblparqueadero (Cliente,placa,tipo_vehiculo,hora_ingreso,hora_salida, id_parqueo, Correo, Celular) VALUES ('$cliente','$placa', '$tipo', '$hora' ,null, '$tipo_parque', '$correo', '$celular' )");
    if($sql == TRUE){
        echo "<script> 	location.href='form-parqueadero-mes.php?msg=1'; </script>";
    } else {
        echo "<script> 	location.href='form-parqueadero-mes.php?msg=2'; </script>";
    }
?>
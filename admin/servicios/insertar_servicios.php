<?php
    require_once "../../conexion.php";
    session_start();
    if($_SESSION['rol']!=1){
        echo "<script> location.href='../../index.php'; </script>";
    } 

    $Tipo_Servicio = $_POST['Tipo_Servicio'];
    $Servicio = $_POST['Servicio'];
    $Descripcion = $_POST['Descripcion'];
    $Valor = $_POST['Valor'];

    $ins = $conn -> query("INSERT INTO tblservicios_ofertados (Tipo_Servicio, Servicio, Descripcion, Valor) VALUES ('$Tipo_Servicio', '$Servicio', '$Descripcion', '$Valor')");

    if ($ins) {
        echo "<script> 	location.href='form_servicios.php?msg=1'; </script>";
    }else{
        echo "<script> 	location.href='form_servicios.php?msg=2'; </script>";
    }
?>
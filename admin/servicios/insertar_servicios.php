<?php
    require_once "../../conexion.php";

    $Tipo_Servicio = $_POST['Tipo_Servicio'];
    $Descripcion = $_POST['Descripcion'];
    $Valor = $_POST['Valor'];

    $ins = $conn -> query("INSERT INTO tblservicios_ofertados (Tipo_Servicio, Descripcion, Valor) VALUES ('$Tipo_Servicio', '$Descripcion', '$Valor')");

    if ($ins) {
        echo "<script> 	alert ('Ingresado Correctamente'); </script>";
        echo "<script> 	location.href='form_servicios.php'; </script>";
    }else{
        echo "<script> alert ('No se ha podido ingresar'); </script>";
    }
?>
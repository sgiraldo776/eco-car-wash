<?php
    require_once "../../conexion.php";

    $Id_Servicio = $_GET['Id_Servicio'];

    $del = $conn -> query("DELETE FROM tblservicios_ofertados WHERE Id_Servicio='$Id_Servicio'");

    if ($del) {
        echo "<script> 	alert ('Eliminado Correctamente'); </script>";
        echo "<script> 	location.href='form_servicios.php'; </script>";
    }else{
        echo "<script> alert ('No se ha podido Eliminar'); </script>";
    }
?>
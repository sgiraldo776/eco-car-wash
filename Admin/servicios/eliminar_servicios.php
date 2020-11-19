<?php
    require_once "../../conexion.php";
    session_start();
    if($_SESSION['rol']!=1){
        echo "<script> location.href='../../index.php'; </script>";
    } 

    $Id_Servicio = $_GET['Id_Servicio'];

    $del = $conn -> query("DELETE FROM tblservicios_ofertados WHERE Id_Servicio='$Id_Servicio'");

    if ($del) {
        echo "<script> 	location.href='form_servicios.php?msg=3'; </script>";
    }else{
        echo "<script> 	location.href='form_servicios.php?msg=4'; </script>";
    }
?>
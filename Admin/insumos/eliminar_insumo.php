<?php
    require  "../../conexion.php";

    $Id_Insumo= $_GET['Id_Insumo'];

    $del = $conn -> query("DELETE FROM tblInsumo_Repuesto WHERE Id_Insumo='$Id_Insumo'");

    if ($del) {
        echo "<script> 	alert ('Eliminado Correctamente'); </script>";
        echo "<script> 	location.href='form_Insumo.php'; </script>";
    }else{
        echo "<script> alert ('No se ha podido Eliminar'); </script>";
    }
?>
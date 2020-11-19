<?php
    require  "../../conexion.php";
    session_start();
    if($_SESSION['rol']!=1){
        echo "<script> location.href='../../index.php'; </script>";
    }
    
    $Id_Insumo= $_GET['Id_Insumo'];

    $del = $conn -> query("DELETE FROM tblInsumo_Repuesto WHERE Id_Insumo='$Id_Insumo'");

    if ($del) {
        echo "<script> 	location.href='form_Insumo.php?msg=5'; </script>";
    }else{
        echo "<script> 	location.href='form_Insumo.php?msg=6'; </script>";
    }
?>
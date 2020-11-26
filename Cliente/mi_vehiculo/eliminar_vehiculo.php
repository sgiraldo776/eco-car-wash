<?php
    require  "../../conexion.php";
    session_start();
    
    $id=$_GET['id_Vehiculo'];

    $del = $conn -> query("DELETE FROM tblvehiculo WHERE id_Vehiculo='$id'");

    if ($del) {
        echo "<script> 	location.href='mi_vehiculo.php?msg=3'; </script>";
    }else{
        echo "<script> 	location.href='mi_vehiculo.php?msg=4'; </script>";
    }
?>
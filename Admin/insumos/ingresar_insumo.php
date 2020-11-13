<?php
    require "../../conexion.php";
    session_start();
    if($_SESSION['rol']!=1){
        echo "<script> location.href='../../index.php'; </script>";
    }
    
    if ($conn->connect_error) {
        die("Conección exitosa: " . $conn->connect_error);
    }

    $cantidad=$_POST['cantidad'];
    $descripcion=$_POST['descripcion'];
    $valoru=$_POST['valorunitario'];
    $valortotal=$cantidad*$valoru;

    $sql="INSERT INTO tblInsumo_Repuesto (Cantidad, Descripcion, Vlr_Unitario, Vlr_Total) VALUES ('$cantidad', '$descripcion', '$valoru', '$valortotal')";
    if ($conn->query($sql) === FALSE) {
        echo "<script> alert ('No se ha podido ingresar'); </script>";
    } else {
        echo "<script> 	alert ('Ingresado Correctamente'); </script>";
        echo "<script> 	location.href='form_Insumo.php'; </script>";
    }



?>
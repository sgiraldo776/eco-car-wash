<?php
    require "../../../conexion.php";
    session_start();
    if($_SESSION['rol']!=1){
        echo "<script> location.href='../../index.php'; </script>";
    } 
    
    if ($conn->connect_error) {
        die("Conección exitosa: " . $conn->connect_error);
    }

    $id=$_GET['id'];

    $del= $conn->query ("DELETE FROM tblparqueadero WHERE num_factura='$id'");
    if($del == TRUE){
        echo "<script> 	alert ('Vehiculo Retirado Correctamente'); </script>";
        echo "<script> 	location.href='form-parqueadero-hra.php'; </script>";
        
    } else {
        echo "<script> alert ('No se ha podido ingresar'); </script>";
        echo "Error: No se pudo ingresar" . $up . "<br>". $conn->error; 
    }
?>
<?php
    require "../../../conexion.php";
    session_start();
    if($_SESSION['rol']!=1){
        echo "<script> location.href='../../index.php'; </script>";
    } 
    
    if ($conn->connect_error) {
        die("Conección exitosa: " . $conn->connect_error);
    }
    $fecha = Date('y-m-d h:i');
    $id=$_GET['id'];

    $up= $conn->query ("UPDATE tblparqueadero SET hora_ingreso='$fecha' WHERE num_factura='$id'");
    if($up == TRUE){
        echo "<script> 	alert ('Mensualidad Renovada Correctamente'); </script>";
        echo "<script> 	location.href='form-parqueadero-mes.php'; </script>";
        
    } else {
        echo "<script> alert ('No se ha podido ingresar'); </script>";
        echo "Error: No se pudo ingresar" . $up . "<br>". $conn->error; 
    }
?>
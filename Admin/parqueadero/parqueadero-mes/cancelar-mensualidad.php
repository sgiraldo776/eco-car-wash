<?php
    require "../../../conexion.php";
    
    if ($conn->connect_error) {
        die("Conección exitosa: " . $conn->connect_error);
    }

    $id=$_GET['id'];

    $del= $conn->query ("DELETE FROM tblparqueadero WHERE num_factura='$id'");
    if($del == TRUE){
        echo "<script> 	alert ('Mensualidad Cancelada Correctamente'); </script>";
        echo "<script> 	location.href='form-parqueadero-mes.php'; </script>";
        
    } else {
        echo "<script> alert ('No se ha podido ingresar'); </script>";
        echo "Error: No se pudo ingresar" . $up . "<br>". $conn->error; 
    }
?>
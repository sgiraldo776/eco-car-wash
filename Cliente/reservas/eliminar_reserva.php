<?php
    require  "../../conexion.php";
    session_start();
    
    $id=$_GET['id'];

    $del = $conn -> query("DELETE FROM tblreservas WHERE Id_Reserva='$id'");

    if ($del) {
        echo "<script> 	alert('Correcto'); </script>";
        echo "<script> 	location.href='reservas.php'; </script>";
    }else{
        //echo "<script> 	location.href='reservas.php'; </script>";
        echo "<script> 	alert('ERROR'); </script>";
    }
?>
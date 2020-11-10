<?php
    require "../../conexion.php";
    
    if ($conn->connect_error) {
        die("Conección exitosa: " . $conn->connect_error);
    }

    $servicio=$_POST['servicio'];
    $id=$_POST['id'];
    $fecha=$_POST['fecha'];

    // $sql=$conn->query("INSERT INTO tblreservas (Id_Reserva, Fecha, Id_Cliente, Tipo_Lavado) VALUES (null, '$fecha', '$_SESSION[Id_Cliente]', '$servicio')");
    $sql=$conn->query("INSERT INTO tblreservas (Fecha, Id_Cliente, Tipo_Lavado) VALUES ('$fecha', '$id', '$servicio')");

    if ($sql==TRUE){
        echo "<script> 	alert ('Ingresado Correctamente'); </script>";
        echo "<script> 	location.href='reservas.php'; </script>";
    }else{
        echo "Error: " . $sql . "<br>". $conn->error;
    }

?>
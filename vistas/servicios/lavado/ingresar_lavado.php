<?php
    require "../../../conexion.php";
    session_start();
    if ($conn->connect_error) {
        die("Conección exitosa: " . $conn->connect_error);
    }

    $lavado=$_POST['lavado'];
    $vehiculo=$_POST['vehiculo'];
    $fecha=$_POST['fecha'];
    $cliente=$_SESSION['id_cliente'];

    // $sql=$conn->query("INSERT INTO tblreservas (Id_Reserva, Fecha, Id_Cliente, Tipo_Lavado) VALUES (null, '$fecha', '$_SESSION[Id_Cliente]', '$servicio')");
    $sql=$conn->query("INSERT INTO tblreservas (Fecha, Id_Cliente, Tipo_Lavado) VALUES ('$fecha', '$vehiculo', '$lavado')");

    $sql=$conn->query("INSERT INTO tblreservas (title, tipoVehiculo, placa, descripcion, start, color, textColor, Id_Cliente) VALUES ('Lavado', (SELECT Tipo_Vehiculo FROM tblvehiculo WHERE id_Vehiculo='$vehiculo'), '$vehiculo', '$lavado', '$fecha', '#1A4AD9', '#FFFFFF', '$cliente')");

    if ($sql==TRUE){
        echo "<script> 	alert ('Ingresado Correctamente'); </script>";
        echo "<script> 	location.href='lavado.php'; </script>";
    }else{
        echo "Error: " . $sql . "<br>". $conn->error;
    }

?>
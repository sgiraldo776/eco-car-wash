<?php
    require "../../../conexion.php";
    session_start();
    if ($conn->connect_error) {
        die("Conección exitosa: " . $conn->connect_error);
    }
    
    $vehiculo = $_POST['vehiculo'];
    if ($_POST['servicio'] != 'Otro') {
        $descripcion = $_POST['servicio'];
    }else{
        $descripcion = $_POST['descripcion'];
    }
    $fecha=$_POST['fecha'];
    $hora=$_POST['hora'];
    $cita=$fecha." ".$hora;
    $cliente=$_SESSION['id_cliente'];

    // $sql=$conn->query("INSERT INTO tblreservas (Id_Reserva, Fecha, Id_Cliente, Tipo_Lavado) VALUES (null, '$fecha', '$_SESSION[Id_Cliente]', '$servicio')");
    $sql=$conn->query("INSERT INTO tblreservas (title, tipoVehiculo, placa, descripcion, start, color, textColor, Id_Cliente) VALUES ('Reparacion', (SELECT Tipo_Vehiculo FROM tblvehiculo WHERE id_Vehiculo='$vehiculo'), '$vehiculo', '$descripcion', '$cita', '#4D4D4D', '#FFFFFF', '$cliente')");

    if ($sql==TRUE){
        echo "<script> 	alert ('Ingresado Correctamente'); </script>";
        echo "<script> 	location.href='reparacion.php'; </script>";
    }else{
        echo "Error: " . $sql . "<br>". $conn->error;
    }

?>
<?php
    require "../../conexion.php";
    
    if ($conn->connect_error) {
        die("Conección exitosa: " . $conn->connect_error);
    }

    session_start();

    $placa=$_POST['placa'];
    $marca=$_POST['marca'];
    $modelo=$_POST['modelo'];
    $color=$_POST['color'];
    $tipovehic=$_POST['tipo'];
    $soat=$_POST['soat'];
    $tecno=$_POST['tecmeca'];
    $id_cliente=$_SESSION['id_cliente'];

    $sql=$conn->query("INSERT INTO tblvehiculo (`id_Vehiculo`, `Marca`, `Modelo`, `Color`, `Tipo_Vehiculo`, `Vencimiento_SOAT`, `Vencimiento_Tecno`, `Id_Cliente`) VALUES ('$placa', '$marca', '$modelo', '$color', '$tipovehic', '$soat', '$tecno', '$id_cliente')");
        if($sql==TRUE){
            echo "<script> 	location.href='form_vehic.php?msg=1'; </script>";
        }else{
            echo "<script> 	location.href='form_vehic.php?msg=2'; </script>";
        }

?>
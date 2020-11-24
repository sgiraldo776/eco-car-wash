<?php
    include "../../conexion.php";

    $placa=$_GET['placa'];
    $marca=$_POST['marca'];
    $modelo=$_POST['modelo'];
    $color=$_POST['color'];
    $tipo=$_POST['tipo'];
    $soat=$_POST['soat'];
    $tecmeca=$_POST['tecmeca'];

    echo $placa;

    $up = $conn -> query("UPDATE tblvehiculo SET Marca='$marca', Modelo='$modelo', Color='$color', Tipo_Vehiculo='$tipo', Vencimiento_SOAT='$soat', Vencimiento_Tecno='$tecmeca' WHERE id_Vehiculo='$placa'");

    if($up){
        echo "<script> 	location.href='mi_vehiculo.php?msg=1'; </script>";
    }else{
        echo "<script> 	location.href='mi_vehiculo.php?msg=2'; </script>";
    }
?>
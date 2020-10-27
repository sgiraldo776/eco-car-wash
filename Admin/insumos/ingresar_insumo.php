<?php
    require "../../conexion.php";
    
    if ($conn->connect_error) {
        die("Conección exitosa: " . $conn->connect_error);
    }

    $cantidad=$_POST['cantidad'];
    $descripcion=$_POST['descripcion'];
    $valoru=$_POST['valorunitario'];
    $valortotal=$cantidad*$valoru;

    $sql="INSERT INTO tblInsumo_Repuesto (Cantidad, Descripcion, Vlr_Unitario, Vlr_Total) VALUES ('$cantidad', '$descripcion', '$valoru', '$valortotal')";
    if ($conn->query($sql) === FALSE) {
        echo "<script> 	No se ha podido ingresar </script>";
    } else {
        echo "<script> 	Ingreso Correcto </script>";
        echo "<script> 	location.href='form_Insumo.php'; </script>";
    }



?>
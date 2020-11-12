<?php

require  "../../conexion.php";

$Id_Insumo= $_GET['Id_Insumo'];
$cantidad= $_POST['cantidad'];

$cantidadactual = $conn ->query("SELECT Cantidad FROM tblinsumo_repuesto WHERE Id_Insumo='$Id_Insumo'");

$cf=($cantidadactual)-($cantidad);

$sql = $conn ->query("UPDATE tblinsumo_repuesto SET Cantidad='$cf' WHERE Id_Insumo='$Id_Insumo'");

if ($sql) {
    //echo "<script> 	location.href='form_insumo.php'; </script>";
}else{
    //echo "<script> 	location.href='form_insumo.php'; </script>";
    echo "<script> 	alert('pailas socio') </script>";
}


?>
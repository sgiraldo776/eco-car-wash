<?php

require  "../../conexion.php";

$Id_Insumo= $_GET['Id_Insumo'];
$cantidad= $_POST['cantidad'];

$sel = $conn -> query("SELECT * FROM tblinsumo_repuesto WHERE Id_Insumo='$Id_Insumo'");

while ($row=$sel->fetch_array()){
    echo $row[1];
    $cant=$row[1];
    $valu=$row[3];
}

$cf=($cant)-($cantidad);

$valtotal=$cf*$valu;

$sql = $conn ->query("UPDATE tblinsumo_repuesto SET Cantidad='$cf', Vlr_Total='$valtotal' WHERE Id_Insumo='$Id_Insumo'");

if ($sql) {
    echo "<script> 	location.href='form_insumo.php'; </script>";
}else{
    echo "<script> 	alert('ERROR') </script>";
    echo "<script> 	location.href='form_insumo.php'; </script>";
}


?>
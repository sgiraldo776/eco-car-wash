<?php

require  "../../conexion.php";
session_start();
if($_SESSION['rol']!=1){
    echo "<script> location.href='../../index.php'; </script>";
}

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
    echo "<script> 	location.href='form_insumo.php?msg=3'; </script>";
}else{
    echo "<script> 	location.href='form_insumo.php?msg=4'; </script>";
}


?>
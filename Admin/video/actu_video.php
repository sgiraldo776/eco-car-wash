<?php
include '../../conexion.php';


$nombre = $_POST['nombre'];
$url=$_POST['url'];

$varPHP = str_replace('watch?v=', 'embed/', $url);


$up = $conn -> query("UPDATE tblvideo SET Nombre='$nombre', url='$varPHP' WHERE id='1'");

if ($up) {
    echo "<script> 	location.href='../../index.php'; </script>";
}
else{
	echo "<script> 	location.href='form_video.php';</script>";
}

?>
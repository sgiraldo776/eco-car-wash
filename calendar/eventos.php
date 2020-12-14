<?php
header('Content-Type: application/json');
/////////////////////////// Opcion que solo sirve para listar 1 evento ///////////////////////////
// include "../conexion.php";

// $sel = $conn->query("SELECT * FROM tblreservas");

// $resultado = $sel -> fetch_assoc();

/////////////////////////// Opcion Buena ///////////////////////////
$pdo = new PDO("mysql:dbname=car_wash;host=127.0.0.1","root","");

$sql = $pdo->prepare("SELECT * FROM tblreservas");
$sql -> execute();

$resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);

?>
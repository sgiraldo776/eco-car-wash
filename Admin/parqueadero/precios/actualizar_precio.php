<?php
    require "../../../conexion.php";
    session_start();
    if($_SESSION['rol']!=1){
        echo "<script> location.href='../../index.php'; </script>";
    } 
    
    if ($conn->connect_error) {
        die("Conección exitosa: " . $conn->connect_error);
    }
    $precio = $_POST['precio'];
    $id=$_GET['id'];

    $up= $conn->query ("UPDATE tbltipoparqueo SET precio='$precio' WHERE id_parqueo='$id'");
    if($up == TRUE){
        echo "<script> 	location.href='precios.php?msg=1'; </script>";
    } else {
        //echo "Error: No se pudo ingresar" . $up . "<br>". $conn->error;
        echo "<script> 	location.href='precios.php?msg=2'; </script>";
    }
?>
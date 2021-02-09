<?php
    require "../../../conexion.php";
    session_start();
    if($_SESSION['rol']!=1){
        echo "<script> location.href='../../index.php'; </script>";
    } 
    
    if ($conn->connect_error) {
        die("Conección exitosa: " . $conn->connect_error);
    }

    
    $id=$_GET['id'];
    
    $sel = $conn -> query("SELECT hora_ingreso from tblparqueadero WHERE num_factura='$id'");
    while ($fila = $sel -> fetch_assoc()) {
        $antfecha = $fila['hora_ingreso'];
    }
    $fecha = strtotime('+31 day', strtotime($antfecha));
    $nuevafecha = date ( 'y-m-d h:i' , $fecha );
    

    $up= $conn->query ("UPDATE tblparqueadero SET hora_ingreso='$nuevafecha' WHERE num_factura='$id'");
    if($up == TRUE){
        echo "<script> 	location.href='form-parqueadero-mes.php?msg=3'; </script>";
    } else {
        //echo "Error: No se pudo ingresar" . $up . "<br>". $conn->error;
        echo "<script> 	location.href='form-parqueadero-mes.php?msg=4'; </script>";
    }
?>
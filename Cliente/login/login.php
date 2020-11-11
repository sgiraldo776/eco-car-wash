<?php
    require_once "../../conexion.php";

    session_start();

    $Usuario = $_POST['usuario'];
    $Contraseña = $_POST['password'];
    //$Contraseña=hash("sha256", $Contraseña); QUITAR EL COMENTARIO CUANDO EL LOGIN ESTÉ LISTO

    $sel = $conn->query("SELECT * FROM tblusuario WHERE Username='$Usuario' AND Password='$Contraseña'");

    $row = mysqli_fetch_array($sel);

    if ($row==TRUE) {
        echo "Sesion Iniciada, Bienvenido";
        if($row[4]==1){
            echo "<script> location.href='../../Admin/insumos/form_insumo.php'; </script>";
        }else{
            echo "<script> location.href='../../index.php'; </script>";
        }
    }else{
        echo "<script> alert('Datos Incorrectos') </script>";
        echo "<script> location.href='login.php'; </script>";
    }
?>
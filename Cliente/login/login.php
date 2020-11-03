<?php
    require_once "../../conexion.php";

    $Usuario = $_POST['correo'];
    $Contraseña = $_POST['contr'];
    //$Contraseña=hash("sha256", $Contraseña); QUITAR EL COMENTARIO CUANDO EL LOGIN ESTÉ LISTO

    $sel = $conn->query("SELECT * FROM tblusuario WHERE Username='$Usuario' AND Password='$Contraseña'");

    $row = mysqli_fetch_array($sel);

    if ($row==TRUE) {
        echo "Sesion Iniciada, Bienvenido";
        ///////// FALTA VALIDAR DATOS PARA LA SESION /////////
    }else{
        echo "<script> alert('Datos Incorrectos') </script>";
        echo "<script> location.href='login.php'; </script>";
    }
?>
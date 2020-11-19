<?php
    require_once "../../conexion.php";

    session_start();

    $Usuario = $_POST['correo'];
    $Contraseña = $_POST['contr'];
    $Contraseña=hash("sha256", $Contraseña); //QUITAR EL COMENTARIO CUANDO EL LOGIN ESTÉ LISTO

    $sel = $conn->query("SELECT * FROM tblusuario WHERE Username='$Usuario' AND Password='$Contraseña'");

    $row = mysqli_fetch_array($sel);

    if ($row==TRUE) {
        if($row[4]==1){
            $_SESSION['id_usuario']=$row[0];
            $_SESSION['correo']=$row[1];
            $_SESSION['id_cliente']=$row[3];
            $_SESSION['rol']=$row[4];
            echo "<script> location.href='../../index.php'; </script>";
        }else{
            $_SESSION['id_usuario']=$row[0];
            $_SESSION['correo']=$row[1];
            $_SESSION['id_cliente']=$row[3];
            $_SESSION['rol']=$row[4];
            echo "<script> location.href='../../index.php'; </script>";
        }
    }else{
        echo "<script> location.href='frm_login.php?msg=2'; </script>";
    }
?>
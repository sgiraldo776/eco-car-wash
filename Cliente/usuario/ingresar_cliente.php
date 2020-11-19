<?php
    require "../../conexion.php";
    
    if ($conn->connect_error) {
        die("Conección exitosa: " . $conn->connect_error);
    }

    $identificacion=$_POST['identificacion'];
    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    $direccion=$_POST['direccion'];
    $celular=$_POST['celular'];
    $correo=$_POST['correo'];
    $ciudad=$_POST['ciudad'];
    $contrasena=$_POST['contra1'];
    $contrasena=hash("sha256", $contrasena);

    $sql=$conn->query("INSERT INTO tblCliente (id_cliente, Nom_Cliente, Ape_Cliente, Dir_Cliente, Cel_Cliente, Corr_Cliente, Ciudad_residencia) VALUES ('$identificacion', '$nombres', '$apellidos', '$direccion', '$celular', '$correo', '$ciudad')");
        if ($sql==true){
            $sql2=$conn->query("INSERT INTO tblUsuario (Id_Usuario, Username, Password, Id_Cliente, Id_Rol) VALUES ('$identificacion', '$correo', '$contrasena', '$identificacion', 2)");
            if ($sql2==true){
                echo "<script> 	alert ('Ingresado Correctamente'); </script>";
                echo "<script> 	location.href='form_cliente.php'; </script>";

            }else{
                $sq3=$conn->query("DELETE FROM tblCliente WHERE id_cliente='$identificacion'");
                echo "<script> 	alert ('BUENARDA'); </script>";
            }

        }else{
            echo "<script> 	alert ('Error al ingresar'); </script>";
        }



?>
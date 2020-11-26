<?php
    include "../../conexion.php";

    $id=$_POST['cedula'];
    $nombre=$_POST['nombres'];
    $apellido=$_POST['apellidos'];
    $celular=$_POST['celular'];
    $ciudad=$_POST['ciudad'];
    $direccion=$_POST['direccion'];


    $up = $conn -> query("UPDATE tblcliente SET Nom_Cliente='$nombre', Ape_Cliente='$apellido', Dir_CLiente='$direccion', Cel_Cliente='$celular', Ciudad_residencia='$ciudad' WHERE id_cliente='$id'");

    if($up){
        echo "<script> 	location.href='mi_perfil.php?msg=1'; </script>";
    }else{
        echo "<script> 	location.href='mi_perfil.php?msg=2'; </script>";
    }
?>
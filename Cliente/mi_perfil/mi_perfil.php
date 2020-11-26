<?php
    include '../../conexion.php';
    session_start();
    if (!isset($_SESSION['rol'])){
        echo "<script> location.href='../login/frm_login.php'; </script>";

    }else{
        if($_SESSION['rol']!=2){
            echo "<script> location.href='../../index.php'; </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehículo</title>

    <!--importacion boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../img/icono-pag.png">

    <!-- Sweet alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <link rel="stylesheet" href="../../css/estilos.css">
</head>

<body class="bg-perfil">

    <div class="container col-12">
        <div class="form-veh col-12 col-md-6 col-lg-6 row">

            <form action="editar_perfil.php" method="POST">
                <div class="logo col-12">
                    <a href="<?php echo $URL ?>index.php">
                        <img src="../../img/logo.png" alt="">
                    </a>
                </div>

                <div class="text-center col-12 mb-4">
                    <h1>Mi perfil</h1>
                </div>

                <?php
                $sql=$conn ->query("SELECT * FROM tblcliente WHERE id_cliente='$_SESSION[id_cliente]'");

                $row=$sql->fetch_array();
            ?>

                <div class="form-row">
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="#">Nombres</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $row[1] ?>">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $row[2] ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="#">Cédula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $row[0] ?>" readonly>
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="">Celular</label>
                        <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $row[4] ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="#">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo $row[6] ?>">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $row[3] ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="#">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $row[5] ?>" readonly>
                    </div>
                </div>

                <div class="align-items-center text-center">
                    <button type="submit" class="btn-color">Editar</button>
                </div>

            </form>
        </div>
    </div>

    <?php
        if(isset($_GET['msg'])){
            if($_GET['msg']==1){
        ?>

        <script>
            Swal.fire('Actualizado correctamente')
        </script>

        <?php
            }else{
                if($_GET['msg']==2){
        ?>

        <script>
            Swal.fire('No se ha podido actualizar')
        </script>

        <?php
                }
            }
        }
        ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
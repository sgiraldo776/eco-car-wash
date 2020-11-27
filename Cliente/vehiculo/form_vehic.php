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
<html lang="es">

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

<body class="bg-img">

    <div class="container col-12">
        <div class="form-veh col-12 col-md-6 col-lg-6 row">

            <form action="ingresar_vehic.php" method="POST">
                <div class="logo col-12">
                    <a href="<?php echo $URL ?>">
                        <img src="../../img/logo.png" alt="">
                    </a>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="#">Placa</label>
                        <input type="text" class="form-control" id="placa" name="placa" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="#">Marca</label>
                        <input type="text" class="form-control" id="marca" name ="marca" required>
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="">Modelo</label>
                        <input type="number" class="form-control" id="modelo" name="modelo" min="1960" max="2050" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="#">Color</label>
                        <input type="text" class="form-control" id="color" name="color" required>
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="">Tipo de vehículo</label>
                        <select class="custom-select" name="tipo" id="tipo">
                        <option selected>--Seleccione una opción--</option>
                        <option value="Motocicleta">Motocicleta</option>
                        <option value="Motocarro">Motocarro</option>
                        <option value="Mototriciclo">Mototriciclo</option>
                        <option value="Cuatrimoto">Cuatrimoto</option>
                        <option value="Automóvil">Automóvil</option>
                        <option value="Campero">Campero</option>
                        <option value="Camioneta">Camioneta</option>
                        <option value="Microbús">Microbús</option>
                        <option value="Bus">Bus</option>
                        <option value="Buseta">Buseta</option>
                        <option value="Camión">Camión</option>
                        <option value="Tractocamión">Tractocamión</option>
                        <option value="Volqueta">Volqueta</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="#">Vencimiento del SOAT</label>
                        <input type="date" class="form-control" id="soat" name="soat" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="">Vencimiento de la Técnico Mecànica</label>
                        <input type="date" class="form-control" id="tecmeca" name="tecmeca" required>
                    </div>
                </div>

                <div class="align-items-center text-center">
                    <button type="submit" class="btn-color">Enviar</button>
                </div>

            </form>
        </div>
    </div>


    <?php
        if(isset($_GET['msg'])){
            if($_GET['msg']==1){
        ?>

        <script>
            Swal.fire('Ingresado correctamente')
        </script>

        <?php
            }else{
                if($_GET['msg']==2){
        ?>

        <script>
            Swal.fire('No se ha podido ingresar')
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
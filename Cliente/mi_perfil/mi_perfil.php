<?php
    include '../../conexion.php'
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

    <link rel="stylesheet" href="../../css/estilos.css">
</head>

<body class="bg-perfil">

    <div class="container col-12">
        <div class="form-veh col-12 col-md-6 col-lg-6 row">

            <form action="ingresar_vehic.php" method="POST">
                <div class="logo col-12">
                    <a href="<?php echo $URL ?>index.php">
                        <img src="../../img/logo.png" alt="">
                    </a>
                </div>

                <div class="text-center col-12 mb-4">
                    <h1>Mi perfil</h1>
                </div>

                <div class="form-row">
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="#">Nombres</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" >
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="#">Cédula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="">Celular</label>
                        <input type="text" class="form-control" id="celular" name="celular">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="#">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="#">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo">
                    </div>
                </div>

                <div class="align-items-center text-center">
                    <button type="submit" class="btn-color">Editar</button>
                    <button type="submit" class="btn-color">Enviar</button>
                </div>

            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
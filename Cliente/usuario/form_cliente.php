<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cliente</title>
    <!--importacion boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/f599362e7b.js" crossorigin="anonymous"></script>

    <link rel="icon" type="image/png" href="../../img/icono-pag.png">

    <link rel="stylesheet" href="../../css/estilos.css">

</head>

<body>

    <?php
include '../../conexion.php';

?>
        <nav class="bg-nav">
            <div class=" col-12 text-center">
                <a class="navbar-brand my-3" href="../../index.php">
                    <img src="../../img/logo-bla.png " style="width: 250px;">
                </a>
            </div>
        </nav>

        <div class="container mt-3">
            <form action="ingresar_cliente.php" method="POST" class="col-12">

                <div class="text-center mb-3">
                    <h2>Regístrate</h2>
                </div>

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombres" placeholder="Nombres">
                </div>
                <div class="form-group">
                    <label>Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
                </div>

                <div class="form-group">
                    <label>Número De Cédula</label>
                    <input type="text" class="form-control" name="identificacion" placeholder="Cédula ciudadanía">
                </div>

                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Dirección de residencia">
                </div>
                <div class="form-group">
                    <label>Celular</label>
                    <input type="text" class="form-control" name="celular" placeholder="Número de celular">
                </div>
                <div class="form-group">
                    <label>Correo</label>
                    <input type="email" class="form-control" name="correo" placeholder="Correo electronico">
                </div>

                <div class="form-group">
                    <label>Ciudad de residencia</label>
                    <input type="text" class="form-control" name="ciudad" placeholder="Ciudad de residencia">
                </div>

                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" class="form-control" name="contra1" placeholder="Contraseña">
                </div>
                <div class="form-group">
                    <label>Confirmar Contraseña</label>
                    <input type="password" class="form-control" name="contra2" placeholder="Confirmar contraseña">
                </div>

                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-color">Registrar</button>
                </div>

                <div class="col-12 text-center mb-4">
                    <a href="">¿Ya tienes cuenta?</a>
                </div>

            </form>

        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js " integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous ">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous ">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous ">
        </script>
</body>

<!-- <?php
//prueba de obtener hora del servidor
$hoy = date('y-m-d h:i A', time()-21600) ;
print_r($hoy);
?> -->

</html>
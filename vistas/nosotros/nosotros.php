<?php
    include('../../conexion.php');
    session_start();
        if(!isset($_SESSION['rol'])){
            include '../includes/header-inicio.php';
        }else{
            if($_SESSION['rol'] !=1 ){
                if($_SESSION['rol'] =2 ){
                    include '../includes/header-usuario.php';
                }else {
                    include '../includes/header-inicio.php';
                }
            }else {
                include '../includes/header-admin.php';
            }            
        }

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco Car Wash</title>

    <!--importacion boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/f599362e7b.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../../img/icono-pag.png">

    <link rel="stylesheet" href="../../css/estilos.css">
</head>

<body>

    <main>
        <div class="container my-5">
            <div class="row col-12">
                <div class="tarjetas p-md-3 col-12 col-md-4">
                    <div class="tar-img">
                        <img src="../../img/iconos-01.svg" alt="">
                    </div>
                    <h3>Objetivo</h3>
                    <p>Impactar a nuestros clientes a través de un servicio de limpieza y embellecimiento del vehículo
                    </p>
                </div>
                <div class="tarjetas p-md-3 col-12 col-md-4">
                    <div class="tar-img">
                        <img src="../../img/iconos-02.svg" alt="">
                    </div>
                    <h3>Misión</h3>
                    <p>Sorprender a nuestros clientes con la entrega de un vehículo limpio y lindo que exceda sus
                        expectativas.</p>
                </div>
                <div class="tarjetas p-md-3 col-12 col-md-4">
                    <div class="tar-img">
                        <img src="../../img/iconos-03.svg" alt="">
                    </div>
                    <h3>Visión</h3>
                    <p>Que nuestros clientes se sientan satisfechos, les guste nuestro servicio y nos visiten de forma
                        periódica.</p>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 text-lg-center text-center contac">
                    <h3 class="contac"><a href="<?php echo $URL; ?>vistas/contactenos/contacto.php">Contáctenos</a></h3>
                </div>
                <div class="col-lg-6 my-3 my-lg-0 text-lg-center text-center">
                    <a class="redes btn btn-social mx-3" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="redes btn btn-social mx-3" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="redes btn btn-social mx-3" href="#!"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="col-lg-3 text-lg-left text-center copy">
                    <div class="copy__img">
                        <h5>Apoyado por:</h5>
                        <img src="../../img/logo-tecno.png" alt="">
                    </div>
                    <div class="copy__texto">
                        ©Eco Car Wash
                        <?php echo date('Y'); ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
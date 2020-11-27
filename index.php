<?php
    include('conexion.php');
    session_start();
        if(!isset($_SESSION['rol'])){
            include 'vistas/includes/header-inicio.php';
        }else{
            if($_SESSION['rol'] !=1 ){
                if($_SESSION['rol'] =2 ){
                    include 'vistas/includes/header-usuario.php';
                }else {
                    include 'vistas/includes/header-inicio.php';
                }
            }else {
                include 'vistas/includes/header-admin.php';
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/f599362e7b.js" crossorigin="anonymous"></script>

    <link rel="icon" type="image/png" href="img/icono-pag.png">

    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <section class="bg-ind"></section>

    <div class="container text-center mt-5 ">

        <?php 
            $sel = $conn ->query("SELECT * FROM tblvideo where id='1'");

            while ($row=$sel->fetch_array()) {

            echo('<iframe width="854" height="480" src="'.$row[2].'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>');	
            }

            if (isset($_SESSION['rol'])) {
                if($_SESSION['rol']==1){
                    echo ' <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Cambiar Video
                    </button>';
                    
                }
            }
        ?>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cambiar Video</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <form action="admin/video/actu_video.php" method="post">
                                        <div class="form-group">
                                            <label>Nombre:</label>
                                            <input class="form-control" type="text" name="nombre">
                                        </div>
                                        <fieldset>
                                        <legend>vídeo</legend>
                                        <p>Inserte la url del video del video que aparece en la parte superior de la pagina de youtube</p>
                                        <div class="form-group">
                                            <label>URL Vídeo:</label>
                                            <input class="form-control" type="text" name="url">
                                        </div>
                                        </fieldset>
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

    
    </div> <!-- etiqueta contenedor -->

    <section class="">
        <br> <br>
    </section>

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
                <div class="col-lg-3 text-lg-left text-center copy">©Eco Car Wash</div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
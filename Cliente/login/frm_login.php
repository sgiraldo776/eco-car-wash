<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar</title>

    <!--importacion boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/f599362e7b.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../../img/icono-pag.png">

    <!-- Sweet alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <link rel="stylesheet" href="../../css/estilos.css">
</head>

<body class="bg-login">

    <div class="container m-0 p-0 col-12">
        <div class="form-veh col-12 col-md-6 col-lg-6 row">
        <form action="login.php" method="post">
                <div class="logo col-12">
                    <a href="../../index.php">
                        <img src="../../img/logo.png" alt="">
                    </a>
                </div>

                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="#">Correo</label>
                        <input type="email" class="form-control" name="correo">
                    </div>

                    <div class="form-group col-12">
                        <label for="">Contraseña</label>
                        <input type="password" class="form-control" name="contr">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-12 text-center">
                    <a href="#">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>

                <div class="align-items-center text-center">
                    <button type="submit" class="btn-color">Ingresar</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if(isset($_GET['msg'])){
        if($_GET['msg']==1){
    ?>

    <script>
        Swal.fire('Sesión cerrada correctamente')
    </script>

    <?php
        }else{
            if($_GET['msg']==2){
    ?>

    <script>
        Swal.fire('Datos incorrectos')
    </script>

    <?php
            }
        }
    }
    ?>
</body>

</html>
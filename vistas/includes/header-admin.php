<!DOCTYPE html>
<html lang="en">

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

    <link rel="icon" type="image/png" href="<?php echo $URL;?>img/icono-pag.png">

    <link rel="stylesheet" href="<?php echo $URL;?>css/estilos.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-nav">
        <div class="col-sm-3 text-center">
            <a class="navbar-brand" href="<?php echo $URL ?>index.php">
                <img src="<?php echo $URL ?>img/logo-bla.png" alt="">
            </a>
        </div>

        <button class="navbar-toggler col-sm-3 ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav hola ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="<?php echo $URL; ?>index.php">Inicio</span></a>
                </li>
                <div class="btn-group">
                    <button type="button" class="btn btn-invi dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                            Admin
                        </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                        <a href="<?php echo $URL;?>/admin/insumos/form_insumo.php"><button class="dropdown-item" type="button">Insumos</button></a>
                        <a href="<?php echo $URL; ?>admin/parqueadero/parqueadero-hra/form-parqueadero-hra.php"><button class="dropdown-item" type="button">Parqueo/Hora</button></a>
                        <a href="<?php echo $URL; ?>/admin/parqueadero/parqueadero-mes/form-parqueadero-mes.php"><button class="dropdown-item" type="button">Parqueo/Mes</button></a>
                        <a href="<?php echo $URL; ?>/admin/parqueadero/precios/precios.php"><button class="dropdown-item" type="button">Precios</button></a>
                        <a href="<?php echo $URL; ?>/admin/servicios/form_servicios.php"><button class="dropdown-item" type="button">Servicios</button></a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo $URL; ?>/Cliente/login/cerrar_sesion.php"><button class="dropdown-item" type="button">Cerrar Sesión</button></a>
                    </div>
                </div>
            </ul>
        </div>
    </nav>
</body>

</html>
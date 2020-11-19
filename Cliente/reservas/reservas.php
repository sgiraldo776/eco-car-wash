<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <!--importacion boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../img/icono-pag.png">

    <link rel="stylesheet" href="../../css/estilos.css">

</head>
<body>
    <div class="container">
        <form action="ingresar_reserva.php" method="POST" name="reservas">
        <div class="logo col-12">
            <a href="../../index.php">
                <img src="../../img/logo.png" alt="">
            </a>
        </div>
            <div>
                <h1>Reservar</h1>
            </div>
        <div class="row">
            <div class="form-group col">
                <label for="#">Servicio</label>
                <select name="servicio" id="servicio" class="form-control">
                    <option value="0">-Seleccione-</option>
                    <option value="revision">Revisión</option>
                    <option value="lavado">Lavado</option>
                </select>
            </div>
            <div class="form-group col">
                <label for="#">Documento de identidad</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12">
                <label for="#">Fecha de la Cita</label>
                <input type="datetime-local" class="form-control" name="fecha" id="fecha" onblur="myFunction()">
            </div>
        </div>

        <div class="align-items-center text-center">
            <button type="submit" class="btn-color">Reservar</button>
        </div>
        </form>
    </div>



    <!--JS de bootstrap-->
    <script
                src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
            <script
                src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
                crossorigin="anonymous"></script>
            <script
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
                integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
                crossorigin="anonymous"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <script type="text/javascript" src="js/validacion.js"></script>
    
</body>
</html>
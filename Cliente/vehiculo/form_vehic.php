<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--importacion boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../css/estilos.css">
</head>

<body class="bg-img">

    <div class="container col-12">
        <div class="form-veh col-12 col-md-6 col-lg-6 row">

            <form action="ingresar_vehic.php" method="POST">
                <div class="logo col-12">
                    <a href="">
                        <img src="../../img/logo.png" alt="">
                    </a>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="#">Placa</label>
                        <input type="text" class="form-control" id="placa" name="placa">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="#">Marca</label>
                        <input type="text" class="form-control" id="marca" name ="marca">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="">Modelo</label>
                        <input type="number" class="form-control" id="modelo" name="modelo" min="1960" max="2050">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="#">Color</label>
                        <input type="text" class="form-control" id="color" name="color">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-6">
                        <label for="">Tipo de vehiculo</label>
                        <select class="custom-select" name="tipo" id="tipo">
                        <option selected>--Seleccione una opción--</option>
                        <option value="1">Motocicleta</option>
                        <option value="2">Motocarro</option>
                        <option value="3">Mototriciclo</option>
                        <option value="4">Cuatrimoto</option>
                        <option value="5">Automóvil</option>
                        <option value="6">Campero</option>
                        <option value="7">Camioneta</option>
                        <option value="8">Microbús</option>
                        <option value="9">Bus</option>
                        <option value="10">Buseta</option>
                        <option value="11">Camión</option>
                        <option value="12">Tractocamión</option>
                        <option value="13">Volqueta</option>
                    </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="#">Vencimiento del SOAT</label>
                        <input type="date" class="form-control" id="soat" name="soat">
                    </div>
                    <div class="form-group col-12">
                        <label for="">Vencimiento de la Tecnico Mecanica</label>
                        <input type="date" class="form-control" id="tecmeca" name="tecmeca">
                    </div>
                </div>

                <div class="align-items-center text-center">
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
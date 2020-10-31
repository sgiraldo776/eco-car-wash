<?php
include '../../conexion.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cliente</title>
    <!--importacion boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    
    <div class="container">
        <form action="ingresar_cliente.php" method="post">

            <div class="form-group">
                <label>Numero De Cedula</label>
                <input type="text" class="form-control" name="identificacion" placeholder="Cedula Ciudadania">
            </div>

            <div class="form-group">
                <label>Nombre Clientes</label>
                <input type="text" class="form-control" name="nombres" placeholder="nombres">
            </div>
            <div class="form-group">
                <label>Apellidos</label>
                <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
            </div>
            <div class="form-group">
                <label>Direccion</label>
                <input type="text" class="form-control" name="direccion" placeholder="direccion de residencia">
            </div>
            <div class="form-group">
                <label>Celular</label>
                <input type="text" class="form-control" name="celular" placeholder="Telefono Celular">
            </div>
            <div class="form-group">
                <label>Correo</label>
                <input type="email" class="form-control" name="correo" placeholder="Correo Electronico">
            </div>

            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" class="form-control" name="contra1" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <label>Confirmar Contraseña</label>
                <input type="password" class="form-control" name="contra2" placeholder="Confirmar Contraseña">
            </div>
            
            <button type="submit" class="btn btn-color">Registrar</button>
        
        </form>
    
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
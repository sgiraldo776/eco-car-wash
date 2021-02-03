<?php
    include('../../conexion.php');
    session_start();
        if(!isset($_SESSION['rol'])){
            include '../../vistas/includes/header-inicio.php';
        }else{
            if($_SESSION['rol'] !=1 ){
                if($_SESSION['rol'] =2 ){
                    include '../../vistas/includes/header-usuario.php';
                }else {
                    include '../../vistas/includes/header-inicio.php';
                }
            }else {
                include '../../vistas/includes/header-admin.php';
            }            
        }

?>
<!DOCTYPE html>
<html lang="es">
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
        <div class="logo col-12">
            <a href="../../index.php">
                <img src="../../img/logo.png" alt="">
            </a>
        </div>
            <div>
                <h1>Reservas</h1>
            </div>
            <div class="tabla-admin mt-4">
                <table class="table table-hover">
                    <thead class="thead">
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Vehiculo</th>
                        <th>Placa</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                    </thead>
                    <?php 
                    $cliente = $_SESSION['id_cliente'];
                    $sel2 = $conn -> query("SELECT * FROM tblvehiculo WHERE Id_Cliente = $cliente");
                    while($fila2 = $sel2 -> fetch_assoc()){
                        $placa = $fila2['id_Vehiculo'];
                        $sel = $conn ->query("SELECT * FROM tblreservas WHERE placa = '$placa'");
                        while ($fila = $sel -> fetch_assoc()) {
                        ?>
                    <tr>
                        <td>
                            <?php echo $fila['title'] ?>
                        </td>
                        <td>
                            <?php echo $fila['tipoVehiculo'] ?>
                        </td>
                        <td>
                            <?php echo $fila['placa'] ?>
                        </td>
                        <td>
                            <?php echo $fila['descripcion'] ?>
                        </td>
                        <td>
                            <?php echo $fila['start'] ?>
                        </td>
                    </tr>
                    <?php }
                    }
                    ?>
                </table>
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
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
        <!-- bootrap inportacion -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="../../css/estilos.css">
        <!-- Ionic icons -->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        <!-- Sweet alerts -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        
        <link rel="icon" type="image/png" href="../../img/icono-pag.png">

        <title>Reservas</title>

</head>
<body>
            <div class="container formularios col-12 p-sm-5">
            <div class="text-center logo col-12">
                <a href="../../index.php">
                    <img src="../../img/logo.png" alt="" style="width: 60%">
                </a>
            </div>
            <div class="tabla-admin mt-4">
                <table class="table table-hover">
                    <thead class="thead">
                        <th>Placa</th>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <?php 
                        $cliente=$_SESSION['id_usuario'];
                        $sel=$conn->query("SELECT * FROM tblreservas WHERE Id_Cliente='$cliente'");
                        $cont=0;
                        while ($fila = $sel -> fetch_array()) {
                            $cont++;
                        ?>
                    <tr>
                        <td>
                            <?php echo $fila[3] ?>
                        </td>
                        <td>
                            <?php echo $fila[1] ?>
                        </td>
                        <td>
                            <?php echo $fila[4] ?>
                        </td>
                        <td>
                            <?php echo $fila[5] ?>
                        </td>
                        <td><button type="button" class="btn btn-color" onclick="preguntar('<?php echo $fila[0]?>')">Cancelar reserva</button></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>



        <script type="text/javascript">
        function preguntar(id){
            Swal.fire({
                title: "Cancelar reserva",
                text: "¿Desea cancelar la reserva?",
                icon: 'error',            
                showCancelButton: true,
                confirmButtonText: "Sí, cancelar reserva",
                cancelButtonText: "No, volver",
            })
            .then(resultado => {
                if (resultado.value) {
                    window.location.href="eliminar_reserva.php?id="+id
                } else {
                    // Dijeron que no
                    console.log("*NO se elimina*");
                }
            });

        }
        </script>


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


    
</body>
</html>
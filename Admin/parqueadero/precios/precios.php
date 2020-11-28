<?php
    require "../../../conexion.php";
    session_start();
    if (!isset($_SESSION['rol'])){
        echo "<script> location.href='../../index.php'; </script>";

    }else{
        if($_SESSION['rol']!=1){
            echo "<script> location.href='../../index.php'; </script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/estilos.css">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../../img/icono-pag.png">

    <!-- Sweet alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Parqueadero Hora</title>
</head>

<body>

    <section class="fixed-top">
            <nav class="navbar navbar-expand-lg navbar-light bg-nav">
                <div class="col-12 btn-group btn-block text-center">
                    <button type="button" class="btn btn-invi dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                                Formularios
                            </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-right" size="3">
                        <a href="../../insumos/form_insumo.php"><button class="dropdown-item" type="button">Insumos</button></a>
                        <a href="../parqueadero-hra/form-parqueadero-hra.php"><button class="dropdown-item" type="button">Parqueadero Hora</button></a>
                        <a href="../parqueadero-mes/form-parqueadero-mes.php"><button class="dropdown-item" type="button">Parqueadero Mes</button></a>
                        <a href="precios.php"><button class="dropdown-item" type="button">Precios Parqueadero</button></a>
                        <a href="../../servicios/form_servicios.php"><button class="dropdown-item" type="button">Servicios</button></a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo $URL; ?>/Cliente/login/cerrar_sesion.php"><button class="dropdown-item" type="button">Cerrar Sesiòn</button></a>
                    </div>
                </div>
                </ul>
            </nav>
        </section>


        <link rel="preconnect" href="https://fonts.gstatic.com"> <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet"> 

        <div class="container formularios col-12 mt-5 p-sm-5">
            <div class="stinky text-center mb-3">
                <h2 class="">Precios</h2>
            </div>
            <div>
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Tipo Parqueo</th>
                            <th scope="col">Precio</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        
                    $sel = $conn->query("SELECT * FROM tbltipoparqueo");

                    while ($row=$sel->fetch_array()) {
                    ?>
                        <tr>
                            <td><?php echo $row[1] ?></td>
                            <td><?php echo $row[2] ?></td>
                            <td><button class="btn btn-success" data-toggle="modal"
                                    data-target="#Modal1<?php echo $row[0]; ?>">Modificar Precio</button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal1<?php echo $row[0]; ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modificar precio</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="actualizar_precio.php?id=<?php echo $row[0];?>" name="add_form" method="post">
                                            <h3>Tipo de parqueo:</h3>
                                            <p><?php echo $row[1]?></p>
                                            <div class="form-group">
                                                <label>Precio</label>
                                                <input class="form-control" type="text" id="precio" name="precio" value="<?php echo $row[2] ?>">
                                            </div>                 
                                            <div class="form-group text-center mb-5">
                                                <button type="submit" class="btn btn-color">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php
        if(isset($_GET['msg'])){
            if($_GET['msg']==1){
        ?>

        <script>
            Swal.fire('Precio actualizado correctamente')
        </script>

        <?php
            }elseif($_GET['msg']==2){
        ?>

        <script>
            Swal.fire('Error, No se pudo actualizar el precio')
        </script>

        <?php
            }
        }
        ?>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
            integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
        </script>

        <!--validacion de capos vacios-->
        <script type="text/javascript" src="js/validacion.js"></script>
</body>

</html>
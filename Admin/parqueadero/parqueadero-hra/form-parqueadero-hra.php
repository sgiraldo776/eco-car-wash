<?php
    require "../../../conexion.php";
    session_start();
    if($_SESSION['rol']!=1){
        echo "<script> location.href='../../index.php'; </script>";
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/estilos.css">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../../img/icono-pag.png">
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
                        <a href="form-parqueadero-hra.php"><button class="dropdown-item" type="button">Parqueadero Hora</button></a>
                        <a href="../parqueadero-mes/form-parqueadero-mes.php"><button class="dropdown-item" type="button">Parqueadero Mes</button></a>
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
                <h2 class="">Ingresar Vehículo</h2>
            </div>
            <div>
                <form action="ingr-parqueadero-hra.php" method="post">
                    <div class="form-group">
                        <label>Tipo de Vehículo</label>
                        <select class="form-control" name="tipo">
                            <option value="Moto" selected disabled>- Seleccione -</option>
                            <option value="Moto">Moto</option>
                            <option value="Carro">Carro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Placa del vehículo</label>
                        <input class="form-control" type="text" name="placa">
                    </div>
                    <div class="form-group">
                        <label>Hora de Ingreso</label>
                        <input class="form-control" type="datetime-local" name="hora">
                        <small class="form-text text-muted">La hora de ingreso se rellena automáticamente</small>
                    </div>                  
                <div class="form-group text-center mb-5">
                    <button type="submit" class="btn btn-color">Registrar</button>
                </div>
                </form>
                <hr>
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Placa</th>
                            <th scope="col">Tipo vehículo</th>
                            <th scope="col">Hora de Ingreso</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $sel = $conn->query("SELECT p.num_factura,p.placa,p.tipo_vehiculo,p.hora_ingreso,tp.precio FROM tblparqueadero as p INNER JOIN tbltipoparqueo as tp ON p.id_parqueo=tp.id_parqueo WHERE p.id_parqueo=1 OR p.id_parqueo=4");

                    while ($row=$sel->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['placa'] ?></td>
                            <td><?php echo $row['tipo_vehiculo'] ?></td>
                            <td><?php echo $row['hora_ingreso'] ?></td>
                            <td><button class="btn btn-success" data-toggle="modal"
                                    data-target="#Modal1<?php echo $row['num_factura']; ?>">Retirar Vehículo</button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal1<?php echo $row['num_factura']; ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Datos de la Facturación:</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Placa del Vehículo: <div class="text-info"><?php echo $row['placa'] ?></div>
                                        Tipo de vehículo: <div class="text-info"><?php echo $row['tipo_vehiculo'] ?>
                                        </div>
                                        Hora de Ingreso: <div class="text-info"><?php echo $row['hora_ingreso'] ?></div>
                                        Hora de Salida: <div class="text-info"><?php echo Date('h:i') ?></div>
                                        <?php
                                        $fecha1= new DateTime($row['hora_ingreso']);
                                        $fecha2= new DateTime("now");
                                        $diff = $fecha1->diff($fecha2);

                                        if ($row['tipo_vehiculo'] =="Moto") {
                                            if (($diff->i)<=15) {
                                                echo "Se cobra Fracción de: <div class='text-info'>".$diff->i." min.</div>";
                                                ?>
                                        Valor Total: <div class="text-success">500</div>
                                        <?php
                                            }elseif(($diff->h)>=1){
                                                $val = $row['precio']*$diff->h;
                                                echo "Numero de Horas: <div class='text-info'>".$diff->h."</div>";
                                                ?>
                                        Valor Total: <div class="text-info"><?php echo $val?></div>
                                        <?php
                                            }elseif(($diff->i)>15){
                                                $val = $row['precio'];
                                                echo "Numero de Horas: <div class='text-info'>1</div>";
                                                ?>
                                        Valor Total: <div class="text-info"><?php echo $val?></div>
                                        <?php
                                            }
                                        }elseif ($row['tipo_vehiculo'] =="Carro") {
                                            if (($diff->i)<=15) {
                                                echo "Se cobra Fracción de: <div class='text-info'>".$diff->i." min.</div>";
                                                ?>
                                        Valor Total: <div class="text-success">800</div>
                                        <?php
                                            }elseif(($diff->h)>=1){
                                                $val = $row['precio']*$diff->h;
                                                echo "Numero de Horas: <div class='text-info'>".$diff->h."</div>";
                                                ?>
                                        Valor Total: <div class="text-info"><?php echo $val?></div>
                                        <?php
                                            }elseif(($diff->i)>15){
                                                $val = $row['precio'];
                                                echo "Numero de Horas: <div class='text-info'>1</div>";
                                                ?>
                                        Valor Total: <div class="text-info"><?php echo $val?></div>
                                        <?php
                                            }
                                        }
                                        
                                    ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">VOLVER</button>
                                        <a href="retirar-vehiculo.php?id=<?php echo $row['num_factura']; ?>"><button
                                                type="button" class="btn btn-danger">Retirar Vehículo</button></a>
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



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
            integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
        </script>
</body>

</html>
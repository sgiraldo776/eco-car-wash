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
    <title>Parqueadero hora</title>
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
                        <a href="form-parqueadero-hra.php"><button class="dropdown-item" type="button">Parqueadero hora</button></a>
                        <a href="../parqueadero-mes/form-parqueadero-mes.php"><button class="dropdown-item" type="button">Parqueadero mes</button></a>
                        <a href="../precios/precios.php"><button class="dropdown-item" type="button">Precios parqueadero</button></a>
                        <a href="../../servicios/form_servicios.php"><button class="dropdown-item" type="button">Servicios</button></a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo $URL; ?>/Cliente/login/cerrar_sesion.php"><button class="dropdown-item" type="button">Cerrar Sesión</button></a>
                    </div>
                </div>
                </ul>
            </nav>
        </section>


        <link rel="preconnect" href="https://fonts.gstatic.com"> <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet"> 

        <div class="container formularios col-12 mt-5 p-sm-5">
            <div class="stinky text-center mb-3">
                <h2 class="">Ingresar vehículo</h2>
            </div>
            <div>
                <form action="ingr-parqueadero-hra.php" name="add_form" method="post">
                    <div class="form-group">
                        <label>Tipo de Vehículo</label>
                        <select class="form-control" id="tipo" name="tipo">
                            <option value="0" selected >- Seleccione -</option>
                            <option value="Moto">Moto</option>
                            <option value="Carro">Carro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Placa del vehículo</label>
                        <input class="form-control" type="text" id="placa" name="placa">
                    </div>
                    <div class="form-group">
                        <label>Hora de Ingreso</label>
                        <input class="form-control" type="datetime-local" id="hora" name="hora">
                        <small class="form-text text-muted">La hora de ingreso se rellena automáticamente</small>
                    </div>                  
                <div class="form-group text-center mb-5">
                    <button type="button" class="btn btn-color">Registrar</button>
                </div>
                </form>
                <hr>

                <div class="contenedor">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-3 buscador busc">
                            <form action="form-parqueadero-hra.php" method="POST">
                                <input type="text" name="buscar" placeholder="Buscar" class="buscar">
                                    <button class="boton-buscar" type="submit" value="buscar">
                                    <img src="../../../img/buscar.svg"></button>
                            </form>
                        </div>
                    </div>
                </div>

                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Placa</th>
                            <th scope="col">Tipo vehículo</th>
                            <th scope="col">Hora de ingreso</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $buscar = "";
                        if(!isset($_POST['buscar'])){
                            $_POST['buscar'] = "";
                            $buscar = $_POST['buscar'];
                        }
                        $buscar = $_POST['buscar'];

                        if($buscar == "" ){
                    $sel = $conn->query("SELECT p.num_factura,p.placa,p.tipo_vehiculo,p.hora_ingreso,tp.precio FROM tblparqueadero as p INNER JOIN tbltipoparqueo as tp ON p.id_parqueo=tp.id_parqueo WHERE p.id_parqueo=1 OR p.id_parqueo=4");
                        }else{
                            $sel = $conn->query("SELECT p.num_factura,p.placa,p.tipo_vehiculo,p.hora_ingreso,tp.precio FROM tblparqueadero as p INNER JOIN tbltipoparqueo as tp ON p.id_parqueo=tp.id_parqueo WHERE (p.id_parqueo=1 OR p.id_parqueo=4) AND placa='$buscar'");
                        }
                    while ($row=$sel->fetch_array()) {
                    ?>
                        <tr>
                            <td><?php echo $row[1] ?></td>
                            <td><?php echo $row[2] ?></td>
                            <td><?php echo $row[3] ?></td>
                            <td><button class="btn btn-success" data-toggle="modal"
                                    data-target="#Modal1<?php echo $row['num_factura']; ?>">Retirar vehículo</button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal1<?php echo $row['num_factura']; ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Datos de la facturación:</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Placa del vehículo: <div class="text-info"><?php echo $row['placa'] ?></div>
                                        Tipo de vehículo: <div class="text-info"><?php echo $row['tipo_vehiculo'] ?>
                                        </div>
                                        Hora de ingreso: <div class="text-info"><?php echo $row['hora_ingreso'] ?></div>
                                        Hora de salida: <div class="text-info"><?php echo Date('Y-m-d h:i') ?></div>
                                        <?php
                                        $fecha1= new DateTime($row['hora_ingreso']);
                                        $fecha2= new DateTime("now");
                                        $diff = $fecha1->diff($fecha2);
                                        
                                        if (($diff->d)<1) {
                                            if ($row['tipo_vehiculo'] =="Moto") {
                                                if (($diff->h)<1 && ($diff->i)<=15) {
                                                    echo "Se cobra Fracción de: <div class='text-info'>".$diff->i." min.</div>";
                                                    $preci = $conn->query("SELECT precio FROM tbltipoparqueo WHERE id_parqueo='8'");
                                                    while ($fila=$preci->fetch_array()) {
                                                    ?>
                                                    Valor Total: <div class="text-success"><?php echo $fila['precio']?></div>
                                            <?php
                                                    }
                                                }elseif(($diff->h)>=1){
                                                    $val = $row['precio']*$diff->h;
                                                    echo "Numero de Horas: <div class='text-info'>".$diff->h."</div>";
                                                    ?>
                                                    Valor Total: <div class="text-info"><?php echo $val?></div>
                                            <?php
                                                }elseif(($diff->h)<1 && ($diff->i)>15){
                                                    $val = $row['precio'];
                                                    echo "Numero de Horas: <div class='text-info'>1</div>";
                                                    ?>
                                                    Valor Total: <div class="text-info"><?php echo $val?></div>
                                            <?php
                                                }
                                            }elseif ($row['tipo_vehiculo'] =="Carro") {
                                                if (($diff->h)<1 && ($diff->i)<=15) {
                                                    echo "Se cobra Fracción de: <div class='text-info'>".$diff->i." min.</div>";
                                                    $preci = $conn->query("SELECT precio FROM tbltipoparqueo WHERE id_parqueo='7'");
                                                    while ($fila=$preci->fetch_array()) {
                                                    ?>
                                                    Valor Total: <div class="text-success"><?php echo $fila['precio']?></div>
                                            <?php
                                                    }
                                                }elseif(($diff->h)>=1){
                                                    $val = $row['precio']*$diff->h;
                                                    echo "Numero de Horas: <div class='text-info'>".$diff->h."</div>";
                                                    ?>
                                                    Valor Total: <div class="text-info"><?php echo $val?></div>
                                            <?php
                                                }elseif(($diff->h)<1 && ($diff->i)>15){
                                                    $val = $row['precio'];
                                                    echo "Numero de Horas: <div class='text-info'>1</div>";
                                                    ?>
                                                    Valor Total: <div class="text-info"><?php echo $val?></div>
                                            <?php
                                                }
                                            }
                                        }else{
                                            if ($row['tipo_vehiculo'] =="Moto") {
                                                if (($diff->h)<1 && ($diff->i)<=59) {
                                                    $preci = $conn->query("SELECT precio FROM tbltipoparqueo WHERE id_parqueo='5'");
                                                    while ($fila=$preci->fetch_array()) {
                                                        $val = $fila['precio']*($diff->d);
                                                        echo "Numero de dias: <div class='text-info'>".$diff->d."</div>";
                                                    }
                                                    ?>
                                                    Valor Total: <div class="text-info"><?php echo $val?></div>
                                            <?php
                                                }elseif(($diff->h)<=23){
                                                    $preci = $conn->query("SELECT precio FROM tbltipoparqueo WHERE id_parqueo='4'");
                                                    while ($fila=$preci->fetch_array()) {
                                                        $tot1 = $fila['precio']*($diff->h);
                                                    }
                                                    $preci = $conn->query("SELECT precio FROM tbltipoparqueo WHERE id_parqueo='5'");
                                                    while ($fila=$preci->fetch_array()) {
                                                        $tot2 = $fila['precio']*($diff->d);
                                                    }
                                                    $val = $tot1 + $tot2;
                                                    echo "Numero de días y horas: <div class='text-info'>".$diff->d." días y ".$diff->h." horas</div>";
                                                    ?>
                                                    Valor Total: <div class="text-info"><?php echo $val?></div>
                                            <?php
                                                // }elseif(($diff->i)>1380){
                                                //     $val = $row['precio']*((($diff->d)*24)+24);
                                                //     echo "Numero de Horas: <div class='text-info'>".(($diff->d)+1)."</div>";
                                                    ?>
                                                    <!-- Valor Total: <div class="text-info"><?php // echo $val?></div> -->
                                            <?php
                                                }
                                            }elseif ($row['tipo_vehiculo'] =="Carro") {
                                                if (($diff->h)<1 && ($diff->i)<=59) {
                                                    $preci = $conn->query("SELECT precio FROM tbltipoparqueo WHERE id_parqueo='3'");
                                                    while ($fila=$preci->fetch_array()) {
                                                        $val = $fila['precio']*($diff->d);
                                                        echo "Numero de dias: <div class='text-info'>".$diff->d."</div>";
                                                    }
                                                    ?>
                                                    Valor Total: <div class="text-info"><?php echo $val?></div>
                                            <?php
                                                }elseif(($diff->h)<=23){
                                                    $preci = $conn->query("SELECT precio FROM tbltipoparqueo WHERE id_parqueo='1'");
                                                    while ($fila=$preci->fetch_array()) {
                                                        $tot1 = $fila['precio']*($diff->h);
                                                    }
                                                    $preci = $conn->query("SELECT precio FROM tbltipoparqueo WHERE id_parqueo='3'");
                                                    while ($fila=$preci->fetch_array()) {
                                                        $tot2 = $fila['precio']*($diff->d);
                                                    }
                                                    $val = $tot1 + $tot2;
                                                    echo "Numero de días y horas: <div class='text-info'>".$diff->d." días y ".$diff->h." horas</div>";
                                                    ?>
                                                    Valor total: <div class="text-info"><?php echo $val?></div>
                                            <?php
                                                // }elseif(($diff->i)>1380){
                                                //     $val = $row['precio']*((($diff->d)*24)+24);
                                                //     echo "Numero de dias: <div class='text-info'>".(($diff->d)+1)."</div>";
                                                    ?>
                                                    <!-- Valor Total: <div class="text-info"><?php // echo $val?></div> -->
                                            <?php
                                                }
                                            }
                                        }
                                        ?>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">Volver</button>
                                        <a href="retirar-vehiculo.php?id=<?php echo $row['num_factura']; ?>"><button
                                                type="button" class="btn btn-danger">Retirar vehículo</button></a>
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
            Swal.fire('Ingresado correctamente')
        </script>

        <?php
            }else{
                if($_GET['msg']==2){
        ?>

        <script>
            Swal.fire('No se ha podido ingresar')
        </script>

        <?php
                }else{
                    if($_GET['msg']==3){
        ?>

        <script>
            Swal.fire('Vehículo retirado correctamente')
        </script>

        <?php
                    }else{
                        if($_GET['msg']==4){
        ?>

        <script>
            Swal.fire('Error, no se retiró el vehículo correctamente')
        </script>

        <?php
                        }
                    }
                }
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
<?php
    include '../../conexion.php';

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
        <!-- bootrap inportacion -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="../../css/estilos.css">
        <!-- Ionic icons -->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        
        <link rel="icon" type="image/png" href="../../img/icono-pag.png">

        <title>Mi vehículo</title>
    </head>

    <body>

        <div class="container formularios col-12 p-sm-5">
            <form action="ingresar_vehic.php" method="POST">
                <div class="text-center logo col-12">
                    <a href="">
                        <img src="../../img/logo.png" alt="" style="width: 60%">
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
                        <label for="">Tipo de vehículo</label>
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
                        <label for="">Vencimiento de la Técnico Mecànica</label>
                        <input type="date" class="form-control" id="tecmeca" name="tecmeca">
                    </div>
                </div>

                <div class="align-items-center text-center">
                    <button type="submit" class="btn-color">Enviar</button>
                </div>

            </form>

            <div class="tabla-admin mt-4">
                <table class="table table-hover">
                    <thead class="thead">
                        <th>Id</th>
                        <th>Cantidad</th>
                        <th>Descripción</th>
                        <th>Valor Unitario</th>
                        <th>Valor Total</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <?php 
                        $sel = $conn ->query("SELECT * FROM tblInsumo_Repuesto ");
                        $cont=0;
                        while ($fila = $sel -> fetch_assoc()) {
                            $cont++;
                        ?>
                    <tr>
                        <td>
                            <?php echo $fila['Id_Insumo'] ?>
                        </td>
                        <td>
                            <?php echo $fila['Cantidad'] ?>
                        </td>
                        <td>
                            <?php echo $fila['Descripcion'] ?>
                        </td>
                        <td>
                            <?php echo $fila['Vlr_Unitario'] ?>
                        </td>
                        <td>
                            <?php echo $fila['Vlr_Total'] ?>
                        </td>
                        <td><a href="eliminar_insumo.php?Id_Insumo=<?php echo $fila['Id_Insumo'] ?>">ELIMINAR</a></td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $cont; ?>" id="ingresar">Salida Insumo</button></td>

                    </tr>
                    <div class="modal" tabindex="-1" role="dialog" id="modal<?php echo $cont; ?>">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Salida del Insumo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">


                                    <form action="restar_insumo.php?Id_Insumo=<?php echo $fila['Id_Insumo']?>" method="post">
                                        <label>Código</label>
                                        <input type="text" name="codigo" value="<?php echo $fila['Id_Insumo'] ?>" disabled>
                                        <label>Nombre Producto</label>
                                        <input type="text" name="nombre" value="<?php echo $fila['Descripcion'] ?>" disabled>
                                        <label>cantidad vendida</label>
                                        <input type="text" name="cantidad">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </table>
            </div>


        </div>

        </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>

    </html>
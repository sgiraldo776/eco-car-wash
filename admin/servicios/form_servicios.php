<?php
    require_once "../../conexion.php";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/estilos.css">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../img/icono-pag.png">

    <!-- Sweet alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>Formulario Servicios</title>
</head>
<body>

<section class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-nav">
            <div class="col-12 btn-group btn-block text-center">
                <button type="button" class="btn btn-invi dropdown-toggle" data-toggle="dropdown" data-display="static"
                    aria-haspopup="true" aria-expanded="false">
                    Formularios
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-right" size="3">
                    <a href="../insumos/form_insumo.php"><button class="dropdown-item"
                            type="button">Insumos</button></a>
                    <a href="../parqueadero/parqueadero-hra/form-parqueadero-hra.php"><button class="dropdown-item" type="button">Parqueadero
                            Hora</button></a>
                    <a href="../parqueadero/parqueadero-mes/form-parqueadero-mes.php"><button class="dropdown-item"
                            type="button">Parqueadero Mes</button></a>
                    <a href="../parqueadero/precios/precios.php"><button class="dropdown-item" type="button">Precios Parqueadero</button></a>
                    <a href="form_servicios.php"><button class="dropdown-item"
                            type="button">Servicios</button></a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo $URL; ?>/Cliente/login/cerrar_sesion.php"><button class="dropdown-item" type="button">Cerrar Sesión</button></a>
                </div>
            </div>
            </ul>
        </nav>
    </section>

        <div class="container formularios col-12 mt-5 p-sm-5">
        <div class="container">
            <div class="stinky text-center mb-3">
                <h2 class="">Agregar Servicios Ofertados</h2>
            </div>
        <form action="insertar_servicios.php" name="add_form" method="post">
            <div class="form-group">
                <label> Tipo de servicio: </label>
                <select class="form-control" name="Tipo_Servicio" id="Tipo_Servicio">
                    <option value="Reparacion">Reparación</option>
                    <option value="Lavado">Lavado</option>
                </select>
            </div>
            <div class="form-group">
                <label> Nombre del servicio: </label>
                <input type="text" id="Servicio" name="Servicio" class="form-control" placeholder="Tipo de servicio">
            </div>
            <div class="form-group">
                <label> Descripción del servicio: </label>
                <textarea id="Descripcion" name="Descripcion" class="form-control" cols="30" rows="10" placeholder="Descripcion del servicio"></textarea>
            </div>
            <div class="form-group">
                <label> Valor del servicio: </label>
                <input type="text" class="form-control" id="Valor" name="Valor" placeholder="Valor del servicio">
            </div>            
            <div class="form-group text-center mb-5">
                    <button type="button" class="btn btn-color">Registrar</button>
                </div>
        </form>

        <div class="mt-4">
            <table class="table table-hover">
                <thead class="thead">
                    <th>id</th>
                    <th>Servicio</th>
                    <th>Descripción</th>
                    <th>Valor</th>
                    <th></th>
                    <th></th>
                </thead>
                <?php 
                $sel = $conn ->query("SELECT * FROM tblservicios_ofertados ");
                while ($fila = $sel -> fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $fila['Id_Servicio'] ?></td>
                    <td><?php echo $fila['Servicio'] ?></td>
                    <td><?php echo $fila['Descripcion'] ?></td>
                    <td><?php echo $fila['Valor'] ?></td>
                    <td><a href="frm_actu_padecimiento.php?padecimientoid=<?php echo $fila['padecimientoid'] ?>"><button class="btn btn-primary">EDITAR</button></a></td>
                    <td><a href="#" onclick="preguntar(<?php echo $fila['Id_Servicio']?>)"><button class="btn btn-primary">ELIMINAR</button></a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        function preguntar(id){
            Swal
            .fire({
                title: "¿Eliminar servicio?",
                text: "¿Estas seguro de eliminar el servicio ofertado?",
                icon: 'error',            
                showCancelButton: true,
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar",
            })
            .then(resultado => {
                if (resultado.value) {
                    // Hicieron click en "Sí"
                    //console.log("*se elimina la venta*");
                    window.location.href="eliminar_servicios.php?Id_Servicio="+id
                } else {
                    // Dijeron que no
                    console.log("*NO se elimina*");
                }
            });

        }
        </script>

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
            Swal.fire('Eliminado correctamente')
        </script>

        <?php
                    }else{
                        if($_GET['msg']==4){
        ?>

        <script>
            Swal.fire('Error, no se ha podido eliminar')
        </script>

        <?php
                        }
                    }
                }
            }
        }
        ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <!--validacion de capos vacios-->
    <script type="text/javascript" src="js/validacion.js"></script>
</body>
</html>
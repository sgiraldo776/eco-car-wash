
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->

    <script src="<?php echo $URL;?>calendar/js/jquery.min.js"></script>
    <script src="<?php echo $URL;?>calendar/js/moment.min.js"></script>
    <!-- Full Calendar -->
    <link rel="stylesheet" href="<?php echo $URL;?>calendar/css/fullcalendar.min.css">
    <script src="<?php echo $URL;?>calendar/js/fullcalendar.min.js"></script>
    <script src="<?php echo $URL;?>calendar/js/es.js"></script>
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script> -->

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12"><div id="calendario"></div></div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="servicio"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div id="hora"></div>
            <div id="vehiculo"></div>
            <div id="placa"></div>
            <div id="descripcion"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function(){
            $('#calendario').fullCalendar({
                header:{
                    left:'today, prev,next',
                    center:'title',
                    right:'month,basicWeek,basicDay'
                },
                events:'http://localhost/GIT/eco-car-wash/calendar/eventos.php',
                eventClick:function(calEvent,jsEvent,view){
                    $('#servicio').html(calEvent.title);
                    $('#hora').html(calEvent.start);
                    $('#vehiculo').html(calEvent.tipoVehiculo);
                    $('#placa').html(calEvent.placa);
                    $('#descripcion').html(calEvent.descripcion);
                    $("#Modal").modal();
                }
            });
        });
    </script>
</body>
</html>
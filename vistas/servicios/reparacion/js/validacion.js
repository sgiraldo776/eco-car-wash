$(document).ready(function(){
    $("#fecha").change(function(){
        var hoy= new Date();
        var fecha=$('#fecha').val();
        var fechaFormulario=Date.parse(fecha);			
        if (hoy < fechaFormulario) {
              //alert("Fecha a partir de hoy");
        }else {
            Swal.fire('No se puede seleccionar una fecha pasada, ni la hora actual');
            $('#fecha').val('');
        }
    });
});

$(function(){
    $(".enviar").on('click', function(){
        var formulario=document.add_form;

            if($('#vehiculo').val() != 0){
                if($('#fecha').val() != ""){
                        formulario.submit();
                }else{
                    Swal.fire({
                    icon: 'warning',
                    title: 'Error',
                    text: 'No ha ingresado la fecha de lavado',
                    });
                    $('#fecha').focus().addClass("is-invalid");
                }

            }else{
            Swal.fire({
            icon: 'warning',
            title: 'Error',
            text: 'No ha ingresado el vehículo',
            });
            $('#vehiculo').focus().addClass("is-invalid");
            }

    });
});
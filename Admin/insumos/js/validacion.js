$(function(){
    $(".btn-color").on('click', function(){
        var formulario=document.add_form;

        if($('#cantidad').val() != ""){
            if($('#descripcion').val() != ""){
                if($('#valorunitario').val() != ""){
                    formulario.submit();
                }else{
                Swal.fire({
                icon: 'warning',
                title: 'Error',
                text: 'No ha ingresado el valor del producto',
                });
                $('#valorunitario').focus().addClass("is-invalid");
            }

            }else{
                Swal.fire({
                icon: 'warning',
                title: 'Error',
                text: 'No ha ingresado la descripción del producto',
                });
                $('#descripcion').focus().addClass("is-invalid");
            }

        }else {
            Swal.fire({
            icon: 'warning',
            title: 'Error',
            text: 'No ha ingresado la cantidad del producto',
            });
            $('#cantidad').focus().addClass("is-invalid");
        }

    });
});
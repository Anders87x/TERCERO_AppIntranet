var tabla;

function init(){
   
}

$(document).ready(function(){
    var correo = $('#usercorreox').val();
    var clave = $('#userclax').val();

    $('#cmbdoc').select2();
    $('#cmbtipo').select2();
    $('#cmbmes').select2();
    $('#cmbano').select2();

    var usu_id = $("#useridx").val();

    $("#cmbdoc").change(function(){
        $("#cmbtipo").html('');
        $("#cmbdoc option:selected").each(function () {
            cmbdoc = $(this).val();
            if (cmbdoc=="TVL"){
                $('#cmbtipo').append('<option value=LOC>Local</option>');
                $('#cmbtipo').append('<option value=NAC>Nacional</option>');

                $('#lbletiqueta').html('Tipo de servicio');

                /*$.post("../../controller/servicio.php?op=combo_cliente_home", function(data, status){
                    $("#cmbtipo").html(data);
                });

                $('#lbletiqueta').html('Tipo de Documento');*/
            }else{
                $.post("../../controller/servicio.php?op=combo_cliente_home", function(data, status){
                    $("#cmbtipo").html(data);
                });

                $('#lbletiqueta').html('Tipo de Documento');
            }
        });
    });

    var fecha = new Date();
    var mes = fecha.getMonth()+1;
    var ano = fecha.getUTCFullYear();

    $('#cmbmes').val(mes).trigger('change');
    $('#cmbano').val(ano).trigger('change');

    tabla= $('#data_home').DataTable({
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [		          
            'copyHtml5',
            'excelHtml5',
            'pdfHtml5'
        ],
        "ajax":{
            url: '../../controller/servicio.php?op=listar_home_derecha',
            type : "post",
            dataType : "json",
            data : {usu_id : usu_id,mes : mes,ano : ano},						
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "ordering": false,
        'rowsGroup': [0],
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 100,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {          
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });

    //Por Retornar - Confirmado
    $.post("../../controller/servicio.php?op=home_texto1",{usu_id : usu_id,mes : mes,ano : ano,parametro : '15'}, function(data, status){
        if ( data.length == 0 ) {
            
        }else{
            data = JSON.parse(data);
            $('#txthome1').html(data.nnumero_atenciones);	    
        }
    }); 

    //Por Confirmar - Estado Normal
    $.post("../../controller/servicio.php?op=home_texto1",{usu_id : usu_id,mes : mes,ano : ano,parametro : '01'}, function(data, status){
        if ( data.length == 0 ) {
            
        }else{
            data = JSON.parse(data);
            $('#txthome2').html(data.nnumero_atenciones);	
        } 
    });

});

$(document).on("click","#btnbuscar1", function(){
    var usu_id = $("#useridx").val();
    var mes = $('#cmbmes').val();
    var ano = $('#cmbano').val();

    $("#txthome1").html('0');
    $("#txthome2").html('0');

    if (mes.length == 0 || ano.length == 0){
        Swal.fire('Campos vacios!','Por favor Verificar','error');
    }else{
        tabla= $('#data_home').DataTable({
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            buttons: [		          
                'copyHtml5',
                'excelHtml5',
                'pdfHtml5'
            ],
            "ajax":{
                url: '../../controller/servicio.php?op=listar_home_derecha',
                type : "post",
                dataType : "json",
                data : {usu_id : usu_id,mes : mes,ano : ano},						
                error: function(e){
                    console.log(e.responseText);	
                }
            },
            "ordering": false,
            'rowsGroup': [0],
            "bDestroy": true,
            "responsive": false,
            "bInfo":true,
            "iDisplayLength": 100,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {          
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });

        var parametro = '15'; //Por Retornar - Confirmado
        console.log(usu_id,mes,ano,parametro);
        $.post("../../controller/servicio.php?op=home_texto1",{usu_id : usu_id,mes : mes,ano : ano,parametro : parametro}, function(datax, status){
            datax = JSON.parse(datax);
            $('#txthome1').html(datax.nnumero_atenciones);
           
            $.post("../../controller/servicio.php?op=sumar_cantidad",{usu_id : usu_id,mes : mes,ano : ano,parametro : parametro}, function(data, status){
                data = JSON.parse(data);
                var porcentaje= (datax.nnumero_atenciones / data.total_nnumero_atenciones) * 100;
                
                $("#crltext1").val(Math.round(porcentaje) + '%'); 
                $("#crltext1").trigger('change');
            }); 
        }); 
        
        var parametro = '01'; //Por Confirmar - Estado Normal
        $.post("../../controller/servicio.php?op=home_texto1",{usu_id : usu_id,mes : mes,ano : ano,parametro : parametro}, function(datax, status){
            datax = JSON.parse(datax);
            $('#txthome2').html(datax.nnumero_atenciones);
           
            $.post("../../controller/servicio.php?op=sumar_cantidad",{usu_id : usu_id,mes : mes,ano : ano,parametro : parametro}, function(data, status){
                data = JSON.parse(data);
                var porcentaje= (datax.nnumero_atenciones / data.total_nnumero_atenciones) * 100;
                
                $("#crltext2").val(Math.round(porcentaje) + '%'); 
                $("#crltext2").trigger('change');
            }); 
        });
    } 
});

$(document).on("click","#btncambiar", function(){
    var pass1 = $('#txtpass1').val();
    var pass2 = $('#txtpass2').val();

    if (pass1.length == 0 || pass2.length == 0 ){
        Swal.fire('Campos vacios!','Por favor Verificar','error');
    }else{
        if (pass1 == pass2){
            var clave = $('#txtpass1').val();
            var correo = $('#usercorreox').val();
            $.post("../../controller/servicio.php?op=actualiza_clave",{correo : correo,clave : clave}, function(data, status){
                console.log(data);
                Swal.fire('Contraseña Actualizada!','Guardado Correctamente','success');
                $('#txtpass1').val('');
                $('#txtpass2').val('');
                $("#modalcontra").modal("hide");   
            });
        }else{
            Swal.fire('Contraseñas Diferentes!','Por favor Verificar','error');
        }
    }
});

$(document).on("click","#btnbuscar2", function(){
    var usu_id = $("#useridx").val();
    var documento = $('#cmbdoc').val();
    var tipo = $('#cmbtipo').val();
    var seriecorrelativo = $('#txtcorrelativo').val();

    $("#txthome1").html('0');
    $("#txthome2").html('0');

    if (documento.length == 0 || tipo.length == 0 || seriecorrelativo.length == 0){
        Swal.fire('Campos vacios!','Por favor Verificar','error');
    }else{
        $.post("../../controller/servicio.php?op=buscar_guia_01",{usu_id : usu_id,documento : documento,tipo : tipo,seriecorrelativo : seriecorrelativo}, function(data, status){
            console.log(data);
            if ( data.length == 0 ) {
                swal({
                    title: 'Error',
                    text: 'Documento No Encontrado!',
                    icon: 'error',
                    buttons: {
                        confirm: {
                            text: 'Cerrar',
                            value: true,
                            visible: true,
                            className: 'btn btn-danger',
                            closeModal: true
                        }
                    }
                });
            }else{
                data = JSON.parse(data);
                $(location).attr('href','../Seguimiento/?tipo='+ data.stipo_documento_codigo +'&serie='+ data.sguia_serie +'&correlativo='+ data.sguia_correlativo +'');   
            }
        });
    }
});

$(document).on("click","#btnlimpiar", function(){
    $('#cmbdoc').val(0).trigger('change');
    $("#cmbtipo").html('<option values=0>Seleccione</option>');
    $("#txtcorrelativo").val('');
});

function buscarpanelderecho(stipo_servicio_codigo,sruta_origen_descripcion,sruta_destino_descripcion){
    var mes = $('#cmbmes').val();
    var ano = $('#cmbano').val();
    $(location).attr('href','../Servicios/?tipo='+ stipo_servicio_codigo.replace(/\s+/, "") +'&origen='+ sruta_origen_descripcion +'&destino='+ sruta_destino_descripcion +'&mes='+ mes +'&ano='+ ano +'');   
}

$(document).on("click","#btnirconfirmar", function(){
    var mes = $('#cmbmes').val();
    var ano = $('#cmbano').val();
    $(location).attr('href','../Servicios/?estado=01&mes='+ mes +'&ano='+ ano +'');   
});

$(document).on("click","#btnirretornar", function(){
    var mes = $('#cmbmes').val();
    var ano = $('#cmbano').val();
    $(location).attr('href','../Servicios/?estado=15&mes='+ mes +'&ano='+ ano +'');   
});

$(document).on("click","#btnmicuenta", function(){
    $("#btncerrarcambiar").css("display", "block");
    $("#modalcontra").modal("show");  
});

init();
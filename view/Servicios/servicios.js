
function init(){
    
}

$(document).ready(function(){
    $('#cmbest').select2({dropdownAutoWidth : true});
    $('#cmborigen').select2({dropdownAutoWidth : true});
    $('#cmbdestino').select2({dropdownAutoWidth : true});
    $('#cmbtipo').select2({dropdownAutoWidth : true});
    $('#cmbmes').select2({dropdownAutoWidth : true});
    $('#cmbano').select2({dropdownAutoWidth : true});

    $("#cmbtipo").change(function(){
        $("#cmborigen").html('');
        $("#cmbdestino").html('');
        $("#cmbtipo option:selected").each(function () {
            tipo = $(this).val();
            if (tipo=="LOC"){
                $.post("../../controller/servicio.php?op=combo_origen_destino",{tipo : tipo},function(data, status){
                    $("#cmborigen").html(data);
                });

                $.post("../../controller/servicio.php?op=combo_origen_destino",{tipo : tipo},function(data, status){
                    $("#cmbdestino").html(data);
                });
            }else{
                $.post("../../controller/servicio.php?op=combo_origen_destino",{tipo : tipo},function(data, status){
                    $("#cmborigen").html(data);
                });

                $.post("../../controller/servicio.php?op=combo_origen_destino",{tipo : tipo},function(data, status){
                    $("#cmbdestino").html(data);
                });
            }
        });
    });

    var usu_id = $("#useridx").val();
    var tipo = getUrlParameter('tipo');
    var origen = getUrlParameter('origen');
    var destino = getUrlParameter('destino');
    var estado = getUrlParameter('estado');
    var mes = getUrlParameter('mes');
    var ano =getUrlParameter('ano');

    if (tipo === undefined) {
        tipo='';
    }

    if (origen === undefined) {
        origen='';
    }

    if (destino === undefined) {
        destino='';
    }

    if (estado === undefined) {
        estado='';
    }
 
    if (mes === undefined) {
        mes='';
    }
 
    if (ano === undefined) {
        ano='';
    }

    console.log(usu_id);
    console.log(tipo);
    console.log(origen);
    console.log(destino);
    console.log(estado);
    console.log(mes);
    console.log(ano);

    tabla= $('#data_home').DataTable({
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [		          
            'copy',
            'print',
            'pdf'
        ],
        "ajax":{
            url: '../../controller/servicio.php?op=listar_servicio_solicitado',
            type : "post",
            dataType : "json",
            data : {usu_id : usu_id,tipo : tipo,origen : origen,destino: destino,estado : estado,mes : mes,ano : ano},						
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "ordering": true,
        'rowsGroup': [0],
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "autoWidth": false,
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

});

$(document).on("click","#btnbuscar", function(){
    var usu_id = $("#useridx").val();
    var tipo = $('#cmbtipo').val();
    var origen = $('#cmborigen').val();
    var destino = $('#cmbdestino').val();
    var estado = $('#cmbest').val();
    var mes = $('#cmbmes').val();
    var ano = $('#cmbano').val();

    tabla= $('#data_home').DataTable({
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        searching: false,
        buttons: [		          
            'copy',
            'print',
            'pdf'
        ],
        "ajax":{
            url: '../../controller/servicio.php?op=listar_servicio_solicitado',
            type : "post",
            dataType : "json",
            data : {usu_id : usu_id,tipo : tipo,origen : origen,destino: destino,estado : estado,mes : mes,ano : ano},						
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "ordering": true,
        'rowsGroup': [0],
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "autoWidth": false,
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
});

function buscarseguimiento(stipo_documento_codigo,sguia_serie,sguia_correlativo){
    var tipo = stipo_documento_codigo;
    var serie = sguia_serie;
    var correlativo = sguia_correlativo;
    console.log(stipo_documento_codigo);
    console.log(sguia_serie);
    console.log(sguia_correlativo);
    $(location).attr('href','../Seguimiento/?tipo='+ tipo +'&serie='+ serie +'&correlativo='+ correlativo +'');   
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

$(document).on("click","#btnmicuenta", function(){
    $("#btncerrarcambiar").css("display", "block");
    $("#modalcontra").modal("show");  
});

init();
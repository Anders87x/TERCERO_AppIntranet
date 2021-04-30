var tabla_servicio;
var tabla_sof;

function init(){
    $("#modalloading").modal('show');
    setTimeout(function() {$("#modalloading").modal('hide');}, 3000);
}

$(document).ready(function(){
    $('#cmbdoc').select2();
    $('#cmbtipo').select2({dropdownAutoWidth : true});

    $("#cmbdoc").change(function(){
        $("#cmbtipo").html('');
        $("#cmbdoc option:selected").each(function () {
            cmbdoc = $(this).val();
            if (cmbdoc=="MVC"){
                $('#cmbtipo').append('<option value=LOC>Local</option>');
                $('#cmbtipo').append('<option value=NAC>Nacional</option>'); 
            }else{
                $.post("../../controller/servicio.php?op=combo_cliente_home", function(data, status){
                   $("#cmbtipo").html(data);
                });
            }
        });
    });

    var tipo = getUrlParameter('tipo');
    var serie = getUrlParameter('serie');
    var correlativo = getUrlParameter('correlativo');

    console.log("Tipo: "+tipo);
    console.log("Serie: "+serie);
    console.log("Correlativo: "+correlativo);

    var codigo = $("#useridx").val();

    if (tipo === undefined) {
        tipo='';
    }

    if (serie === undefined) {
        serie='';
    }

    if (correlativo === undefined) {
        correlativo='';
    }

    $.post("../../controller/servicio.php?op=listar_guia_cabecera",{codigo : codigo,tipo : tipo,serie : serie,correlativo : correlativo}, function(data, status){
        if ( data.length == 0 ) {
            $("#divpanel1").css("display", "none");
        }else{
            data = JSON.parse(data);
            $("#sguia_fecha_emision").html(data.sguia_fecha_emision);
            $("#stipo_servicio_codigo").html("<i class='fas fa-box-open'></i> " + data.stipo_servicio_codigo);
            $("#sguia_numero_completo").html(data.sguia_numero_completo);
            $("#sguia_estado_descripcion").html(data.sguia_estado_descripcion);
            $("#sguia_numero_reporte").html(data.sguia_numero_reporte);
            $("#stipo_documento_descripcion").html(data.stipo_documento_descripcion);
            $("#scodigo_aleatorio").html(data.scodigo_aleatorio);
            

            $("#sremite_cliente_razon_social").html(data.sremite_cliente_razon_social);
            $("#sremite_scliente_direccion").html(data.sremite_scliente_direccion);

            $("#sconsigna_empresa_descripcion").html(data.sconsigna_empresa_descripcion);
            $("#sdestino_empresa_direccion").html(data.sdestino_empresa_direccion);

            $("#sruta_origen_descripcion").html(data.sruta_origen_descripcion);
            $("#sruta_destino_descripcion").html(data.sruta_destino_descripcion);
            $("#sruta_servicio_descripcion").html(data.sruta_servicio_descripcion);
            

            $("#sguia_confirma_fecha").html(data.sguia_confirma_fecha);
            $("#sguia_confirma_persona").html(data.sguia_confirma_persona);
            $("#sguia_confirma_observacion").html(data.sguia_confirma_observacion);

            $.post("../../controller/servicio.php?op=listar_guia_detalle",{codigo : codigo,tipo : tipo,serie : serie,correlativo : correlativo}, function(data, status){
                $("#data_detalle").html(data);
            });
            
            $.post("../../controller/servicio.php?op=listar_guia_incidencia",{codigo : codigo,tipo : tipo,serie : serie,correlativo : correlativo}, function(data, status){
                $("#data_incidencia").html(data);
            });

            $.post("../../controller/servicio.php?op=listar_guia_documentos",{codigo : codigo,tipo : tipo,serie : serie,correlativo : correlativo}, function(data, status){
                $("#data_documentos").html(data);
            });

            $("#divpanel1").css("display", "block");
        }
    });
});

$(document).on("click","#btnbuscar", function(){
    var usu_id = $("#useridx").val();
    var documento = $('#cmbdoc').val();
    var tipo = $('#cmbtipo').val();
    var seriecorrelativo = $('#txtseriecorrelativo').val();

    if (documento.length == 0 || tipo.length == 0 || seriecorrelativo.length == 0){
        swal({
            title: 'Error',
            text: 'Documento no encontrado!',
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
        $.post("../../controller/servicio.php?op=buscar_guia_01",{usu_id : usu_id,documento : documento,tipo : tipo,seriecorrelativo : seriecorrelativo}, function(data, status){
            if ( data.length == 0 ) {
                swal({
                    title: 'Error',
                    text: 'Documento no encontrado!',
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

                var codigo = $("#useridx").val();
                var tipo = data.stipo_documento_codigo;
                var serie = data.sguia_serie;
                var correlativo = data.sguia_correlativo;
            
                $.post("../../controller/servicio.php?op=listar_guia_cabecera",{codigo : codigo,tipo : tipo,serie : serie,correlativo : correlativo}, function(data, status){
                    if ( data.length == 0 ) {
                        $("#divpanel1").css("display", "none");
                    }else{
                        data = JSON.parse(data);
                        $("#sguia_fecha_emision").html(data.sguia_fecha_emision);
                        $("#stipo_servicio_codigo").html("<i class='fas fa-box-open'></i> " + data.stipo_servicio_codigo);
                        $("#sguia_numero_completo").html(data.sguia_numero_completo);
                        $("#sguia_estado_descripcion").html(data.sguia_estado_descripcion);
                        $("#sguia_numero_reporte").html(data.sguia_numero_reporte);
                        $("#stipo_documento_descripcion").html(data.stipo_documento_descripcion);
                        $("#scodigo_aleatorio").html(data.scodigo_aleatorio);
                        
            
                        $("#sremite_cliente_razon_social").html(data.sremite_cliente_razon_social);
                        $("#sremite_scliente_direccion").html(data.sremite_scliente_direccion);
            
                        $("#sconsigna_empresa_descripcion").html(data.sconsigna_empresa_descripcion);
                        $("#sdestino_empresa_direccion").html(data.sdestino_empresa_direccion);
            
                        $("#sruta_origen_descripcion").html(data.sruta_origen_descripcion);
                        $("#sruta_destino_descripcion").html(data.sruta_destino_descripcion);
                        $("#sruta_servicio_descripcion").html(data.sruta_servicio_descripcion);
                        
            
                        $("#sguia_confirma_fecha").html(data.sguia_confirma_fecha);
                        $("#sguia_confirma_persona").html(data.sguia_confirma_persona);
                        $("#sguia_confirma_observacion").html(data.sguia_confirma_observacion);
            
                        $.post("../../controller/servicio.php?op=listar_guia_detalle",{codigo : codigo,tipo : tipo,serie : serie,correlativo : correlativo}, function(data, status){
                            $("#data_detalle").html(data);
                        });
                        
                        $.post("../../controller/servicio.php?op=listar_guia_incidencia",{codigo : codigo,tipo : tipo,serie : serie,correlativo : correlativo}, function(data, status){
                            $("#data_incidencia").html(data);
                        });
            
                        $.post("../../controller/servicio.php?op=listar_guia_documentos",{codigo : codigo,tipo : tipo,serie : serie,correlativo : correlativo}, function(data, status){
                            $("#data_documentos").html(data);
                        });
            
                        $("#divpanel1").css("display", "block");
                    }
                });
            }
        });
    }
});

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
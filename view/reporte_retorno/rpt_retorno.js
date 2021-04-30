
function init(){

}

$(document).ready(function(){

    /*  OBJETO: Formulario
        METODO: INIT
     */    
    $('#cmbsgrupo_cliente_codigo').focus();

    cmbsgrupo_cliente_codigo__init();
    cmbstipo_servicio_codigo__init();
    dtpdfecha_confirma_inicial__init();
    dtpdfecha_confirma_final__init();
    cmbsguia_estado__init();

    cmbsgrupo_cliente_codigo__change();

    /*  OBJETO: cmbsgrupo_cliente_codigo
        METODO: INIT
     */
    function cmbsgrupo_cliente_codigo__init(){
        $("#cmbsgrupo_cliente_codigo").html('');
        $.post("../../controller/servicio.php?op=ctrl_apr_web_grupo_cliente_select", function(data, status){
            $("#cmbsgrupo_cliente_codigo").html(data);
            $('#cmbsgrupo_cliente_codigo').selectpicker('refresh');

            $("#cmbsremite_cliente_codigo").html('');
            $('#cmbsremite_cliente_codigo').selectpicker('refresh');
        });
    }    

    /*  OBJETO: cmbsgrupo_cliente_codigo
        METODO: CHANGE 
    */
   function cmbsgrupo_cliente_codigo__change(){
        $("#cmbsgrupo_cliente_codigo").change(function(){
            $("#cmbsremite_cliente_codigo").html('');
            $('#cmbsremite_cliente_codigo').selectpicker('refresh');
            $("#cmbsgrupo_cliente_codigo option:selected").each(function () {
                lsgrupo_cliente_codigo = $(this).val();
                $.post("../../controller/servicio.php?op=ctrl_apr_web_remitente_select", {psgrupo_cliente_codigo : lsgrupo_cliente_codigo}, function(data, status){
                    $("#cmbsremite_cliente_codigo").html(data);
                    $('#cmbsremite_cliente_codigo').selectpicker('refresh');
                });
            });
        });
    }

    /*  OBJETO: cmbstipo_servicio_codigo
        METODO: INIT
     */
    function cmbstipo_servicio_codigo__init(){
        $("#cmbstipo_servicio_codigo").html('');
        $("#cmbstipo_servicio_codigo").html('refresh');

        cmbsruta_servicio_origen_codigo__init();
        cmbsruta_servicio_destino_codigo__init();

        $.post("../../controller/servicio.php?op=apr_web_tipo_servicio_select", function(data, status){
            $("#cmbstipo_servicio_codigo").html(data);
            $('#cmbstipo_servicio_codigo').selectpicker('refresh');
        });
    }  

    /*  OBJETO: cmbstipo_servicio_codigo
        METODO: CHANGE
    */    
    $("#cmbstipo_servicio_codigo").change(function(){
        cmbsruta_servicio_origen_codigo__init();
        cmbsruta_servicio_destino_codigo__init();

        $("#cmbstipo_servicio_codigo option:selected").each(function(){
            lstipo_servicio_codigo = $(this).val();
            $.post("../../controller/servicio.php?op=apr_web_ruta_servicio_select", {pstipo_servicio_codigo : lstipo_servicio_codigo}, function(data, status){
                $("#cmbsruta_servicio_origen_codigo").html(data);
                $('#cmbsruta_servicio_origen_codigo').selectpicker('refresh');
                $("#cmbsruta_servicio_destino_codigo").html(data);
                $('#cmbsruta_servicio_destino_codigo').selectpicker('refresh');
             });
        });
    });

   /*  OBJETO: cmbsruta_servicio_origen_codigo
        METODO: INIT
     */
    function cmbsruta_servicio_origen_codigo__init(){
        $("#cmbsruta_servicio_origen_codigo").html('');
        $("#cmbsruta_servicio_origen_codigo").selectpicker('refresh');
    }  

   /*  OBJETO: cmbsruta_servicio_destino_codigo
        METODO: INIT
     */
    function cmbsruta_servicio_destino_codigo__init(){
        $("#cmbsruta_servicio_destino_codigo").html('');
        $("#cmbsruta_servicio_destino_codigo").selectpicker('refresh');
    }  

    /*  OBJETO: dtpdfecha_confirma_inicial
        METODO: INIT
     */
    function dtpdfecha_confirma_inicial__init(){
        $('#dtpdfecha_confirma_inicial').datepicker({
            language: "es",
            todayBtn: "linked",
            format: "dd/mm/yyyy",
            multidate: false,
            todayHighlight: true,
            autoclose: true,

        }).datepicker("setDate", new Date());
    }

    /*  OBJETO: dtpdfecha_confirma_final
        METODO: INIT
     */
    function dtpdfecha_confirma_final__init(){
        $('#dtpdfecha_confirma_final').datepicker({
            language: "es",
            todayBtn: "linked",
            format: "dd/mm/yyyy",
            multidate: false,
            todayHighlight: true,
            autoclose: true,

        }).datepicker("setDate", new Date()); 
    }

    /*  OBJETO: cmbsguia_estado
        METODO: INIT
    */    
    function cmbsguia_estado__init() {
        $("#cmbsguia_estado").html('');
        $("#cmbsguia_estado").append('<option>SELECCIONE</option>');
        $("#cmbsguia_estado").append('<option id="15">PENDIENTES</option>');
        $("#cmbsguia_estado").append('<option id="20">SOLO RETORNADAS</option>');
        $("#cmbsguia_estado").append('<option id="99">AMBAS</option>');
        $("#cmbsguia_estado").selectpicker('refresh');
    }

    /*  OBJETO: btnlimpiar
        METODO: CLICK
     */    
    $(document).on("click","#btnlimpiar", function(){
 
        cmbsgrupo_cliente_codigo__init();
        cmbstipo_servicio_codigo__init();
        cmbsruta_servicio_origen_codigo__init();
        cmbsruta_servicio_destino_codigo__init();
        dtpdfecha_confirma_inicial__init();
        dtpdfecha_confirma_final__init();
        cmbsguia_estado__init();

        $('#cmbsgrupo_cliente_codigo').focus();
    });  

    var tipo = getUrlParameter('tipo');
    var serie = getUrlParameter('serie');
    var correlativo = getUrlParameter('correlativo');

    console.log("Tipo: "+tipo);
    console.log("Serie: "+serie);
    console.log("Correlativo: "+correlativo);

    var codigo = $("#useridx").val();

    if (tipo === undefined)     { tipo=''; }
    if (serie === undefined)    { serie=''; }
    if (correlativo === undefined) { correlativo=''; }

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
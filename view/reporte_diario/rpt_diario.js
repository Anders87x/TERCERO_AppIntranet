
$(document).ready(function(){

    /*  OBJETO: Formulario
        METODO: INIT
     */    
    $('#txtsguia_numero_reporte').focus();

    cmbsgrupo_cliente_codigo__init();
    dtpdfecha_emision_inicial__init();
    dtpdfecha_emision_final__init();

    /*  OBJETO: cmbsgrupo_cliente_codigo
        METODO: CHANGE 
    */
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

    /*  OBJETO: pg01_btnexportar
        METODO: CLICK
     */    
    $(document).on("click","#pg01_btnexportar", function(){
        
        


     /* 
        

        userInput = '<?xml version="1.0" encoding="ISO-8859-1"?>\n';
        userInput = userInput + '<?mso-application progid="Excel.Sheet"?>\n\n';

        userInput = userInput + '<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"\n';
	    userInput = userInput + '   xmlns:o="urn:schemas-microsoft-com:office:office" \n';
	    userInput = userInput + '   xmlns:x="urn:schemas-microsoft-com:office:excel" \n';
	    userInput = userInput + '   xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet" \n'; 
	    userInput = userInput + '   xmlns:html="http://www.w3.org/TR/REC-html40">\n\n';


        userInput = userInput + '   <DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">\n';
		userInput = userInput + '       <Author>APROEM-SISTEMAS</Author>\n';
		userInput = userInput + '       <LastAuthor>APROEM-SISTEMAS</LastAuthor>\n';
		userInput = userInput + '       <Created>2020-09-11T23:19:26Z</Created>\n';
		userInput = userInput + '       <LastSaved>APROEM-SISTEMAS</LastSaved>\n';
		userInput = userInput + '       <Company>GRUPO APROEM EIRL</Company>\n';
		userInput = userInput + '       <Version>3.00</Version>\n';
        userInput = userInput + '   </DocumentProperties>\n\n';
    
    	userInput = userInput + '   <OfficeDocumentSettings xmlns="urn:schemas-microsoft-com:office:office">\n';
		userInput = userInput + '       <AllowPNG/>\n';
        userInput = userInput + '   </OfficeDocumentSettings>\n\n';
        

        userInput = userInput + '   <ExcelWorkbook xmlns="urn:schemas-microsoft-com:office:excel">\n';
        userInput = userInput + '       <WindowHeight>7755</WindowHeight>\n';
        userInput = userInput + '       <WindowWidth>20490</WindowWidth>\n';
        userInput = userInput + '       <WindowTopX>0</WindowTopX>\n';
        userInput = userInput + '       <WindowTopY>0</WindowTopY>\n';
        userInput = userInput + '       <ProtectStructure>False</ProtectStructure>\n';
        userInput = userInput + '       <ProtectWindows>False</ProtectWindows>\n';
	    userInput = userInput + '   </ExcelWorkbook>\n\n';

        userInput = userInput + '   <Worksheet ss:Name="24-10-2018">\n';

        userInput = userInput + '   </Worksheet>\n\n';
        userInput = userInput + '</Workbook>\n';

        var lbarchivo_xml = new Blob([userInput], { type: "text/plain;charset=utf-8" });
        var url = URL.createObjectURL(lbarchivo_xml);
        open(url); */

/*         window.open("data:text/plain;charset=UTF-8;base64,"+lbarchivo_xml,"UTF-8 Text");
        saveAs(lbarchivo_xml, "dynamic.xml"); */


    });

    /*  OBJETO: pg01_btnlimpiar
        METODO: CLICK
     */    
    $(document).on("click","#pg01_btnlimpiar", function(){
        $('#txtsguia_numero_reporte').val("")
        $('#txtsguia_numero_reporte').focus();
    });    

    /*  OBJETO: pg02_btnlimpiar
        METODO: CLICK
     */    
    $(document).on("click","#pg02_btnlimpiar", function(){
 
        cmbsgrupo_cliente_codigo__init()
        dtpdfecha_emision_inicial__init();
        dtpdfecha_emision_final__init();

        $('#cmbsgrupo_cliente_codigo').focus();
    });    

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

    /*  OBJETO: dtpdfecha_emision_inicial
        METODO: INIT
    */    
    function dtpdfecha_emision_inicial__init(){
        $('#dtpdfecha_emision_inicial').datepicker({
            language: "es",
            todayBtn: "linked",
            format: "dd/mm/yyyy",
            multidate: false,
            todayHighlight: true,
            autoclose: true,
    
        }).datepicker("setDate", new Date());
    }

    /*  OBJETO: dtpdfecha_emision_final
        METODO: INIT
    */    
   function dtpdfecha_emision_final__init(){
        $('#dtpdfecha_emision_final').datepicker({
            language: "es",
            todayBtn: "linked",
            format: "dd/mm/yyyy",
            multidate: false,
            todayHighlight: true,
            autoclose: true,
    
        }).datepicker("setDate", new Date());
    }



    var lsguia_numero_reporte = getUrlParameter('txtsguia_numero_reporte');
    var lsgrupo_cliente_codigo = getUrlParameter('cmbsgrupo_cliente_codigo');
    var lsremite_cliente_codigo = getUrlParameter('cmbsremite_cliente_codigo');
    var ldfecha_emision_inicial = getUrlParameter('dtpdfecha_emision_inicial');
    var ldfecha_emision_final = getUrlParameter('dtpdfecha_emision_final');

    console.log("Nro. de reporte: "+lsguia_numero_reporte);
    console.log("Grupo de cliente: "+lsgrupo_cliente_codigo);
    console.log("Remitente: "+lsremite_cliente_codigo);
    console.log("Fecha inicial: "+ldfecha_emision_inicial);
    console.log("Fecha final: "+ldfecha_emision_final);

    if (lsguia_numero_reporte === undefined) {
        lsguia_numero_reporte = '';
    }

    if (lsgrupo_cliente_codigo === undefined) {
        lsgrupo_cliente_codigo = '';
    }

    if (lsremite_cliente_codigo === undefined) {
        lsremite_cliente_codigo = '';
    }

    if (ldfecha_emision_inicial === undefined) {
        ldfecha_emision_inicial = '';
    }

    if (ldfecha_emision_final === undefined) {
        ldfecha_emision_final = '';
    }


 /*    $.post("../../controller/servicio.php?op=listar_guia_cabecera",{codigo : codigo,tipo : tipo,serie : serie,correlativo : correlativo}, function(data, status){
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
    }); */
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
                    text: 'No se encontró información con los requerimientos solicitados!',
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

/* $(document).on("click","#btnmicuenta", function(){
    $("#btncerrarcambiar").css("display", "block");
    $("#modalcontra").modal("show");  
}); */


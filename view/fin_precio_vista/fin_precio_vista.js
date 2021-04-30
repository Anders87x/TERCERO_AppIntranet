
function init(){

}

$(document).ready(function(){

	mobjetos__inicializar();

	mgrilla_item_obtener_datos_01();
	mgrilla_item_seleccion_fondocolor();

    $('#paneldatos').hide();
    $('#panelretorno').hide();
    $('#panelconfirmacion').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelincidencia').hide();
    $('#panelproveedor').hide();

    tblconsulta_vista_data = $('#grdconsulta_vista_data').dataTable({
        "language": { "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" }
    }).DataTable(); 

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

/* OBJETO: Formulario ------------ METODO: INIT */
function mobjetos__inicializar(){
    pgrep_txtsguia_numero_reporte__inicializar();
    pgvar_cmbstipo_servicio_codigo__inicializar();
    pgvar_cmbsruta_servicio_destino_codigo__inicializar();
    pgvar_cmbsgrupo_cliente_codigo__inicializar();
    pgvar_dtpdfecha_inicial__inicializar();
    pgvar_dtpdfecha_final__inicializar();
    pgvar_cmbsguia_estado__inicializar();
    pgdoc_cmbstipo_documento_codigo__inicializar();
}

/*  INICIO: FUNCION PARA OBTENER DATOS DE LA TABLA */
function mgrilla_item_obtener_datos_01(){
	tblregistro_vista_data = $("#grdregistro_vista_data").dataTable({
		"aProcessing": true,
		"aServerSide": true,
		dom: "Bfrtip",
		"searching": true,
		lengthChange: false,
		colReorder: true,
		buttons: [	
			"copyHtml5",
			"excelHtml5",
			"csvHtml5",
			{
				extend: "pdfHtml5",
				orientation: "landscape",
				download: "open",
				pageSize: "A4",
				text: "PDF"
			},
			"colvis"
		],
		"ajax":{
			url: "../../controller/log_guia.php?op=ctrl_precio_vista_01",
			type : "post",
			dataType : "json",
			error: function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 10,
		"language": { "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" }
	}).DataTable();
}

/* OBJETO: grilla ------------ METODO: - */
function mgrilla_item_seleccion_fondocolor(){
	$("#grdregistro_vista_data tbody").on( "click", "tr", function () {

		if ( $(this).hasClass("selected") )
		{
			$(this).removeClass("selected");
		}
		else
		{
			tblregistro_vista_data.$("tr.selected").removeClass("selected");
			$(this).addClass("selected");
		}
	} );
}

function mgrilla_item_visualizar(
    pscodigo_aleatorio
){
    var lscodigo_aleatorio = pscodigo_aleatorio.toString().replace('/','').slice(0, -1);

    $('#hddscodigo_aleatorio').val(lscodigo_aleatorio);
    $('#hddssuperior_aleatorio').val(lscodigo_aleatorio);

    llenarpaneles(lscodigo_aleatorio);
    
    $('#paneldatos').show();
    $('#panelconfirmacion').show();

/*     $('#panelretorno').show();
    
    $('#paneldetalle').show();
    $('#paneldocumento').show();
    $('#panelincidencia').show();
    $('#panelproveedor').show(); */
}

function llenarpaneles(
    pscodigo_aleatorio
){
    
    $.post("../../controller/log_guia.php?op=ctrl_panel_cabecera",{
            pscodigo_aleatorio : pscodigo_aleatorio
        },function(data, status){
            data = JSON.parse(data);

            $('#hddscliente_codigo').val(data.sremite_cliente_codigo);

            $('#sremite_cliente_razon_social').html(data.sremite_cliente_razon_social);
            $('#sremite_cliente_codigo').html(data.sremite_cliente_codigo);
            $('#sremite_cliente_direccion').html(data.sremite_cliente_direccion);
            $('#sruta_origen_descripcion').html(data.sruta_origen_descripcion);

            $('#sconsigna_empresa_descripcion').html(data.sconsigna_empresa_descripcion);
            $('#sdestino_empresa_direccion').html(data.sdestino_empresa_direccion);
            $('#sruta_destino_descripcion').html(data.sruta_destino_descripcion);

            $('#sguia_numero_completo').html(data.sguia_numero_completo);
            $('#stipo_documento_descripcion').html(data.stipo_documento_descripcion);
            $('#scodigo_aleatorio').html(data.scodigo_aleatorio);

            $('#sruta_servicio_descripcion').html(data.sruta_servicio_descripcion);
            $('#sguia_fecha_emision_texto').html(data.sguia_fecha_emision_texto);
            $('#sguia_fecha_vencimiento_texto').html(data.sguia_fecha_vencimiento_texto);
            $('#sguia_fecha_retorno_texto').html(data.sguia_fecha_retorno_limite_texto);
            $('#sprioridad_descripcion').html(data.sprioridad_descripcion);

            $('#sguia_licitacion').html(data.sguia_licitacion);
            $('#sguia_exclusivo').html(data.sguia_exclusivo);
            $('#sguia_numero_reporte').html(data.sguia_numero_reporte);
            $('#sguia_estado_descripcion').html(data.sguia_estado_descripcion);

    });

    $.post("../../controller/log_guia_confirma.php?caso=ctrl_panel_cabecera",{
            pscodigo_aleatorio : pscodigo_aleatorio
        },function(data, status){
        $("#grdconfirmacion_data").html(data);
    });


/*     $.post("../../controller/servicio.php?op=consulta_A01_guia_retorno",{pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo},function(data, status){
        $("#grdretorno_data").html(data);
    });

    $.post("../../controller/servicio.php?op=consulta_A01_guia_confirmacion",{pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo},function(data, status){
        $("#grdconfirmacion_data").html(data);
    });

    $.post("../../controller/servicio.php?op=consulta_A01_guia_detalle",{pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo},function(data, status){
        $("#grdproducto_detalle_data").html(data);
    });

    $.post("../../controller/servicio.php?op=consulta_A01_guia_documento",{pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo},function(data, status){
        $("#grd_documentos_cliente_data").html(data);
    });

    $.post("../../controller/servicio.php?op=consulta_A01_guia_incidencia",{pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo},function(data, status){
        $("#grdincidencia_data").html(data);
    });

    $.post("../../controller/servicio.php?op=consulta_A01_guia_manifiesto",{pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo},function(data, status){
        data = JSON.parse(data);
        $('#sagente_nombre').html(data.sagente_nombre);
        $('#stipo_servicio_descripcion').html(data.stipo_servicio_descripcion);
        $('#sruta_servicio_descripcionx').html(data.sruta_servicio_descripcion);
        $('#smanifiesto_observacion').html(data.smanifiesto_observacion);

        //Representante
        $('#pgmanifiesto_cmbsagente_codigo2').val(data.sagente_codigo).change();
        $('#pgmanifiesto_cmbstipo_servicio_codigo2').val(data.stipo_servicio_codigo).change();
        
        $("#pgmanifiesto_cmbsruta_servicio_codigo2").html('');
        $.post("../../controller/servicio.php?op=ctrl_apr_web_ruta_servicio_select_2",{pstipo_servicio_codigo:data.stipo_servicio_codigo,sruta_servicio_codigo:data.sruta_servicio_codigo},function(data, status){
            $("#pgmanifiesto_cmbsruta_servicio_codigo2").html(data);
            $('#pgmanifiesto_cmbsruta_servicio_codigo2').selectpicker('refresh');
        });

        //Proveedor
        $('#pgmanifiesto_cmbsproveedor_codigo2').val(data.sproveedor_codigo).change();
        $('#pgmanifiesto_cmbstipo_transporte_codigo2').val(data.stipo_transporte_codigo).change();
        $('#pgmanifiesto_dtpdmanifiesto_fecha_salida2').val(data.Fecha);
        $('#pgmanifiesto_spnnmanifiesto_dias_transito2').val(data.nmanifiesto_dias_transito);
        $('#pgmanifiesto_txtsmanifiesto_despachador2').val(data.smanifiesto_despachador);
        $('#pgmanifiesto_txtsmanifiesto_proveedor_documento2').val(data.smanifiesto_proveedor_documento);

        $('#sproveedor_razon_social').html(data.sproveedor_razon_social);
        $('#stipo_transporte_descripcion').html(data.stipo_transporte_descripcion);
        $('#smanifiesto_fecha_salida_texto').html(data.smanifiesto_fecha_salida_texto);
        $('#nmanifiesto_dias_transito').html(data.nmanifiesto_dias_transito);
        $('#smanifiesto_despachador').html(data.smanifiesto_despachador);
        $('#smanifiesto_proveedor_documento').html(data.smanifiesto_proveedor_documento);
    });
 */
}



/*  OBJETO: pgrep_btnbuscar ---------- METODO: CLICK */
$(document).on("click","#pgrep_btnbuscar", function(){
    var pstipo_documento_codigo = $('#pgcli_cmbstipo_documento_codigo').val();
    var psdocumento_numero = $('#pgcli_txtsdocumento_numero').val();
    
    tblconsulta_vista_data = $('#grdconsulta_vista_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [		          
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    download: 'open',
                    pageSize: 'A4',
                    text: 'PDF'
                },
                'colvis'
                ],
        "ajax":{
            url: '../../controller/servicio.php?op=ctrl_apr_web_mov_consulta_vista_03',
            type : "post",
            dataType : "json",
            data:{  pstipo_documento_codigo:pstipo_documento_codigo,
                    psdocumento_numero:psdocumento_numero,
                },
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "language": { "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" }

    }).DataTable(); 

    $('#paneldatos').hide();
    $('#panelretorno').hide();
    $('#panelconfirmacion').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelincidencia').hide();
    $('#panelproveedor').hide();

});

/*  OBJETO: pgvar_btnbuscar ---------- METODO: CLICK */
$(document).on("click","#pgvar_btnbuscar", function(){

    var pstipo_servicio_codigo = $('#pgvar_cmbstipo_servicio_codigo').val();
    var psruta_servicio_destino_codigo = $('#pgvar_cmbsruta_servicio_destino_codigo').val();
    var psgrupo_cliente_codigo = $('#pgvar_cmbsgrupo_cliente_codigo').val();
    var pdfecha_recepcion_inicial = $('#pgvar_dtpdfecha_inicial').val();
    var pdfecha_recepcion_final = $('#pgvar_dtpdfecha_final').val();
    var psguia_estado = $('#pgvar_cmbsguia_estado').val();
    
    var psfecha_recepcion_inicial = '';
    var psfecha_recepcion_final = '';

    psfecha_recepcion_inicial   = psfecha_recepcion_inicial.concat(pdfecha_recepcion_inicial.substr(6,4), pdfecha_recepcion_inicial.substr(3,2), pdfecha_recepcion_inicial.substr(0,2));
    psfecha_recepcion_final     = psfecha_recepcion_final.concat(pdfecha_recepcion_final.substr(6,4), pdfecha_recepcion_final.substr(3,2), pdfecha_recepcion_final.substr(0,2));

    //VALIDAR RANGO DE FECHAS
            
    tblconsulta_vista_data = $('#grdconsulta_vista_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [		          
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    download: 'open',
                    pageSize: 'A4',
                    text: 'PDF'
                },
                'colvis'
                ],
        "ajax":{
            url: '../../controller/servicio.php?op=ctrl_apr_web_mov_consulta_vista_02',
            type : "post",
            dataType : "json",
            data:{
                    pstipo_servicio_codigo:pstipo_servicio_codigo,
                    psruta_servicio_destino_codigo:psruta_servicio_destino_codigo,
                    psgrupo_cliente_codigo:psgrupo_cliente_codigo,
                    psfecha_recepcion_inicial:psfecha_recepcion_inicial,
                    psfecha_recepcion_final:psfecha_recepcion_final,
                    psguia_estado:psguia_estado
                },					
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "language": { "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" }

    }).DataTable(); 

    $('#paneldatos').hide();
    $('#panelretorno').hide();
    $('#panelconfirmacion').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelincidencia').hide();
    $('#panelproveedor').hide();

});

/*  OBJETO: pgdoc_btnbuscar ---------- METODO: CLICK */
$(document).on("click","#pgdoc_btnbuscar", function(){
    var pstipo_documento_codigo = $('#pgdoc_cmbstipo_documento_codigo').val();
    var psguia_serie = $('#pgdoc_txtsguia_serie').val();
    var psguia_correlativo = $('#pgdoc_txtsguia_correlativo').val();
    
    console.log("pstipo_documento_codigo: " + pstipo_documento_codigo) ;
    console.log("psguia_serie: " + psguia_serie) ;
    console.log("psguia_correlativo: " + psguia_correlativo) ;

    tblconsulta_vista_data = $('#grdconsulta_vista_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [		          
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    download: 'open',
                    pageSize: 'A4',
                    text: 'PDF'
                },
                'colvis'
                ],
        "ajax":{
            url: '../../controller/servicio.php?op=ctrl_apr_web_mov_consulta_vista_01',
            type : "post",
            dataType : "json",
            data:{  pstipo_documento_codigo:pstipo_documento_codigo,
                    psguia_serie:psguia_serie,
                    psguia_correlativo:psguia_correlativo},
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "language": { "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" }

    }).DataTable(); 

    $('#paneldatos').hide();
    $('#panelretorno').hide();
    $('#panelconfirmacion').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelincidencia').hide();
    $('#panelproveedor').hide();

});

/*  OBJETO: pgrep_btnlimpiar ---------- METODO: CLICK */
$(document).on("click","#pgrep_btnlimpiar", function(){
    $('#pgrep_txtsguia_numero_reporte').val("");
    $('#pgrep_txtsguia_numero_reporte').focus();
});

/*  OBJETO: pgvar_btnlimpiar ---------- METODO: CLICK */
$(document).on("click","#pgvar_btnlimpiar", function(){
    pgvar_cmbstipo_servicio_codigo__inicializar();
    pgvar_cmbsruta_servicio_destino_codigo__inicializar();
    pgvar_cmbsgrupo_cliente_codigo__inicializar();
    pgvar_dtpdfecha_inicial__inicializar();
    pgvar_dtpdfecha_final__inicializar();
    $('#pgvar_txtsguia_hoja_ruta').val("");
    $('#pgvar_cmbstipo_servicio_codigo').focus();
});

/*  OBJETO: pgdoc_btnlimpiar ---------- METODO: CLICK */
$(document).on("click","#pgdoc_btnlimpiar", function(){
    pgdoc_cmbstipo_documento_codigo__inicializar();
    $('#pgdoc_txtsguia_serie').val("");
    $('#pgdoc_txtsguia_correlativo').val("");
    $('#pgdoc_cmbstipo_documento_codigo').focus();
});



/*  OBJETO: pgdoc_cmbstipo_documento_codigo ---------- METODO: CHANGE */ 
$("#pgdoc_cmbstipo_documento_codigo").change(function(){
    $("#pgdoc_txtsguia_serie").focus();
});

/*  OBJETO: pgvar_cmbstipo_servicio_codigo ---------- METODO: CHANGE */    
$("#pgvar_cmbstipo_servicio_codigo").change(function(){
    pgvar_cmbsruta_servicio_destino_codigo__inicializar();

    $("#pgvar_cmbstipo_servicio_codigo option:selected").each(function(){
        lstipo_servicio_codigo = $(this).val();
        $.post("../../controller/servicio.php?op=apr_web_ruta_servicio_select", {pstipo_servicio_codigo : lstipo_servicio_codigo}, function(data, status){
            $("#pgvar_cmbsruta_servicio_destino_codigo").html(data);
            $('#pgvar_cmbsruta_servicio_destino_codigo').selectpicker('refresh');
        });
    });
});



/*  OBJETO: pgdoc_txtsguia_serie ---------- METODO: onblur */
function pgdoc_txtsguia_serie__onblur(pobjeto){
    while (pobjeto.value.length<3) 
        pobjeto.value = '0'+pobjeto.value;
}  
/* OBJETO: pgdoc_txtscorrelativo_serie ---------- METODO: onblur  */
function pgdoc_txtsguia_correlativo__onblur(pobjeto){
    while (pobjeto.value.length<6) 
        pobjeto.value = '0'+pobjeto.value;
}



/*  OBJETO: pgrep_txtsguia_numero_reporte ----------- METODO: INIT */
function pgrep_txtsguia_numero_reporte__inicializar(){
    $("#pgrep_txtsguia_numero_reporte").val("");
}

/*  OBJETO: pgvar_cmbstipo_servicio_codigo ---------- METODO: INIT */
function pgvar_cmbstipo_servicio_codigo__inicializar(){
    $("#pgvar_cmbstipo_servicio_codigo").html('');
    
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_servicio_select", function(data, status){
        $("#pgvar_cmbstipo_servicio_codigo").html(data);
        $("#pgvar_cmbstipo_servicio_codigo").selectpicker('refresh');
    });
}

/*  OBJETO: pgvar_cmbsruta_servicio_destino_codigo ---------- METODO: INIT */
function pgvar_cmbsruta_servicio_destino_codigo__inicializar(){
    $("#pgvar_cmbsruta_servicio_destino_codigo").html('');
    $("#pgvar_cmbsruta_servicio_destino_codigo").selectpicker('refresh');
}  

/*  OBJETO: pgvar_cmbsgrupo_cliente_codigo ---------- METODO: INIT */
function pgvar_cmbsgrupo_cliente_codigo__inicializar(){
    $("#pgvar_cmbsgrupo_cliente_codigo").html('');
    
    $.post("../../controller/servicio.php?op=ctrl_apr_web_grupo_cliente_select", function(data, status){
        $("#pgvar_cmbsgrupo_cliente_codigo").html(data);
        $("#pgvar_cmbsgrupo_cliente_codigo").selectpicker('refresh');
    });
}

/*  OBJETO: pgvar_dtpdfecha_inicial ----------- METODO: INIT */
function pgvar_dtpdfecha_inicial__inicializar(){
    $('#pgvar_dtpdfecha_inicial').datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true,

    }).datepicker("setDate", new Date());
}

/*  OBJETO: pgvar_dtpdfecha_final ------------ METODO: INIT */
function pgvar_dtpdfecha_final__inicializar(){
    $('#pgvar_dtpdfecha_final').datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true,

    }).datepicker("setDate", new Date()); 
}

/*  OBJETO: pgvar_cmbsguia_estado ---------- METODO: INIT */
function pgvar_cmbsguia_estado__inicializar(){
    $("#pgvar_cmbsguia_estado").html('');
    $("#pgvar_cmbsguia_estado").append('<option value="01">EN TRANSITO</option>');
    $("#pgvar_cmbsguia_estado").append('<option value="15">CONFIRMADOS</option>');
    $("#pgvar_cmbsguia_estado").append('<option value="20">RETORNADOS</option>');
    $("#pgvar_cmbsguia_estado").append('<option value="99">TODOS</option>');
    $("#pgvar_cmbsguia_estado").val('99');
    $("#pgvar_cmbsguia_estado").selectpicker('refresh');
}

/*  OBJETO: pgdoc_cmbstipo_documento_codigo ----------- METODO: INIT */
function pgdoc_cmbstipo_documento_codigo__inicializar(){
    $("#pgdoc_cmbstipo_documento_codigo").html('');
    
    $.post("../../controller/arc_tipo_documento.php?caso=ctrl_select", function(data, status){
        $("#pgdoc_cmbstipo_documento_codigo").html(data);
        $("#pgdoc_cmbstipo_documento_codigo").selectpicker('refresh');
    });
}



init();
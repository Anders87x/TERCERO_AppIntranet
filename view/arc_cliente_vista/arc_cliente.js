//********************************************************************************************************
// TABLA: arc_cliente
//********************************************************************************************************

function init(){
}

$(document).ready(function(){

	mobjetos__inicializar();

	mgrilla_item_obtener_datos_01();
	mgrilla_item_seleccion_fondocolor();

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


/*  OBJETO: btnregistro_nuevo ----------- METODO: CLICK */
$(document).on("click","#btnregistro_nuevo", function(){

	mobjetos__inicializar();
	$("#modal_registro").modal("show");
});

/*  OBJETO: btnregistro_guardar ----------- METODO: CLICK */
$(document).on("click","#btnregistro_guardar", function(){

	var lscliente_codigo = "";
	var lscliente_ruc = $("#txtscliente_ruc").val();
	var lscliente_razon_social = $("#txtscliente_razon_social").val();
	var lscliente_abreviatura = $("#txtscliente_abreviatura").val();
	var lscliente_direccion = $("#txtscliente_direccion").val();
	var lsdepartamento_codigo = $("#cmbsdepartamento_codigo").val();
	var lsprovincia_codigo = $("#cmbsprovincia_codigo").val();
	var lsubigeo_codigo = $("#cmbsdistrito_codigo").val();
	var lscliente_central_telefonica = $("#txtscliente_central_telefonica").val();
	var lsgrupo_cliente_codigo = $("#cmbsgrupo_cliente_codigo").val();
	var lscliente_politica_precio = ($("#chkscliente_politica_precio").is( ":checked" ) ? "1": "0") ;
	var lscliente_facturacion = ($("#chkscliente_facturacion").is( ":checked" ) ? "1": "0") ;
	var lscliente_estado = ($("#chkscliente_estado").is( ":checked" ) ? "1": "0") ;

	var lsauditoria_usuario = $("#VGL_susuario_codigo").val();

	/*  INICIO: TRANSFORMACION DE VARIABLES */
	lscliente_razon_social = lscliente_razon_social.toUpperCase();
	lscliente_abreviatura = lscliente_abreviatura.toUpperCase();
	lscliente_direccion = lscliente_direccion.toUpperCase();
	/*  FIN: TRANSFORMACION DE VARIABLES */

	/*  INICIO: VISUALIZAR CONTENIDO DE VARIABLES ----- CONSOLE */
	console.log("lscliente_codigo: " + lscliente_codigo);
	console.log("lscliente_ruc: " + lscliente_ruc);
	console.log("lscliente_razon_social: " + lscliente_razon_social);
	console.log("lscliente_abreviatura: " + lscliente_abreviatura);
	console.log("lscliente_direccion: " + lscliente_direccion);
	console.log("lsdepartamento_codigo: " + lsdepartamento_codigo);
	console.log("lsprovincia_codigo: " + lsprovincia_codigo);
	console.log("lsubigeo_codigo: " + lsubigeo_codigo);
	console.log("lscliente_central_telefonica: " + lscliente_central_telefonica);
	console.log("lsgrupo_cliente_codigo: " + lsgrupo_cliente_codigo);
	console.log("lscliente_politica_precio: " + lscliente_politica_precio);
	console.log("lscliente_facturacion: " + lscliente_facturacion);
	console.log("lscliente_estado: " + lscliente_estado);
	console.log("lsauditoria_usuario: " + lsauditoria_usuario);
	/*  FIN: VISUALIZAR CONTENIDO DE VARIABLES ----- CONSOLE */


	/*  INICIO: FUNCION PARA GRABAR ----- CONTROLADOR */
	$.post("../../controller/arc_cliente.php?caso=ctrl_agregar",{
		pscliente_codigo : lscliente_codigo,
		pscliente_ruc : lscliente_ruc,
		pscliente_razon_social : lscliente_razon_social,
		pscliente_abreviatura : lscliente_abreviatura,
		pscliente_direccion : lscliente_direccion,
		psdepartamento_codigo : lsdepartamento_codigo,
		psprovincia_codigo : lsprovincia_codigo,
		psubigeo_codigo : lsubigeo_codigo,
		pscliente_central_telefonica : lscliente_central_telefonica,
		psgrupo_cliente_codigo : lsgrupo_cliente_codigo,
		pscliente_politica_precio : lscliente_politica_precio,
		pscliente_facturacion : lscliente_facturacion,
		pscliente_estado : lscliente_estado,
		psauditoria_usuario : lsauditoria_usuario
	},function(data, status)
	{
		$("#grdregistro_vista_data").DataTable().ajax.reload();
		$("#modal_registro").modal("hide");

		swal(
			"Confirmación!",
			"El registro se grabó correctamente.",
			"success"
	);
	});
	/*  FIN: FUNCION PARA GRABAR ----- CONTROLADOR */
});
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
			url: "../../controller/arc_cliente.php?caso=ctrl_obtener_vista_00",
			type : "post",
			dataType : "json",
			error: function(e){
				console.log(e.responseText);
			}
		},
        fixedColumns:   {
            leftColumns: 1,
            rightColumns: 1
		},
        "sScrollX": '100%',
        "sScrollXInner": "120%",
		"bDestroy": true,
		"responsive": false,
		"bInfo":true,
		"iDisplayLength": 10,
		"language": { "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" }
	}).DataTable();
}
/*  FIN: FUNCION PARA OBTENER DATOS DE LA TABLA */

/*  INICIO: FUNCION PARA ELIMINAR UN REGISTRO */
function mgrilla_item_eliminar(scodigo_aleatorio){
	var lscodigo_aleatorio = scodigo_aleatorio.toString().replace("/","").slice(0, -1);

	var lsauditoria_usuario =  $("#VGL_susuario_codigo").val();

	console.log("lscodigo_aleatorio : " + lscodigo_aleatorio);
	console.log("lsauditoria_usuario : " + lsauditoria_usuario);

	swal({
		title: "Eliminar",
		text: "�Est� seguro de eliminar el registro seleccionado?",
		icon: "warning",
		buttons: {
			cancel: {
				text: "Cancelar",
				value: null,
				visible: true,
				className: "btn btn-default",
				closeModal: true,
			},
			confirm: {
				text: "Eliminar",
				value: true,
				visible: true,
				className: "btn btn-warning",
				closeModal: true
			}
		}
	}).then((result) => {
		if (result==true) {

			/** BUSCAR SI OTRAS TABLAS DEPENDEN DE ESTE REGISTRO */
			$.post("../../controller/arc_cliente.php?caso=ctrl_buscar_dependencia",{
					pscodigo_aleatorio:lscodigo_aleatorio}, 
			function(data, status){
				data = JSON.parse(data);
				var lnnumero_registros = data.nnumero_registros;
				if (lnnumero_registros == "0")
				{

					$.post("../../controller/arc_cliente.php?caso=ctrl_eliminar",{
							pscodigo_aleatorio:lscodigo_aleatorio,
							psauditoria_usuario:lsauditoria_usuario,
					},function(data, status){

						$("#grdregistro_vista_data").DataTable().ajax.reload();

						swal(
							"Eliminar!",
							"El registro se elimin� correctamente.",
							"success"
						);
					});

				}
				else
				{
					swal(
						"Aviso!",
						"No puede eliminar este registro porque est� asociado con otra informaci�n.",
						"success"
					);
				};
			});
		}
	});
}
/*  FIN: FUNCION PARA ELIMINAR UN REGISTRO */

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

/* OBJETO: Formulario ------------ METODO: INIT */
function mobjetos__inicializar(){
	$("#txtscliente_codigo").val("");
	$("#txtscliente_ruc").val("");
	$("#txtscliente_razon_social").val("");
	$("#txtscliente_abreviatura").val("");
	$("#txtscliente_direccion").val("");
	cmbsdepartamento_codigo__inicializar();
	cmbsprovincia_codigo__inicializar();
	cmbsdistrito_codigo__inicializar();
	$("#txtscliente_central_telefonica").val("");
	cmbsgrupo_cliente_codigo__inicializar();

	$("#chkscliente_politica_precio").prop('checked', false);
	$("#chkscliente_facturacion").prop('checked', false);
	$("#chkscliente_estado").prop('checked', true);

	$("#txtscliente_ruc").focus();

}

/*  OBJETO: cmbNombreDelCampo ------------ METODO: INIT */
function cmbNombreDelCampo__inicializar(){
	/* $("#cmbNombreDelCampo").html(""); */
	/* $("#cmbNombreDelCampo").selectpicker("refresh"); */
}

/*  OBJETO: cmbNombreDelCampo ------------ METODO: CHANGE */
/*$("#cmbNombreDelCampo").change(function(){ */
/*}); */


/*  OBJETO: cmbsgrupo_cliente_codigo ------------ METODO: INIT */
function cmbsgrupo_cliente_codigo__inicializar(){
    $("#cmbsgrupo_cliente_codigo").html("");
    
    $.post("../../controller/arc_grupo_cliente.php?caso=ctrl_select", {}, 
        function(data, status){
            $("#cmbsgrupo_cliente_codigo").html(data);
            $("#cmbsgrupo_cliente_codigo").selectpicker("refresh");
    });
}

/*  OBJETO: cmbsdepartamento_codigo ------------ METODO: INIT */
function cmbsdepartamento_codigo__inicializar(){
    $("#cmbsdepartamento_codigo").html("");
    
    $.post("../../controller/sun_departamento.php?caso=ctrl_select", {}, 
        function(data, status){
            $("#cmbsdepartamento_codigo").html(data);
            $("#cmbsdepartamento_codigo").selectpicker("refresh");
    });
}

/*  OBJETO: cmbsprovincia_codigo ----------- METODO: INIT */
function cmbsprovincia_codigo__inicializar(){
    $("#cmbsprovincia_codigo").html("");
    $("#cmbsprovincia_codigo").selectpicker("refresh");
}

/*  OBJETO: cmbsdistrito_codigo ------------ METODO: INIT */
function cmbsdistrito_codigo__inicializar(){
    $("#cmbsdistrito_codigo").html("");
    $("#cmbsdistrito_codigo").selectpicker("refresh");
}

/*  OBJETO: cmbsdepartamento_codigo ----------- METODO: CHANGE */
$("#cmbsdepartamento_codigo").change(function(){
    cmbsprovincia_codigo__inicializar();

    $("#cmbsdepartamento_codigo option:selected").each(function () {
        var lsdepartamento_codigo = $("#cmbsdepartamento_codigo option:selected").val();
        
        $.post("../../controller/sun_provincia.php?caso=ctrl_select", {
            psdepartamento_codigo : lsdepartamento_codigo}, 
            function(data, status){
                $("#cmbsprovincia_codigo").html(data);
                $("#cmbsprovincia_codigo").selectpicker("refresh");
         });
    });
});

/*  OBJETO: cmbsprovincia_codigo ----------- METODO: CHANGE */
$("#cmbsprovincia_codigo").change(function(){
    cmbsdistrito_codigo__inicializar();

    $("#cmbsprovincia_codigo option:selected").each(function () {
        var lsprovincia_codigo = $("#cmbsprovincia_codigo option:selected").val();

        $.post("../../controller/sun_distrito.php?caso=ctrl_select", {
            psprovincia_codigo : lsprovincia_codigo}, 
            function(data, status){
                $("#cmbsdistrito_codigo").html(data);
                $("#cmbsdistrito_codigo").selectpicker("refresh");
         });
    });
});


init();

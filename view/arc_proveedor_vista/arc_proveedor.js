//********************************************************************************************************
// TABLA: arc_proveedor
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

	var lsproveedor_codigo = "";
	var lsproveedor_ruc = $("#txtsproveedor_ruc").val();
	var lsproveedor_razon_social = $("#txtsproveedor_razon_social").val();
	var lsproveedor_abreviatura = $("#txtsproveedor_abreviatura").val();
	var lsproveedor_direccion = $("#txtsproveedor_direccion").val();

	var lsauditoria_usuario = $("#VGL_susuario_codigo").val();

	/*  INICIO: TRANSFORMACION DE VARIABLES */
	lsproveedor_codigo = lsproveedor_codigo.toUpperCase();
	lsproveedor_razon_social = lsproveedor_razon_social.toUpperCase();
	lsproveedor_abreviatura = lsproveedor_abreviatura.toUpperCase();
	lsproveedor_direccion = lsproveedor_direccion.toUpperCase();
	/*  FIN: TRANSFORMACION DE VARIABLES */

	/*  INICIO: VISUALIZAR CONTENIDO DE VARIABLES ----- CONSOLE */
	console.log("lsproveedor_codigo: " + lsproveedor_codigo);
	console.log("lsproveedor_ruc: " + lsproveedor_ruc);
	console.log("lsproveedor_razon_social: " + lsproveedor_razon_social);
	console.log("lsproveedor_abreviatura: " + lsproveedor_abreviatura);
	console.log("lsproveedor_direccion: " + lsproveedor_direccion);
	console.log("lsauditoria_usuario: " + lsauditoria_usuario);
	/*  FIN: VISUALIZAR CONTENIDO DE VARIABLES ----- CONSOLE */


	/*  INICIO: FUNCION PARA GRABAR ----- CONTROLADOR */
	$.post("../../controller/arc_proveedor.php?caso=ctrl_agregar",{
		psproveedor_codigo : lsproveedor_codigo,
		psproveedor_ruc : lsproveedor_ruc,
		psproveedor_razon_social : lsproveedor_razon_social,
		psproveedor_abreviatura : lsproveedor_abreviatura,
		psproveedor_direccion : lsproveedor_direccion,
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
			url: "../../controller/arc_proveedor.php?caso=ctrl_obtener_vista_00",
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
			$.post("../../controller/arc_proveedor.php?caso=ctrl_buscar_dependencia",{
					pscodigo_aleatorio:lscodigo_aleatorio}, 
			function(data, status){
				data = JSON.parse(data);
				/** console.log(data); */
				var lnnumero_registros = data.nnumero_registros;
				/** console.log("lnnumero_registros: " + lnnumero_registros); */
				if (lnnumero_registros == "0")
				{

					$.post("../../controller/arc_proveedor.php?caso=ctrl_eliminar",{
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
	$("#txtsproveedor_ruc").val("");
	$("#txtsproveedor_razon_social").val("");
	$("#txtsproveedor_abreviatura").val("");
	$("#txtsproveedor_direccion").val("");
	
	$("#txtsproveedor_ruc").focus();
	/* cmbNombreDelCampo__inicializar(); */
	/* $("#txtNombreDelCampo").focus(); */
}

/*  OBJETO: cmbNombreDelCampo ------------ METODO: INIT */
function cmbNombreDelCampo__inicializar(){
	/* $("#cmbNombreDelCampo").html(""); */
	/* $("#cmbNombreDelCampo").selectpicker("refresh"); */
}
/*  OBJETO: cmbNombreDelCampo ------------ METODO: CHANGE */
/*$("#cmbNombreDelCampo").change(function(){ */
/*}); */
init();

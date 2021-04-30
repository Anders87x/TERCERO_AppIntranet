//********************************************************************************************************
// TABLA: arc_producto
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

	var lsproducto_codigo = $("#txtsproducto_codigo").val();
	var lsproducto_descripcion = $("#txtsproducto_descripcion").val();
	var lsproducto_abreviatura = $("#txtsproducto_abreviatura").val();
	var lsproducto_unidad = $("#txtsproducto_unidad").val();

	var lsauditoria_usuario = $("#VGL_susuario_codigo").val();

	/*  INICIO: TRANSFORMACION DE VARIABLES */
	lsproducto_codigo = lsproducto_codigo.toUpperCase();
	lsproducto_descripcion = lsproducto_descripcion.toUpperCase();
	lsproducto_abreviatura = lsproducto_abreviatura.toUpperCase();
	lsproducto_unidad = lsproducto_unidad.toUpperCase();
	/*  FIN: TRANSFORMACION DE VARIABLES */

	/*  INICIO: VISUALIZAR CONTENIDO DE VARIABLES ----- CONSOLE */
	console.log("lsproducto_codigo: " + lsproducto_codigo);
	console.log("lsproducto_descripcion: " + lsproducto_descripcion);
	console.log("lsproducto_abreviatura: " + lsproducto_abreviatura);
	console.log("lsproducto_unidad: " + lsproducto_unidad);
	console.log("lsauditoria_usuario: " + lsauditoria_usuario);
	/*  FIN: VISUALIZAR CONTENIDO DE VARIABLES ----- CONSOLE */


	/*  INICIO: FUNCION PARA GRABAR ----- CONTROLADOR */
	$.post("../../controller/arc_producto.php?caso=ctrl_agregar",{
		psproducto_codigo : lsproducto_codigo,
		psproducto_descripcion : lsproducto_descripcion,
		psproducto_abreviatura : lsproducto_abreviatura,
		psproducto_unidad : lsproducto_unidad,
		psauditoria_usuario : lsauditoria_usuario
	},function(data, status)
	{
		$("#grdregistro_vista_data").DataTable().ajax.reload();
		$("#modal_registro").modal("hide");

		swal(
			"Confirmaci�n!",
			"El registro se grab� correctamente.",
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
			url: "../../controller/arc_producto.php?caso=ctrl_obtener_vista_00",
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
			$.post("../../controller/arc_producto.php?caso=ctrl_buscar_dependencia",{
					pscodigo_aleatorio:lscodigo_aleatorio}, 
			function(data, status){
				data = JSON.parse(data);
				/** console.log(data); */
				var lnnumero_registros = data.nnumero_registros;
				/** console.log("lnnumero_registros: " + lnnumero_registros); */
				if (lnnumero_registros == "0")
				{

					$.post("../../controller/arc_producto.php?caso=ctrl_eliminar",{
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
	/* $("#txtNombreDelCampo").val(""); */
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

//********************************************************************************************************
// TABLA: arc_tipo_estado
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

	var lstipo_estado_codigo = $("#txtstipo_estado_codigo").val();
	var lstipo_estado_descripcion = $("#txtstipo_estado_descripcion").val();
	var lstipo_estado_abreviatura = $("#txtstipo_estado_abreviatura").val();

	var lsauditoria_usuario = $("#VGL_susuario_codigo").val();

	/*  INICIO: TRANSFORMACION DE VARIABLES */

	/*  FIN: TRANSFORMACION DE VARIABLES */

	/*  INICIO: VISUALIZAR CONTENIDO DE VARIABLES ----- CONSOLE */
	console.log("lstipo_estado_codigo: " + lstipo_estado_codigo);
	console.log("lstipo_estado_descripcion: " + lstipo_estado_descripcion);
	console.log("lstipo_estado_abreviatura: " + lstipo_estado_abreviatura);
	console.log("lsauditoria_usuario: " + lsauditoria_usuario);
	/*  FIN: VISUALIZAR CONTENIDO DE VARIABLES ----- CONSOLE */


	/*  INICIO: FUNCION PARA GRABAR ----- CONTROLADOR */
	$.post("../../controller/arc_tipo_estado.php?caso=ctrl_agregar",{
		pstipo_estado_codigo : lstipo_estado_codigo,
		pstipo_estado_descripcion : lstipo_estado_descripcion,
		pstipo_estado_abreviatura : lstipo_estado_abreviatura,
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
			url: "../../controller/arc_tipo_estado.php?caso=ctrl_obtener_vista_00",
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
		text: "¿Está seguro de eliminar el registro seleccionado?",
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
			$.post("../../controller/arc_tipo_estado.php?caso=ctrl_buscar_dependencia",{
					pscodigo_aleatorio:lscodigo_aleatorio}, 
			function(data, status){
				data = JSON.parse(data);
				/** console.log(data); */
				var lnnumero_registros = data.nnumero_registros;
				/** console.log("lnnumero_registros: " + lnnumero_registros); */
				if (lnnumero_registros == "0")
				{

					$.post("../../controller/arc_tipo_estado.php?caso=ctrl_eliminar",{
							pscodigo_aleatorio:lscodigo_aleatorio,
							psauditoria_usuario:lsauditoria_usuario,
					},function(data, status){

						$("#grdregistro_vista_data").DataTable().ajax.reload();

						swal(
							"Eliminar!",
							"El registro se eliminó correctamente.",
							"success"
						);
					});

				}
				else
				{
					swal(
						"Aviso!",
						"No puede eliminar este registro porque está asociado con otra información.",
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

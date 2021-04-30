//********************************************************************************************************
// TABLA: arc_cliente_contacto
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

	var lscliente_codigo = $("#cmbscliente_codigo").val();
	var lscliente_contacto_codigo = "";
	var lscliente_contacto_nombre = $("#txtscliente_contacto_nombre").val();
	var lsarea_descripcion = $("#txtsarea_descripcion").val();
	var lscargo_descripcion = $("#txtscargo_descripcion").val();
	var lscontacto_central = $("#txtscontacto_central").val();
	var lscliente_contacto_anexo = "";
	var lscliente_contacto_celular_01 = $("#txtscliente_contacto_celular_01").val();
	var lscliente_contacto_celular_02 = $("#txtscliente_contacto_celular_02").val();
	var lscliente_contacto_correo_electronico = $("#txtscliente_contacto_correo_electronico").val();
	var lscliente_contacto_usuario = "";
	var lscliente_contacto_clave = "e10adc3949ba59abbe56e057f20f883e";

	var lsauditoria_usuario = $("#VGL_susuario_codigo").val();

	/*  INICIO: TRANSFORMACION DE VARIABLES */
	lscliente_contacto_nombre 	= lscliente_contacto_nombre.toUpperCase();
	lsarea_descripcion			= lsarea_descripcion.toUpperCase();
	lscargo_descripcion			= lscargo_descripcion.toUpperCase();
	/*  FIN: TRANSFORMACION DE VARIABLES */

	/*  INICIO: VISUALIZAR CONTENIDO DE VARIABLES ----- CONSOLE */
	console.log("lscliente_codigo: " + lscliente_codigo);
	console.log("lscliente_contacto_codigo: " + lscliente_contacto_codigo);
	console.log("lscliente_contacto_nombre: " + lscliente_contacto_nombre);
	console.log("lsarea_descripcion: " + lsarea_descripcion);
	console.log("lscargo_descripcion: " + lscargo_descripcion);
	console.log("lscontacto_central: " + lscontacto_central);
	console.log("lscliente_contacto_anexo: " + lscliente_contacto_anexo);
	console.log("lscliente_contacto_celular_01: " + lscliente_contacto_celular_01);
	console.log("lscliente_contacto_celular_02: " + lscliente_contacto_celular_02);
	console.log("lscliente_contacto_correo_electronico: " + lscliente_contacto_correo_electronico);
	console.log("lscliente_contacto_usuario: " + lscliente_contacto_usuario);
	console.log("lscliente_contacto_clave: " + lscliente_contacto_clave);
	console.log("lsauditoria_usuario: " + lsauditoria_usuario);
	/*  FIN: VISUALIZAR CONTENIDO DE VARIABLES ----- CONSOLE */


	/*  INICIO: FUNCION PARA GRABAR ----- CONTROLADOR */
	$.post("../../controller/arc_cliente_contacto.php?caso=ctrl_agregar",{
		pscliente_codigo : lscliente_codigo,
		pscliente_contacto_codigo : lscliente_contacto_codigo,
		pscliente_contacto_nombre : lscliente_contacto_nombre,
		psarea_descripcion : lsarea_descripcion,
		pscargo_descripcion : lscargo_descripcion,
		pscontacto_central : lscontacto_central,
		pscliente_contacto_anexo : lscliente_contacto_anexo,
		pscliente_contacto_celular_01 : lscliente_contacto_celular_01,
		pscliente_contacto_celular_02 : lscliente_contacto_celular_02,
		pscliente_contacto_correo_electronico : lscliente_contacto_correo_electronico,
		pscliente_contacto_usuario : lscliente_contacto_usuario,
		pscliente_contacto_clave : lscliente_contacto_clave,
		psauditoria_usuario : lsauditoria_usuario
	},function(data, status)
	{
		$("#grdregistro_vista_data").DataTable().ajax.reload();
		$("#modal_registro").modal("hide");

		swal(
			"Confirmación!",
			"El registro se registró correctamente.",
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
			url: "../../controller/arc_cliente_contacto.php?caso=ctrl_obtener_vista_00",
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
			$.post("../../controller/arc_cliente_contacto.php?caso=ctrl_buscar_dependencia",{
					pscodigo_aleatorio:lscodigo_aleatorio}, 
			function(data, status){
				data = JSON.parse(data);
				/** console.log(data); */
				var lnnumero_registros = data.nnumero_registros;
				/** console.log("lnnumero_registros: " + lnnumero_registros); */
				if (lnnumero_registros == "0")
				{

					$.post("../../controller/arc_cliente_contacto.php?caso=ctrl_eliminar",{
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
	
	cmbscliente_codigo__inicializar();
	$("#txtscliente_contacto_nombre").val("");
	$("#txtsarea_codigo").val("");
	$("#txtsarea_descripcion").val("");
	$("#txtscargo_descripcion").val("");
	$("#txtscontacto_central").val("");
	$("#txtscliente_contacto_celular_01").val("");
	$("#txtscliente_contacto_celular_02").val("");
	$("#txtscliente_contacto_correo_electronico").val("");

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

/*  OBJETO: cmbscliente_codigo ------------ METODO: INIT */
function cmbscliente_codigo__inicializar(){
    $("#cmbscliente_codigo").html("");
    
    $.post("../../controller/arc_cliente.php?caso=ctrl_select", {}, 
        function(data, status){
			console.log(data);
            $("#cmbscliente_codigo").html(data);
            $("#cmbscliente_codigo").selectpicker("refresh");
    });
}

/*  OBJETO: cmbscliente_codigo ----------- METODO: CHANGE */
$("#cmbscliente_codigo").change(function(){
    $("#txtscliente_contacto_nombre").focus();
});


init();

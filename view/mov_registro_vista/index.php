<?php
    require_once("../../config/conexion.php"); 
    if(isset($_SESSION["lscliente_codigo"])){
        $cone = new conectar();
        $varempresa = $cone->VariableEmpresa();
        $lsempresa_razon_social = $cone->_mempresa_razon_social();
        $lsempresa_abreviatura = $cone->_mempresa_abreviatura();
        $lsempresa_direccion = $cone->_mempresa_direccion();
        $lsempresa_distrito = $cone->_mempresa_distrito();
        $lsempresa_pagina_web = $cone->_mempresa_pagina_web();
        $lsempresa_correo = $cone->_mempresa_correo();
        $lsempresa_central_telefonica = $cone->_mempresa_central_telefonica();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once("../NavHead/index.php");?>
    <title><?php echo strtoupper($lsempresa_abreviatura)?> :: Registro de documento</title>
</head>
<body>
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		
		<?php require_once("../NavUsuario/index.php");?>
		
		<?php require_once("../NavMenu/index.php");?>
		
		<div id="content" class="content">
		
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Inicio</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Movimientos</a></li>
				<li class="breadcrumb-item active">Documentos</li>
			</ol>

            <h1 class="page-header">Registro de documentos <small></small></h1>
            
            <input type="hidden" id="pstipo_documento_codigo" value="">
            <input type="hidden" id="psguia_serie" value="">
            <input type="hidden" id="psguia_correlativo" value="">

            <input type="hidden" id="pssuperior_aleatorio" value="">
            <input type="hidden" id="pscliente_codigo" value="">

            <input type="hidden" id="hdd_stipo_documento_codigo" value="">
            <input type="hidden" id="hdd_sguia_serie" value="">
            <input type="hidden" id="hdd_sguia_correlativo" value="">
            <input type="hidden" id="hdd_scodigo_aleatorio" value="">
            <input type="hidden" id="hdd_susuario_codigo" value="">
            <input type="hidden" id="hdd_pgdetalle_scodigo_aleatorio" value="">


			<div class="row">
				<div class="col-xl-12">
					<div class="panel panel-inverse">
                    
						<div class="panel-heading">
							<h4 class="panel-title">REGISTRO DE DOCUMENTOS</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
                        </div>

                        <!-- begin CABECERA DE PAGES -->
                        <ul class="nav nav-pills mb-2">
                            <li class="nav-item">
                                <a href="#nav-pills-tab-1" data-toggle="tab" class="nav-link active">
                                    <span class="d-sm-none">REGISTRO</span>
                                    <span class="d-sm-block d-none">REGISTRO</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-2" data-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">BUSQUEDA POR DOCUMENTO</span>
                                    <span class="d-sm-block d-none">BUSQUEDA POR DOCUMENTO</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-3" data-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">BUSQUEDA VARIADA</span>
                                    <span class="d-sm-block d-none">BUSQUEDA VARIADA</span>
                                </a>
                            </li>
                        </ul>
                        <!-- end CABECERA DE PAGES -->

                        <div class="tab-content p-15 rounded bg-white mb-4">
                            <!-- begin PAGE REGISTRO -->
                            <div class="tab-pane fade active show" id="nav-pills-tab-1">
                                <a class="btn btn-success" href="#" id="pgreg_btnnuevo">
                                    <i class="fa fa-trash-o fa-lg"></i> + NUEVO DOCUMENTO
                                </a>
<!-- 
                                <a href="#" class="btn btn-sq btn-outline-primary align-items-left" id="pgreg_btnnuevo">
                                    <i class="fa  fa-2x"></i><br/>
                                    NUEVO <br>DOCUMENTO
                                </a>
                                <a href="#" class="btn btn-sq btn-outline-primary align-items-right" id="pgreg_btnreporte_diario">
                                    <i class="fa  fa-2x"></i><br/>
                                    REPORTE <br>DIARIO
                                </a> -->
                            </div>
                            <!-- end PAGE REGISTRO -->

                            <!-- begin PAGE DOCUMENTO -->
                            <div class="tab-pane fade" id="nav-pills-tab-2">
                                <div class="panel-body">
                                    <div class="row row-space-30">
                                        <div class="form-row">
                                            <div class="col-xl-4">
                                                <label>TIPO DE DOCUMENTO</label>
                                                <select class="selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="pgdoc_cmbstipo_documento_codigo" name="pgdoc_cmbstipo_documento_codigo">
                                                </select>											
                                            </div>
                                            <div class="col-xl-2">
                                                <label>SERIE</label>
                                                <input type="text" class="form-control" id="pgdoc_txtsguia_serie" name="pgdoc_txtsguia_serie" onblur="pgdoc_txtsguia_serie__onblur(this)">
                                            </div>
                                            <div class="col-xl-2">
                                                <label>CORRELATIVO</label>
                                                <input type="text" class="form-control" id="pgdoc_txtsguia_correlativo" name="pgdoc_txtsguia_correlativo" onblur="pgdoc_txtsguia_correlativo__onblur(this)">
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-8">

                                        </div>
                                        <div class="col-xl-2">
                                            <button class="btn btn-primary waves-effect waves-light form-control" id="pgdoc_btnbuscar">BUSCAR</button>
                                        </div>
                                        <div class="col-xl-2">
                                            <button class="btn btn-danger waves-effect waves-light form-control" id="pgdoc_btnlimpiar">LIMPIAR</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end PAGE DOCUMENTO -->

                            <!-- begin PAGE VARIADAS -->
                            <div class="tab-pane fade" id="nav-pills-tab-3">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="row row-space-30">
                                                <div class="col-xl-12">

                                                    <div class="form-row align-items-center">
                                                        <div class="col-xl-6">
                                                            <label>AMBITO DEL SERVICIO</label>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <select class="selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="pgvar_cmbstipo_servicio_codigo" name="pgvar_cmbstipo_servicio_codigo">
                                                            </select>											
                                                        </div>
                                                    </div>
                                                    <div class="form-row align-items-center">
                                                        <div class="col-xl-6">
                                                            <label>DESTINO</label>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <select class="selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="pgvar_cmbsruta_servicio_destino_codigo" name="pgvar_cmbsruta_servicio_destino_codigo">
                                                            </select>											
                                                        </div>
                                                    </div>
                                                    <div class="form-row align-items-center">
                                                        <div class="col-xl-6">
                                                            <label>GRUPO DE CLIENTE</label>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <select class="selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="pgvar_cmbsgrupo_cliente_codigo" name="pgvar_cmbsgrupo_cliente_codigo">
                                                            </select>											
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 align-items-center">
                                            <div class="row row-space-30">
                                                <div class="col-xl-12">
                                                    <div class="form-row align-items-center">
                                                        <div class="col-xl-6">
                                                            <label>FECHA INICIAL</label>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <input class="form-control" type="text" id="pgvar_dtpdfecha_inicial" name="pgvar_dtpdfecha_inicial" data-parsley-required="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-row align-items-center">
                                                        <div class="col-xl-6">
                                                            <label>FECHA FINAL</label>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <input class="form-control" type="text" id="pgvar_dtpdfecha_final" name="pgvar_dtpdfecha_final" data-parsley-required="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-row align-items-center">
                                                        <div class="col-xl-6">
                                                            <label>HOJA DE RUTA</label>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <input type="text" class="form-control" id="pgvar_txtsguia_hoja_ruta" name="pgvar_txtsguia_hoja_ruta">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row align-items-right">
                                        <div class="col-xl-8">

                                        </div>
                                        <div class="col-xl-2">
                                            <button class="btn btn-primary waves-effect waves-light form-control" id="pgvar_btnbuscar">BUSCAR</button>
                                        </div>
                                        <div class="col-xl-2">
                                            <button class="btn btn-danger waves-effect waves-light form-control" id="pgvar_btnlimpiar">LIMPIAR</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end PAGE VARIADAS -->
                        </div>
                            
                        <!-- begin GRILLA DOCUMENTOS REGISTRADOS -->
                        <div class="panel-body">
                            <table id="grdregistro_vista_data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>EST</th>
                                        <!-- <th>PRIOR</th> -->
                                        <th>AMB</th>
                                        <th>ORI</th>
                                        <th>DES</th>
                                        <th>TIPO</th>
                                        <th>DOCUMENTO</th>
                                        <!-- <th>GRUPO</th> -->
                                        <th>REMITENTE</th>
                                        <th>DESTINATARIO</th>
                                        <th>EMISION</th>
                                        <th>VENC.</th>
                                        <th>RPT</th>
                                        <th class="text-right" width="10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td></td>
                                        <!-- <td></td> -->
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <!-- <td></td> -->
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end GRILLA DOCUMENTOS REGISTRADOS  -->
					</div>
				</div>
            </div>

			<!-- begin DATOS BASICOS -->
            <div class="row" id="paneldatos">
                <div class="col-xl-12">
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title">DATOS BASICOS</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
                        </div>

                        <div class="panel-body">
                            <!-- begin LOGO -->
                            <!-- end LOGO -->    
                            
                            <!-- begin REMITENTE-DESTINATARIO -->
                            <div class="row invoice">
                                <div class="row row-space-30 invoice-header">
                                    
                                    <div class="col-xl-4">
                                        <button type="button" class="btn btn-primary m-r-5 m-b-5" id="btneditarremitente"> EDITAR</button>
                                        <small>REMITENTE</small>
                                        <address class="m-t-5 m-b-5">
                                            <strong class="text-inverse" id="sremite_cliente_razon_social"></strong><br>
                                            <p id="sremite_cliente_direccion"></p>
                                            <p id="sruta_origen_descripcion"></p>
                                            <p id="sremite_cliente_codigo"></p>
                                        </address>
                                    </div>

                                    <div class="col-xl-4">
                                        <button type="button" class="btn btn-primary m-r-5 m-b-5" id="btneditardestinatario"> EDITAR</button>
                                        <small>DESTINATARIO</small>
                                        <address class="m-t-5 m-b-5">
                                            <strong class="text-inverse" id="sconsigna_empresa_descripcion"></strong><br>
                                            <p id="sdestino_empresa_direccion"></p>
                                            <p id="sruta_destino_descripcion"></p>
                                        </address>
                                    </div>

                                    <div class="col-xl-4 invoice-date">
                                        <small>DOCUMENTO <?php echo strtoupper($lsempresa_abreviatura)?></small>
                                        <address class="m-t-5 m-b-5">
                                            <strong class="text-inverse" id="sguia_numero_completo">001-001441</strong><br>
                                            <p id="stipo_documento_descripcion">NACIONAL - NAC </p>
                                            <p id="scodigo_aleatorio"># 42132EC767</p>
                                        </address>
                                    </div> 

                                </div>

                            </div>
                            <!-- end REMITENTE-DESTINATARIO -->

                            <!-- begin DATOS DE CABECERA -->
                            <button type="button" class="btn btn-primary m-r-5 m-b-5" id="btneditarcabecera"> EDITAR</button>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="row row-space-30">
                                        <div class="col-xl-12">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-left bg-grey" width="40%">RUTA DEL SERVICIO</th>
                                                        <th class="text-left bg-white" width="60%" id="sruta_servicio_descripcion">LIMA - HUACHO</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-left bg-grey" width="40%">FECHA DE EMISION</th>
                                                        <th class="text-left bg-white" width="60%" id="sguia_fecha_emision_texto">DEMO</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-left bg-grey" width="40%">FECHA DE VENCIMIENTO</th>
                                                        <th class="text-left bg-white" width="60%" id="sguia_fecha_vencimiento_texto">DEMO</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-left bg-grey" width="40%">FECHA DE RETORNO LIMITE</th>
                                                        <th class="text-left bg-white" width="60%" id="sguia_fecha_retorno_texto">DEMO</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-left bg-grey" width="40%">PRIORIDAD DE ATENCION</th>
                                                        <th class="text-left bg-white" width="60%" id="sprioridad_descripcion">DEMO</th>
                                                    </tr>
                                                </thead>
                                            </table> 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                        <div class="row row-space-30">
                                            <div class="col-xl-12">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-left bg-grey" width="40%">DOCUMENTO EN LICITACION</th>
                                                            <th class="text-left bg-white" width="60%" id="sguia_licitacion"></th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-left bg-grey" width="40%">DOCUMENTO EXCLUSIVO</th>
                                                            <th class="text-left bg-white" width="60%" id="sguia_exclusivo"></th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-left bg-grey" width="40%">NRO. DE REPORTE</th>
                                                            <th class="text-left bg-white" width="60%" id="sguia_numero_reporte"></th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-left bg-grey" width="40%">ESTADO DEL DOCUMENTO</th>
                                                            <th class="text-left bg-white" width="60%" id="sguia_estado_descripcion"></th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-left bg-grey" width="40%">HOJA DE RUTA</th>
                                                            <th class="text-left bg-white" width="60%" id="sguia_hoja_ruta"></th>
                                                        </tr>
                                                    </thead>
                                                </table> 
                                            </div>
                                        </div>        
                                </div>

                            </div>
                            <!-- end DATOS DE CABECERA -->

                        </div>    
                    </div>
                </div>
            </div>
            <!-- end DATOS BASICOS -->

			<!-- begin DETALLE DE PRODUCTOS -->
            <div class="row" id="paneldetalle">
                <div class="col-xl-12">
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title">DETALLE DE PRODUCTOS</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
                        </div>
                        <div class="panel-body">
                            <button type="button" class="btn btn-primary m-r-5 m-b-5" id="nuevodetalle"> + NUEVO</button>
                            <div class="row">
                                <div class="col-xl-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-left" width="10%">PRODUCTO</th>
                                                <th class="text-left" width="30%">DESCRIPCION</th>
                                                <th class="text-right" width="10%">CANTIDAD</th>
                                                <th class="text-center" width="10%">UNIDAD</th>
                                                <th class="text-right" width="10%">PESO</th>
                                                <th class="text-right" width="10%">CTO MINIMO</th>
                                                <th class="text-right" width="10%">ACCION</th>
                                            </tr>
                                        </thead>
                            
                                        <tbody id="grdproducto_detalle_data">
                                            
                                        </tbody>
                                    </table>       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end DETALLE DE PRODUCTOS -->

			<!-- begin DOCUMENTOS DEL CLIENTE -->
            <div class="row" id="paneldocumento">
                <div class="col-xl-12">
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title">DOCUMENTOS DEL CLIENTE</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
                        </div>
                        <div class="panel-body">
                            <button type="button" class="btn btn-primary m-r-5 m-b-5" id="nuevodocumento">+ NUEVO</button>
                            <div class="row">
                                <div class="col-xl-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-left" width="5%">DOC.</th>
                                                <th class="text-left" width="15%">TIPO</th>
                                                <th class="text-left" width="5%">NUMERO</th>
                                                <th class="text-left" width="5%">RETORNO</th>
                                                <th class="text-left" width="5%">EN CLIENTE</th>
                                                <th class="text-left" width="20%">PERSONA CLIENTE</th>
                                                <th class="text-left" width="40%">ARCHIVO</th>
                                                <th class="text-right" width="10%">ACCION</th>
                                            </tr>
                                        </thead>                                  
                                        <tbody id="grd_documentos_cliente_data">
                                                
                                        </tbody>
                                    </table>       
                                </div>
                            </div>                      
                        </div>
                    </div>
                </div>
            </div>
            <!-- end DOCUMENTOS DEL CLIENTE -->

            <!-- begin DATOS DEL REPRESENTANTE/PROVEEDOR  -->
            <div class="row" id="panelproveedor">
                <div class="col-xl-6">
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title">DATOS DEL REPRESENTANTE</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
                        </div>
                        <div class="panel-body">
                            <button type="button" class="btn btn-primary m-r-5 m-b-5" id="editarrepresentante"> EDITAR</button>
                            <div class="row row-space-30">
                                <div class="col-xl-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-left bg-grey" width="40%">AGENTE</th>
                                                <th class="text-left bg-white" width="60%" id="sagente_nombre"></th>
                                            </tr>
                                            <tr>
                                                <th class="text-left bg-grey" width="40%">TIPO DE SERVICIO</th>
                                                <th class="text-left bg-white" width="60%" id="stipo_servicio_descripcion"></th>
                                            </tr>
                                            <tr>
                                                <th class="text-left bg-grey" width="40%">RUTA DEL DESTINO</th>
                                                <th class="text-left bg-white" width="60%" id="sruta_servicio_descripcionx"></th>
                                            </tr>
                                            <tr>
                                                <th class="text-left bg-grey" width="40%">OBSERVACIONES</th>
                                                <th class="text-left bg-white" width="60%" id="smanifiesto_observacion"></th>
                                            </tr>
                                        </thead>
                                    </table> 
                                </div>
                            </div>
                        </div>
					</div>
                </div>
                
                <div class="col-xl-6">
					<div class="panel panel-inverse">
                        <div class="panel-heading">
							<h4 class="panel-title">DATOS DEL PROVEEDOR</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
                        </div>
                        
                        <div class="panel-body">
                            <button type="button" class="btn btn-primary m-r-5 m-b-5" id="editarproveedor"> EDITAR</button>
                            <div class="row row-space-30">
                                <div class="col-xl-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-left bg-grey" width="40%">PROVEEDOR DE SERVICIO</th>
                                                <th class="text-left bg-white" width="60%" id="sproveedor_razon_social"></th>
                                            </tr>
                                            <tr>
                                                <th class="text-left bg-grey" width="40%">TIPO DE TRANSPORTE</th>
                                                <th class="text-left bg-white" width="60%" id="stipo_transporte_descripcion"></th>
                                            </tr>
                                            <tr>
                                                <th class="text-left bg-grey" width="40%">FECHA DE SALIDA</th>
                                                <th class="text-left bg-white" width="60%" id="smanifiesto_fecha_salida_texto"></th>
                                            </tr>
                                            <tr>
                                                <th class="text-left bg-grey" width="40%">DIAS DE TRANSITO</th>
                                                <th class="text-left bg-white" width="60%" id="nmanifiesto_dias_transito"></th>
                                            </tr>
                                            <tr>
                                                <th class="text-left bg-grey" width="40%">DESPACHADOR</th>
                                                <th class="text-left bg-white" width="60%" id="smanifiesto_despachador"></th>
                                            </tr>
                                            <tr>
                                                <th class="text-left bg-grey" width="40%">FAC/BOL PROVEEDOR</th>
                                                <th class="text-left bg-white" width="60%" id="smanifiesto_proveedor_documento"></th>
                                            </tr>
                                        </thead>
                                    </table> 
                                </div>
                            </div>
                        </div>
					</div>
				</div>
            </div>
            <!-- end DATOS DEL REPRESENTANTE/PROVEEDOR  -->
		
		    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
            
        </div>

    </div>

    <?php require_once("modalremitenteeditar.php");?>
    <?php require_once("modaldestinatarioeditar.php");?>
    <?php require_once("modalcabeceraeditar.php");?>
    <?php require_once("modaldetalle.php");?>
    <?php require_once("modaldocumento.php");?>
    <?php require_once("modalrepresentante.php");?>
    <?php require_once("modalproveedor.php");?>
    <?php require_once("modaldetalleeditar.php");?>
    <?php require_once("../NavJs/index.php");?>

	<script src="mov_registro_vista.js"></script>

</body>
</html>
<?php
    }else{
        header("Location:".Conectar::ruta()."404.php");
    }
?>
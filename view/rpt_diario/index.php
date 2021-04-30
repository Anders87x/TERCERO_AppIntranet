<?php
    require_once("../../config/conexion.php"); 
    if(isset($_SESSION["lscliente_codigo"])){
        $cone = new conectar();
        $varempresa = $cone->VariableEmpresa();
        $lsempresa_razon_social = $cone->_mempresa_razon_social();
        $lsempresa_abreviatura = $cone->_mempresa_abreviatura();
        $lsempresa_variable = $cone->_mempresa_variable();
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
    <title><?php echo strtoupper($lsempresa_abreviatura)?> :: Reporte diario de documentos</title>
</head>
<body>
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		
		<?php require_once("../NavUsuario/index.php");?>
		
		<?php require_once("../NavMenu/index.php");?>
		
		<div id="content" class="content">
		
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Inicio</a></li>
				<li class="breadcrumb-item active">Reporte diario</li>
			</ol>

            <h1 class="page-header">Reporte diario de documentos<small></small></h1>
            
            <input type="hidden" id="pstipo_documento_codigo" value="">
            <input type="hidden" id="psguia_serie" value="">
            <input type="hidden" id="psguia_correlativo" value="">

            <input type="hidden" id="pssuperior_aleatorio" value="">
            <input type="hidden" id="pscliente_codigo" value="">

            <input type="hidden" id="txtstipo_servicio_codigo" value="">
            <input type="hidden" id="txtsruta_origen_codigo" value="">
            <input type="hidden" id="txtsruta_destino_codigo" value="">

			<div class="row">
				<div class="col-xl-12">
					<div class="panel panel-inverse">
                    
						<div class="panel-heading">
							<h4 class="panel-title">REPORTE DIARIO DE DOCUMENTOS</h4>
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
                                    <span class="d-sm-none">BUSQUEDA VARIADA</span>
                                    <span class="d-sm-block d-none">BUSQUEDA VARIADA</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-2" data-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">NUMERO DE REPORTE</span>
                                    <span class="d-sm-block d-none">NUMERO DE REPORTE</span>
                                </a>
                            </li>
<!--                             <li class="nav-item">
                                <a href="#nav-pills-tab-3" data-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">NRO DE PEDIDO</span>
                                    <span class="d-sm-block d-none">NRO DE PEDIDO</span>
                                </a>
                            </li> -->
                        </ul>
                        <!-- end CABECERA DE PAGES -->

                        <div class="tab-content p-15 rounded bg-white mb-4">

                            <!-- begin PAGE VARIADAS -->
                            <div class="tab-pane fade active show" id="nav-pills-tab-1">
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
                                                            <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="pgvar_cmbstipo_servicio_codigo" name="pgvar_cmbstipo_servicio_codigo">
                                                            </select>											
                                                        </div>
                                                    </div>
                                                    <div class="form-row align-items-center">
                                                        <div class="col-xl-6">
                                                            <label>DESTINO</label>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="pgvar_cmbsruta_servicio_destino_codigo" name="pgvar_cmbsruta_servicio_destino_codigo">
                                                            </select>											
                                                        </div>
                                                    </div>
                                                    <div class="form-row align-items-center">
                                                        <div class="col-xl-6">
                                                            <label>GRUPO DE CLIENTE</label>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="pgvar_cmbsgrupo_cliente_codigo" name="pgvar_cmbsgrupo_cliente_codigo">
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
                                                            <label>ESTADO DEL DOCUMENTO</label>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="pgvar_cmbsguia_estado" name="pgvar_cmbsguia_estado">
                                                            </select>											
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="form-row align-items-right">
                                        <div class="col-xl-6">

                                        </div>
                                        <div class="col-xl-2">
                                            <button class="btn btn-primary waves-effect waves-light form-control" id="pgvar_btnbuscar">BUSCAR</button>
                                        </div>
                                        <div class="col-xl-2">
                                            <button class="btn btn-info waves-effect waves-light form-control" id="pgvar_btnexportar">EXPORTAR XML</button>
                                        </div>
                                        <div class="col-xl-2">
                                            <button class="btn btn-danger waves-effect waves-light form-control" id="pgvar_btnlimpiar">LIMPIAR</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end PAGE VARIADAS -->

                            <!-- begin PAGE NRO DE REPORTE -->
                            <div class="tab-pane fade" id="nav-pills-tab-2">
                                <div class="panel-body">
                                    <div class="row row-space-30">
                                        <div class="form-row">
                                            <div class="col-xl-12">
                                                <label>NRO DE REPORTE</label>
                                                <input type="text" maxlength="10" style="text-transform:uppercase;" class="form-control" id="pgrep_txtsguia_numero_reporte" name="pgrep_txtsguia_numero_reporte">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col-xl-6">
                                        </div>
                                        <div class="col-xl-2">
                                            <button class="btn btn-primary waves-effect waves-light form-control" id="pgrep_btnbuscar">BUSCAR</button>
                                        </div>
                                        <div class="col-xl-2">
                                            <button class="btn btn-info waves-effect waves-light form-control" id="pgrep_btnexportar">EXPORTAR XML</button>
                                        </div>
                                        <div class="col-xl-2">
                                            <button class="btn btn-danger waves-effect waves-light form-control" id="pgrep_btnlimpiar">LIMPIAR</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end PAGE NRO DE REPORTE -->

                            <!-- begin PAGE NRO DE PEDIDO -->
                            <div class="tab-pane fade" id="nav-pills-tab-3">
                                <div class="panel-body">
                                    <div class="row row-space-30">
                                        <div class="form-row">
                                            <div class="col-xl-12">
                                                <label>NRO DE PEDIDO</label>
                                                <input type="text" class="form-control" maxlength="10" style="text-transform:uppercase;" id="pgped_txtsguia_numero_pedido" name="pgped_txtsguia_numero_pedido">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row align-items-right">
                                        <div class="col-xl-6">

                                        </div>
                                        <div class="col-xl-2">
                                            <button class="btn btn-primary waves-effect waves-light form-control" id="pgped_btnbuscar">BUSCAR</button>
                                        </div>
                                        <div class="col-xl-2">
                                            <button class="btn btn-info waves-effect waves-light form-control" id="pgped_btnexportar">EXPORTAR XML</button>
                                        </div>
                                        <div class="col-xl-2">
                                            <button class="btn btn-danger waves-effect waves-light form-control" id="pgped_btnlimpiar">LIMPIAR</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end PAGE NRO DE PEDIDO -->

                        </div>
                            
                        <!-- begin GRILLA CONSULTA DOCUMENTOS -->
                        <div class="panel-body">
                            <table id="grdconsulta_vista_data" class="display compact table table-striped table-bordered" cellspacing="0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">TIPO</th>
                                        <th class="text-center">DOC. <?php echo strtoupper($lsempresa_abreviatura)?></th>
                                        <th class="text-center">ORIGEN</th>
                                        <th class="text-center">DESTINO</th>
                                        <th class="text-center">ESTADO</th>
                                        <th class="text-center">FECHA RECEPCION</th>
                                        <th class="text-center">PRIORIDAD</th>
                                        <th class="text-center">REMITENTE</th>
                                        <th class="text-center">CONSIGNATARIO</th>
                                        <th class="text-center">TIPO TRANSPORTE</th>
                                        <th class="text-center">FECHA ATENCION</th>
                                        <th class="text-center">PERSONA DE CONFIRMA</th>
                                        <th class="text-center">PRODUCTO</th>
                                        <th class="text-center">CANT</th>
                                        <th class="text-center">PESO</th>
                                        <th class="text-center">DOCUMENTO DEL CLIENTE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right"></td>
                                        <td class="text-right"></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end GRILLA CONSULTA DOCUMENTOS  -->

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
                            <div>
                                <div class="image">
                                    <img src="..\..\imagen\logo_empresa.png" alt="20" width="300">
                                </div>
                                <address class="m-t-5 m-b-5">
                                    <strong class="text-inverse"><?php echo $lsempresa_razon_social?></strong><br>
                                    <?php echo $lsempresa_direccion?><br>
                                    <?php echo $lsempresa_distrito?><br>
                                    correo: <?php echo $lsempresa_correo?><br>						
                                </address>
                            </div>		
                            <!-- end LOGO -->    
                            
                            <!-- begin REMITENTE-DESTINATARIO -->
                            <div class="row invoice">
                                <div class="row row-space-30 invoice-header">

                                    <div class="col-xl-4">
                                        <small>REMITENTE</small>
                                        <address class="m-t-5 m-b-5">
                                            <strong class="text-inverse" id="sremite_cliente_razon_social"></strong><br>
                                            <p id="sremite_cliente_direccion"></p>
                                            <p id="sruta_origen_descripcion"></p>
                                            <p id="sremite_cliente_codigo"></p>
                                        </address>
                                    </div>

                                    <div class="col-xl-4">
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
                                                            <th class="text-left bg-white" width="60%" id="sguia_licitacion">DEMO</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-left bg-grey" width="40%">DOCUMENTO EXCLUSIVO</th>
                                                            <th class="text-left bg-white" width="60%" id="sguia_exclusivo">DEMO</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-left bg-grey" width="40%">NRO. DE REPORTE</th>
                                                            <th class="text-left bg-white" width="60%" id="sguia_numero_reporte">DEMO</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-left bg-grey" width="40%">ESTADO DEL DOCUMENTO</th>
                                                            <th class="text-left bg-white" width="60%" id="sguia_estado_descripcion">DEMO</th>
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

			<!-- begin DATOS DE RETORNO -->
            <div class="row" id="panelretorno">
                <div class="col-xl-12">
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title">DATOS DEL RETORNO</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-left" width="10%">FECHA</th>
                                                <th class="text-left" width="10%">HORA</th>
                                                <th class="text-left" width="10%">NRO. REPORTE</th>
                                                <th class="text-left" width="40%">OBSERVACION</th>
                                                <th class="text-right" width="10%">ACCION</th>
                                            </tr>
                                        </thead>
                            
                                        <tbody id="grdretorno_data">
                                            
                                        </tbody>
                                    </table>       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end RETORNO DE DOCUMENTO -->
            
			<!-- begin DATOS DE CONFIRMACION -->
            <div class="row" id="panelconfirmacion">
                <div class="col-xl-12">
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title">DATOS DE CONFIRMACION</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-left" width="10%">FECHA</th>
                                                <th class="text-left" width="10%">HORA</th>
                                                <th class="text-left" width="30%">PERSONA</th>
                                                <th class="text-left" width="10%">DOC. IDENTIDAD</th>
                                                <th class="text-center" width="10%">NRO. VISITAS</th>
                                                <th class="text-left" width="30%">OBSERVACION</th>
                                                <th class="text-right" width="10%">ACCION</th>
                                            </tr>
                                        </thead>
                            
                                        <tbody id="grdconfirmacion_data">
                                            
                                        </tbody>
                                    </table>       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end CONFIRMACION DE DOCUMENTO -->

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
                            <!-- <button type="button" class="btn btn-primary m-r-5 m-b-5" id="nuevodetalle">Nuevo</button> -->
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
                            <!-- <button type="button" class="btn btn-primary m-r-5 m-b-5" id="nuevodocumento">Nuevo</button> -->
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

			<!-- begin INCIDENCIAS -->
            <div class="row" id="panelincidencia">
                <div class="col-xl-12">
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title">INCIDENCIAS REPORTADAS</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
                        </div>
                        <div class="panel-body">
                            <!-- <button type="button" class="btn btn-primary m-r-5 m-b-5" id="nuevaincidencia">Nuevo</button> -->
                            <div class="row">
                                <div class="col-xl-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-left" width="15%">TIPO</th>
                                                <th class="text-left" width="10%">FECHA</th>
                                                <th class="text-left" width="10%">HORA</th>
                                                <th class="text-left" width="50%">OBSERVACION</th>
                                                <th class="text-right" width="10%">ACCION</th>
                                            </tr>
                                        </thead>                                  
                                        <tbody id="grdincidencia_data">
                                                
                                        </tbody>
                                    </table>       
                                </div>
                            </div>                      
                        </div>
                    </div>
                </div>
            </div>
            <!-- end INCIDENCIAS -->
		
		    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
            
        </div>

    </div>

    <?php require_once("../NavJs/index.php");?>

	<script src="rpt_diario.js"></script>

</body>
</html>
<?php
    }else{
        header("Location:".Conectar::ruta()."404.php");
    }
?>
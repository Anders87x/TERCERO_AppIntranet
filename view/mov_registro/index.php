<?php
    require_once("../../config/conexion.php"); 
    if(isset($_SESSION["lscliente_codigo"])){
        $cone = new conectar();
        $varempresa = $cone->VariableEmpresa();
        $lsempresa_razon_social = $cone->_mempresa_razon_social();
        $lsempresa_abreviatura = $cone->_mempresa_abreviatura();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../NavHead/index.php");?>
    <title><?php echo strtoupper($lsempresa_abreviatura)?> :: Nuevo documento</title>
</head>
<body>
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		
		<?php require_once("../NavUsuario/index.php");?>
		
		<?php require_once("../NavMenu/index.php");?>
		
		<div id="content" class="content">
		
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Inicio</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Registro de documento</a></li>
				<li class="breadcrumb-item active">Nuevo</li>
			</ol>

			<h1 class="page-header">Nuevo registro <small>de documento...</small></h1>

            <input type="hidden" id="ID_GUIA" name="ID_GUIA">
            <input type="hidden" id="ID_MANIFIESTO" name="ID_MANIFIESTO">

            <!-- <form method="post" data-parsley-validate="false" id="frmmov_registro_mnto" > -->
                
                <!-- Begin DATOS BASICOS -->
                <div class="row">
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
                                <div class="row row-space-30">
                                    <div class="col-xl-4">
                                        <div class="form-group row m-b-12 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="cmbstipo_documento_codigo">TIPO DE DOCUMENTO</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-width="80%" data-live-search="true" data-style="btn-white" id="cmbstipo_documento_codigo" name="cmbstipo_documento_codigo" placeholder="" data-parsley-required="true"></select>											
                                                <button class="btn btn-outline-success btn-icon btn-circle" onClick="cmbstipo_documento_codigo__inicializar()" data-toggle="tooltip" title="Actualizar"><i class="fas fa-spinner"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-12">
                                            <label class="col-md-4 col-sm-4 col-form-label col-form-label-sm" >NRO. DE DOCUMENTO</label>
                                            <div class="col-md-3 col-sm-3">
                                                <input class="form-control" type="text" maxlength="3" id="txtsguia_serie" name="txtsguia_serie" placeholder="SERIE" data-parsley-required="true" onblur="txtsguia_serie__onblur(this)">
                                                <div class="invalid-feedback">Ingrese nro. de serie.</div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 ">
                                                <input class="form-control" type="text" maxlength="6" id="txtsguia_correlativo" name="txtsguia_correlativo" placeholder="CORRELATIVO" data-parsley-required="true" onblur="txtsguia_correlativo__onblur(this)">
                                                <div class="invalid-feedback">Ingrese nro. de correlativo.</div>
                                            </div>                                    
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="form-group row m-b-12 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="txtsguia_hoja_ruta">HOJA DE RUTA</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control" maxlength="10" type="text" id="txtsguia_hoja_ruta" name="txtsguia_hoja_ruta" placeholder="AAAAMMDD-99" data-parsley-required="false">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-12">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="dtpdguia_fecha_recepcion">FECHA DE RECEPCIÓN</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control" type="text" id="dtpdguia_fecha_recepcion" name="dtpdguia_fecha_recepcion" data-parsley-required="true">
                                                <small id="dtpdguia_fecha_recepcion" class="form-text text-muted">Recepción del documento</small>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-xl-4">
                                        <div class="form-group row m-b-12 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="dtpdguia_fecha_vencimiento">FECHA LIMITE DE ATENCION</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control" type="text" id="dtpdguia_fecha_vencimiento" name="dtpdguia_fecha_vencimiento"  data-date-format="dd/mm/yyyy" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-12 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="dtpdguia_fecha_retorno">FECHA DE RETORNO</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control" type="text" id="dtpdguia_fecha_retorno" name="dtpdguia_fecha_retorno"  data-date-format="dd/mm/yyyy" data-parsley-required="true">
                                                <small id="dtpdguia_fecha_retorno" class="form-text text-muted">Retorno de documento a oficinas</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End DATOS BASICOS  -->

                <!-- Begin DATOS DEL REMITENTE/DESTINATARIO  -->
                <div class="row">

                    <div class="col-xl-6">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <h4 class="panel-title">DATOS DEL REMITENTE</h4>
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            
                            <div class="panel-body">
                                <div class="row row-space-30">
                                    <div class="col-xl-12">
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="cmbsgrupo_cliente_codigo">GRUPO DE CLIENTE</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select  class="selectpicker" data-width="90%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsgrupo_cliente_codigo" name="cmbsgrupo_cliente_codigo" placeholder="" data-parsley-required="true"></select>
                                                <button class="btn btn-outline-success btn-icon btn-circle" onClick="cmbsgrupo_cliente_codigo__inicializar()" data-toggle="tooltip" title="Actualizar"><i class="fas fa-spinner"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="cmbsremite_cliente_codigo">REMITENTE</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsremite_cliente_codigo" name="cmbsremite_cliente_codigo" placeholder="" data-parsley-required="true"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="txtsremite_cliente_direccion">DIRECCIÓN</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control" type="text" style="text-transform:uppercase;" id="txtsremite_cliente_direccion" name="txtsremite_cliente_direccion" placeholder="" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="cmbsremite_departamento_codigo">DEPARTAMENTO</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-width="100%" data-size="10" data-style="btn-white" id="cmbsremite_departamento_codigo" name="cmbsremite_departamento_codigo" data-parsley-required="true"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="cmbsremite_provincia_codigo">PROVINCIA</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-width="100%" data-size="10" data-style="btn-white" id="cmbsremite_provincia_codigo" name="cmbsremite_provincia_codigo" data-parsley-required="true"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="cmbsremite_distrito_codigo">DISTRITO</label>
                                            <div class="col-md-8 col-sm-8">
                                            <select class="selectpicker" data-width="100%" data-size="10" data-style="btn-white" id="cmbsremite_distrito_codigo" name="cmbsremite_distrito_codigo" data-parsley-required="true"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="txtsremite_atencion">ATENCIÓN</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control" type="text" style="text-transform:uppercase;" id="txtsremite_atencion" name="txtsremite_atencion" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <h4 class="panel-title">DATOS DEL DESTINATARIO</h4>
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            
                            <div class="panel-body">
                                <div class="row row-space-30">
                                    <div class="col-xl-12">
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="cmbsdestino_empresa_razon_social">DESTINATARIO</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-width="90%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsdestino_empresa_razon_social" name="cmbsdestino_empresa_razon_social" placeholder="" data-parsley-required="true"></select>
                                                <button class="btn btn-outline-success btn-icon btn-circle" onClick="cmbsdestino_empresa_razon_social__inicializar()" data-toggle="tooltip" title="Actualizar"><i class="fas fa-spinner"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="txtsdestino_empresa_direccion">DIRECCIÓN</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control" type="text" style="text-transform:uppercase;" id="txtsdestino_empresa_direccion" name="txtsdestino_empresa_direccion" placeholder="" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="cmbsdestino_departamento_codigo">DEPARTAMENTO</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsdestino_departamento_codigo" name="cmbsdestino_departamento_codigo" placeholder="" data-parsley-required="true"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="cmbsdestino_provincia_codigo">PROVINCIA</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsdestino_provincia_codigo" name="cmbsdestino_provincia_codigo" placeholder="" data-parsley-required="true"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="cmbsdestino_distrito_codigo">DISTRITO</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsdestino_distrito_codigo" name="cmbsdestino_distrito_codigo" placeholder="" data-parsley-required="true"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="txtsdestino_atencion">ATENCIÓN</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control" type="text" style="text-transform:uppercase;" id="txtsdestino_atencion" name="txtsdestino_atencion" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End DATOS DEL REMITENTE/DESTINATARIO  -->

                <!-- Begin DETALLE/DOCUMENTOS/MANIFIESTO  -->
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="nav nav-pills mb-2">
                            <li class="nav-item">
                                <a href="#nav-pills-tab-1" data-toggle="tab" class="nav-link active">
                                    <span class="d-sm-none">DETALLE DEL DOCUMENTO</span>
                                    <span class="d-sm-block d-none">DETALLE DEL DOCUMENTO</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-2" data-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">DOCUMENTOS DEL CLIENTE</span>
                                    <span class="d-sm-block d-none">DOCUMENTOS DEL CLIENTE</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-3" data-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">MANIFIESTO</span>
                                    <span class="d-sm-block d-none">MANIFIESTO</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content p-15 rounded bg-white mb-4" id="pgdetalle_form" data-parsley-validate="true">
                            <!-- Begin DETALLE  -->
                            <div class="tab-pane fade active show" id="nav-pills-tab-1">
                                <div class="panel-body">
                                    <div class="row row-space-30">
                                        <div class="col-xl-4">
                                            <div class="form-group row m-b-15 form-row align-items-center">
                                                <label class="col-md-4 col-sm-4 col-form-label" for="pgdetalle_cbosproducto_codigo">TIPO PRODUCTO</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <select class="selectpicker" data-width="80%" data-size="10" data-live-search="true" data-style="btn-white" id="pgdetalle_cbosproducto_codigo" name="pgdetalle_cbosproducto_codigo" placeholder="" data-parsley-required="false"></select>
                                                    <button class="btn btn-outline-success btn-icon btn-circle" onClick="pgdetalle_cbosproducto_codigo__inicializar()" data-toggle="tooltip" title="Actualizar"><i class="fas fa-spinner"></i></button>
                                                </div>
                                            </div>
                                            <div class="form-group row m-b-15 form-row align-items-center">
                                                <label class="col-md-4 col-sm-4 col-form-label" for="pgdetalle_txtsproducto_descripcion">DESCRIPCION</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <input class="form-control" type="text" id="pgdetalle_txtsproducto_descripcion" name="pgdetalle_txtsproducto_descripcion" style="text-transform:uppercase" placeholder="" data-parsley-required="false">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4">
                                            <div class="form-group row m-b-15 form-row align-items-center">
                                                <label class="col-md-4 col-sm-4 col-form-label" for="pgdetalle_spnnproducto_cantidad">CANT.</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <input class="form-control" type="number" data-decimals="2" min="0" step="0.01" value = "0.00" id="pgdetalle_spnnproducto_cantidad" name="pgdetalle_spnnproducto_cantidad" placeholder="" data-parsley-required="false">

                                                </div>
                                            </div>
                                            <div class="form-group row m-b-15 form-row align-items-center">
                                                <label class="col-md-4 col-sm-4 col-form-label" for="pgdetalle_spnnproducto_peso">PESO</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <input class="form-control" type="number" data-decimals="2" min="0" step="0.01" value = "0.00" id="pgdetalle_spnnproducto_peso" name="pgdetalle_spnnproducto_peso" placeholder="" data-parsley-required="false">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4">
                                            <div class="form-group row m-b-15 form-row align-items-center">
                                                <label class="col-md-4 col-sm-4 col-form-label" for="pgdetalle_spnnproducto_costo">CTO. MINIMO</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <input class="form-control" type="number" data-decimals="2" min="0" step="0.01" value = "0.00" id="pgdetalle_spnnproducto_costo" name="pgdetalle_spnnproducto_costo" placeholder="" data-parsley-required="false">
                                                </div>
                                            </div>
                                            <div class="form-group row m-b-15 form-row align-items-center">
                                                <label class="col-md-4 col-sm-4 col-form-label" for="pgdetalle_txtsproducto_unidad">UNIDAD MEDIDA</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <input class="form-control" type="text" disabled id="pgdetalle_txtsproducto_unidad" name="pgdetalle_txtsproducto_unidad" placeholder="" data-parsley-required="false">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-row align-items-right">
                                                <div class="col-xl-11"> </div>
                                                <div class="col-xl-1">
                                                    <button class="btn btn-primary waves-effect waves-light form-control" id="pgdetalle_btngrabar"  type="submit">GRABAR</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <table id="detalle_data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>DESCRIPCIÓN</th>
                                                        <th>CANTIDAD</th>
                                                        <th>PESO</th>
                                                        <th>CTO MINIMO</th>
                                                        <th>UNIDAD</th>
                                                        <th>ACCION</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="listdetalles">

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- End DETALLE  -->

                            <!-- Begin DOCUMENTOS DEL CLIENTE  -->
                            <div class="tab-pane fade" id="nav-pills-tab-2">
                                <div class="panel-body">
                                    <div class="row row-space-30">
                                        <div class="col-xl-5">
                                            <div class="form-group row m-b-15 form-row align-items-center">
                                                <label class="col-md-4 col-sm-4 col-form-label" for="pgdocumento_txtstipo_documento_codigo">TIPO DE DOCUMENTO</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <select class="selectpicker" data-width="80%" data-size="10" data-live-search="true" data-style="btn-white" id="pgdocumento_txtstipo_documento_codigo" name="pgdocumento_txtstipo_documento_codigo" placeholder="" data-parsley-required="false"></select>
                                                    <button class="btn btn-outline-success btn-icon btn-circle" onClick="pgdocumento_txtstipo_documento_codigo__inicializar()" data-toggle="tooltip" title="Actualizar"><i class="fas fa-spinner"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-5">
                                            <div class="form-group row m-b-15 form-row align-items-center">
                                                <label class="col-md-2 col-sm-2 col-form-label" for="pgdocumento_txtscliente_guia_numero">NUMERO</label>
                                                <div class="col-md-10 col-sm-10">
                                                    <input class="form-control" type="text" style="text-transform:uppercase;" id="pgdocumento_txtscliente_guia_numero" name="pgdocumento_txtscliente_guia_numero" placeholder="" data-parsley-required="false">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-2">
                                            <div class="form-group row m-b-12 form-row align-items-center">
                                                <div class="col-md-12 col-sm-12">
                                                    <button class="btn btn-primary waves-effect waves-light form-control" id="pgdocumento_btngrabar">GRABAR</button>
                                                </div>
                                            </div>                                    
                                        </div>

                                        <div class="col-xl-12 ">
                                            <table id="pgdocumento_grddata" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>TIPO DE DOCUMENTO</th>
                                                        <th>NUMERO</th>
                                                        <th>ACCION</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="listdocumentos">

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- End DOCUMENTOS DEL CLIENTE  -->

                            <!-- Begin MANIFIESTO  -->
                        
                            <?php require_once("pnlmanifiesto.php");?>

                            <!-- End MANIFIESTO  -->
                        </div>

                    </div>
                    
                </div>
                <!-- End DETALLE/DOCUMENTOS/MANIFIESTO  -->

                <!-- Begin DATOS ADICIONALES  -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <h4 class="panel-title">DATOS ADICIONALES</h4>
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            
                            <div class="panel-body">
                                <div class="col-xl-8">

                                    <div class="form-group row m-b-15 form-row align-items-center">
                                        <label class="col-md-4 col-sm-4 col-form-label" for="cmbsprioridad_codigo">PRIORIDAD DEL DOCUMENTO</label>
                                        <div class="col-md-8 col-sm-8">
                                            <select class="selectpicker" data-live-search="true" data-style="btn-white" id="cmbsprioridad_codigo" name="cmbsprioridad_codigo" placeholder="" data-parsley-required="true"></select> </td>
                                            <button class="btn btn-outline-success btn-icon btn-circle" onClick="cmbsprioridad_codigo__inicializar()" data-toggle="tooltip" title="Actualizar"><i class="fas fa-spinner"></i></button>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-15 form-row align-items-center">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="chksguia_licitacion" name="chksguia_licitacion">
                                            <label class="custom-control-label" for="chksguia_licitacion">   EL DOCUMENTO PERTENECE A UNA LICITACION</label>
                                        </div>                                
                                    </div>

                                    <div class="form-group row m-b-15 form-row align-items-center">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="chksguia_exclusivo" name="chksguia_exclusivo">
                                            <label class="custom-control-label" for="chksguia_exclusivo">   EL DOCUMENTO ES EXCLUSIVO</label>
                                        </div>                                
                                    </div>
                                
                                </div>

                            </div>

                            <div class="col-md-12 offset-md-12 text-center">
                                <div class="form-row">
                                    <div class="col-xl-8">

                                    </div>
                                    <div class="col-xl-2">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light form-control" id="btnguardar_todo">GUARDAR</button>
                                    </div>
                                    <div class="col-xl-2">
                                        <button type="submit" class="btn btn-danger waves-effect waves-light form-control" id="bntcancelar_todo">REGRESAR</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- End DATOS ADICIONALES  -->

            <!-- </form> -->

		</div>
		
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	</div>
	
    <?php require_once("../NavJs/index.php");?>

	<script src="mov_registro.js"></script>


</body>
</html>
<?php
    }else{
        header("Location:".Conectar::ruta()."404.php");
    }
?>
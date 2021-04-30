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
    <title><?php echo strtoupper($lsempresa_abreviatura)?> :: Reenvio de documento</title>
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
				<li class="breadcrumb-item active">Reenvio documentos</li>
			</ol>

            <h1 class="page-header">Reenvio de documentos <small></small></h1>
            
            <input type="hidden" id="hidden_ssuperior_aleatorio" value="">

			<div class="row">
				<div class="col-xl-12">
					<div class="panel panel-inverse">
                    
						<div class="panel-heading">
							<h4 class="panel-title">REENVIO DE DOCUMENTOS</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
                        </div>

                        <!-- begin GRILLA REENVIOS DEL DOCUMENTO REGISTRADO -->
                        <div class="panel-body">

                            <a class="btn btn-success" href="#" id="pgreg_btnnuevo">
                                    <i class="fa fa-trash-o fa-lg"></i> + NUEVO REENVIO
                            </a>

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
                                                <input type="text" class="form-control" maxlength="3" id="pgdoc_txtsguia_serie" name="pgdoc_txtsguia_serie" onblur="pgdoc_txtsguia_serie__onblur(this)">
                                            </div>
                                            <div class="col-xl-2">
                                                <label>CORRELATIVO</label>
                                                <input type="text" class="form-control" maxlength="6" id="pgdoc_txtsguia_correlativo" name="pgdoc_txtsguia_correlativo" onblur="pgdoc_txtsguia_correlativo__onblur(this)">
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

                            <table id="grdreenvio_vista_data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>EST</th>
                                        <th>AMB</th>
                                        <th>ORI</th>
                                        <th>DES</th>
                                        <th>TIPO</th>
                                        <th>DOCUMENTO</th>
                                        <th>REMITENTE</th>
                                        <th>DESTINATARIO</th>
                                        <th>NUEVO AMB</th>
                                        <th>NUEVO ORI</th>
                                        <th>NUEVO DES</th>
                                        <th class="text-right" width="10%"></th>
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
                            <div>
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
                                            <p id="sremite_departamento_descripcion"></p>
                                        </address>
                                    </div>

                                    <div class="col-xl-4">
                                        <small>DESTINATARIO</small>
                                        <address class="m-t-5 m-b-5">
                                            <strong class="text-inverse" id="sconsigna_empresa_descripcion"></strong><br>
                                            <p id="sdestino_empresa_direccion"></p>
                                            <p id="sdestino_departamento_descripcion"></p>
                                        </address>
                                    </div>

                                    <div class="col-xl-4 invoice-date">
                                        <small>NUEVO DESTINATARIO</small>
                                        <address class="m-t-5 m-b-5">
                                            <strong class="text-inverse" id="sdestino_empresa_razon_social_nuevo"></strong><br>
                                            <p id="sdestino_empresa_direccion_nuevo"></p>
                                            <p id="sdestino_departamento_descripcion_nuevo"></p>
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
                                                        <th class="text-left bg-white" width="60%" id="sruta_servicio_descripcion"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-left bg-grey" width="40%">FECHA DE EMISION</th>
                                                        <th class="text-left bg-white" width="60%" id="sguia_fecha_emision_texto"></th>
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
                                                            <th class="text-left bg-grey" width="40%">NUEVA RUTA</th>
                                                            <th class="text-left bg-white" width="60%" id="sruta_servicio_descripcion_nuevo"></th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-left bg-grey" width="40%">FECHA DE REENVIO</th>
                                                            <th class="text-left bg-white" width="60%" id="sguia_fecha_reenvio_texto_nuevo"></th>
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

            <!-- begin DATOS DEL MANIFIESTO ANTERIOR Y NUEVO  -->
            <div class="row" id="panelproveedor">
                
                <!-- begin DATOS DEL ANTERIOR MANIFIESTO  -->    
                <div class="col-xl-6">
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title">MANIFIESTO DEL DOCUMENTO</h4>
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
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-left bg-grey" width="40%">AGENTE</th>
                                                <th class="text-left bg-white" width="60%" id="sagente_nombre"></th>
                                            </tr>
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
                                        </thead>
                                    </table> 
                                </div>
                            </div>
                        </div>
					</div>
                </div>
                <!-- end DATOS DEL ANTERIOR MANIFIESTO  -->    

                <!-- begin DATOS DEL NUEVO MANIFIESTO  -->    
                <div class="col-xl-6">
					<div class="panel panel-inverse">
                        <div class="panel-heading">
							<h4 class="panel-title">MANIFIESTO DEL REENVIO</h4>
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
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-left bg-grey" width="40%">AGENTE</th>
                                                <th class="text-left bg-white" width="60%" id="sagente_nombre_nuevo"></th>
                                            </tr>
                                            <tr>
                                                <th class="text-left bg-grey" width="40%">PROVEEDOR DE SERVICIO</th>
                                                <th class="text-left bg-white" width="60%" id="sproveedor_razon_social_nuevo"></th>
                                            </tr>
                                            <tr>
                                                <th class="text-left bg-grey" width="40%">TIPO DE TRANSPORTE</th>
                                                <th class="text-left bg-white" width="60%" id="stipo_transporte_descripcion_nuevo"></th>
                                            </tr>
                                            <tr>
                                                <th class="text-left bg-grey" width="40%">FECHA DE SALIDA</th>
                                                <th class="text-left bg-white" width="60%" id="smanifiesto_fecha_salida_texto_nuevo"></th>
                                            </tr>
                                        </thead>
                                    </table> 
                                </div>
                            </div>
                        </div>

					</div>
				</div>
                <!-- end DATOS DEL NUEVO MANIFIESTO  -->    
            </div>
            <!-- end DATOS DEL REPRESENTANTE/PROVEEDOR  -->
		
		    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
            
        </div>

    </div>

    <?php require_once("../NavJs/index.php");?>

	<script src="mov_reenvio_vista.js"></script>

</body>
</html>
<?php
    }else{
        header("Location:".Conectar::ruta()."404.php");
    }
?>
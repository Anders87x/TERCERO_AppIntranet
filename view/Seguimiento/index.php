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
<html lang="en">
<head>
    <?php require_once("../NavHead/index.php");?>
    <title><?php echo strtoupper($lsempresa_abreviatura)?> :: Seguimiento</title>
</head>
<body>
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>

	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		
		<?php require_once("../NavUsuario/index.php");?>
		
		<?php require_once("../NavMenu/index.php");?>
		
		<div id="content" class="content">
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Inicio</a></li>
				<li class="breadcrumb-item active">Seguimiento de documentos</li>
			</ol>

			<h1 class="page-header">Seguimiento de documentos <small></small></h1>

			<div class="row">
				<div class="col-xl-12">
					<div class="panel panel-inverse" data-sortable-id="index-1">
						<div class="panel-heading">
							<h4 class="panel-title">Seguimiento de documentos</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="panel-body pr-2">
                            <div id="cardCollpase1" class="collapse pt-3 show">
                                <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <select class="form-control" data-toggle="select2" id="cmbdoc">
                                        <option value="">Seleccione</option>
                                        <option value="<?php echo $lsempresa_variable?>"><?php echo $lsempresa_abreviatura?></option>
                                        <option value="CLI">Cliente</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <select class="form-control" data-toggle="select2" id="cmbtipo">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <input type="text" class="form-control" id="txtseriecorrelativo" placeholder="Nro de Documento">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary waves-effect waves-light form-control" id="btnbuscar">Buscar</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- begin invoice -->

            <div class="invoice" id="divpanel1">
				
                <!-- begin invoice-company -->
				<div>
<!-- 					<span class="pull-right hidden-print">
						<a href="javascript:;" class="btn btn-sm btn-white m-b-10"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Descargar PDF</a>
						<a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Imprimir</a>
					</span> -->
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
				<!-- end invoice-company -->

				<!-- begin invoice-header -->
				<div class="invoice-header">
					<div class="invoice-from">
						<small>REMITENTE</small>
						<address class="m-t-5 m-b-5">
							<strong class="text-inverse" id="sremite_cliente_razon_social"></strong><br>
							<p id="sremite_scliente_direccion"></p>
						</address>
					</div>
					<div class="invoice-to">
						<small>DESTINATARIO</small>
						<address class="m-t-5 m-b-5">
							<strong class="text-inverse" id="sconsigna_empresa_descripcion"></strong><br>
							<p id="sdestino_empresa_direccion"></p>
						</address>
					</div>
					<div class="invoice-date">
						<small>DOCUMENTO <?php echo strtoupper($lsempresa_abreviatura)?></small>
						<div class="date text-inverse m-t-5" id="sguia_numero_completo"></div>
						<div class="invoice-detail">
							<span id="stipo_documento_descripcion"></span> <br>
							<span id="scodigo_aleatorio"></</span>
						</div>
					</div>
				</div>
				<!-- end invoice-header -->
				<!-- begin invoice-content -->

				<div class="invoice-content">

					<!-- begin ruta de servicio -->
					<div class="invoice-content">
						<div class="table-responsive">
							<table class="table table-invoice">
								<thead>
									<tr>
										<th class="text-left bg-grey" width="20%">RUTA DEL SERVICIO</th>
										<th class="text-left " width="80%" id="sruta_servicio_descripcion"></th>
									</tr>
									<tr>
										<th class="text-left bg-grey" width="20%">FECHA DE EMISION</th>
										<th class="text-left " width="80%" id="sguia_fecha_emision"></th>
									</tr>									
									<tr>
										<th class="text-left bg-grey" width="20%">NUMERO DE REPORTE</th>
										<th class="text-left " width="80%" id="sguia_numero_reporte"></th>
									</tr>									
									<tr>
										<th class="text-left bg-grey" width="20%">ESTADO ACTUAL</th>
										<th class="text-left " width="80%" id="sguia_estado_descripcion"></th>
									</tr>									
								</thead>
							</table>
						</div>
					</div>
					<!-- end ruta de servicio -->
					
					<!-- begin titulo datos de confirmacion -->
					<div class="invoice-content">
						<div class="table-responsive">
							<table class="table table-invoice">
								<thead>
									<tr>
										<th class="text-left bg-grey" width="20%">DATOS DE CONFIRMACION</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
					<!-- end datos de confirmacion -->
					
					<!-- begin datos de confirmacion -->
					<div class="table-responsive">
						<table class="table table-invoice">
							<thead>
								<tr>
									<th>FECHA</th>
									<th class="text-left" width="35%">PERSONA</th>
									<th class="text-left" width="45%">OBSERVACION</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<span class="text-inverse" id="sguia_confirma_fecha"></span><br>
									</td>
									<td class="text-left" id="sguia_confirma_persona"></td>
									<td class="text-left" id="sguia_confirma_observacion"></td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- end datos de confirmacion -->


					<!-- begin titulo productos -->
					<div class="invoice-content">
						<div class="table-responsive">
							<table class="table table-invoice">
								<thead>
									<tr>
										<th class="text-left bg-grey" width="20%">PRODUCTOS DEL SERVICIO</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
					<!-- end productos -->
				

					<!-- begin table-responsive -->
					<div class="table-responsive">
						<table class="table table-invoice">
							<thead>
								<tr>
									<th>PRODUCTO</th>
									<th class="text-left" width="40%">DESCRIPCION</th>
									<th class="text-center" width="10%">CANTIDAD</th>
									<th class="text-center" width="10%">PESO</th>
								</tr>
							</thead>
							<tbody id="data_detalle">
							</tbody>
						</table>
					</div>
					<!-- end table-responsive -->

				<!-- begin titulo incidencias -->
				<div class="invoice-content">
					<div class="table-responsive">
						<table class="table table-invoice">
							<thead>
								<tr>
									<th class="text-left bg-grey" width="20%">INCIDENCIAS DEL SERVICIO</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
				<!-- end incidencias table-responsive -->
				
				<!-- begin incidencias -->
				<div class="invoice-content">
					<!-- begin table-responsive -->
					<div class="table-responsive">
						<table class="table table-invoice">
							<thead>
								<tr>
									<th class="text-red-darker" >FECHA</th>
									<th class="text-center text-red-darker" width="10%">HORA</th>
									<th class="text-left text-red-darker" width="80%">OBSERVACION</th>
								</tr>
							</thead>
							<tbody id="data_incidencia">
							</tbody>
						</table>
					</div>
					<!-- end incidencias table-responsive -->


				<!-- begin titulo documentos del cliente -->
				<div class="invoice-content">
					<div class="table-responsive">
						<table class="table table-invoice">
							<thead>
								<tr>
									<th class="text-left bg-grey " width="20%">DOCUMENTOS DEL CLIENTE</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
				<!-- end titulo documentos del cliente table-responsive -->
				
				<div class="invoice-content">
					<!-- begin table-responsive -->
					<div class="table-responsive">
						<table class="table table-invoice">
							<thead>
								<tr>
									<th class="text-left " width="15%">TIPO DE DOCUMENTO</th>
									<th class="text-left" width="15%">NUMERO</th>
									<th class="text-left" width="20%">FECHA DE RETORNO</th>
									<th class="text-left" width="20%">PERSONA QUE RECEPCIONÓ</th>
									<th class="text-right" width="10%"></th>
								</tr>
							</thead>
							<tbody id="data_documentos">
							</tbody>
						</table>
					</div>
				</div>
				<!-- end documentos del cliente table-responsive -->
					
				<br>
                <br>
				<!-- begin invoice-footer -->
				<div class="invoice-footer">
					<p class="text-center m-b-5 f-w-600">
						GRACIAS POR CONFIAR EN NOSOTROS
					</p>
					<br>
					<p class="text-center">
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> <?php echo $lsempresa_pagina_web?></span>
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> <?php echo $lsempresa_central_telefonica?></span>
						<span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> <?php echo $lsempresa_correo?></span>
					</p>
				</div>
				<!-- end invoice-footer -->

			</div>
			<!-- end invoice -->

<!--                         <div class="panel-body pr-3" id="divpanel1">
                            <div class="col-lg-12 text-black card-box shadow-lg p-1 mb-2 bg-white rounded" >
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h3 class="text-black"><i class="far fa-calendar"></i> FECHA DE EMISION</h3>
                                        <h4 id="sguia_fecha_emision" class="text-black"></h4>
                                    </div>
                                    <div class="col-lg-4" style="text-align:center">
                                        <h3 id="stipo_servicio_codigo" class="text-black tx-center"></h3>
                                        <h4 id="sguia_numero" class="text-black tx-center "></h4>
                                    </div>
                                    <div class="col-lg-4" style="text-align:center">
                                        <h3 class="text-black"><i class="fab fa-ethereum"></i> ESTADO</h3>
                                        <h4 id="sguia_estado_descripcion" class="text-black"></h4>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xl-6">
                                    <table class="table shadow-lg p-1 mb-3 bg-white rounded" style="background-color: #3d454e;width: 100%;font-size:15px">
                                        <tr>
                                            <th colspan='2' class="tx-center text-black" style="border-style: none;text-align:center"><i class="fas fa-play"></i> REMITENTE</th>
                                        </tr>
                                        <tr>
                                            <td class="tx-center text-black font-weight-bold" style="border-style: none"><i class="fas fa-user-circle"></i> PERSONA : </td>
                                            <td class="text-dark" style="border-style: none" id="sremite_cliente_razon_social"></td>
                                        </tr>
                                        <tr>
                                            <td class="tx-center text-black font-weight-bold" style="border-style: none"><i class="fas fa-th-large"></i> AREA : </td>
                                            <td class="text-dark" style="border-style: none" id="sremite_area_descripcion"></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-xl-6">
                                    <table class="table shadow-lg p-1 mb-3 bg-white rounded" style="background-color: #3d454e;width: 100%;font-size:15px">
                                        <tr>
                                            <th colspan='2' class="tx-center text-black" style="border-style: none;text-align:center"><i class=" fas fa-user-check"></i> DESTINATARIO</th>
                                        </tr>
                                        <tr>
                                            <td class="tx-center text-black font-weight-bold" style="border-style: none"><i class="fas fa-user-circle"></i> PERSONA : </td>
                                            <td class="text-dark" style="border-style: none" id="sconsigna_empresa_descripcion"></td>
                                        </tr>
                                        <tr>
                                            <td class="tx-center text-black font-weight-bold" style="border-style: none"><i class="fas fa-th-large"></i> AREA : </td>
                                            <td class="text-dark" style="border-style: none" id="sconsigna_area_descripcion"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <table class="table shadow-lg p-1 mb-3 bg-white rounded" style="background-color: #3d454e;width: 100%;border-style: none;font-size:15px">
                                        <tr>
                                            <th colspan='2' class="tx-center text-black" style="border-style: none;text-align:center"><i class="fas fa-train"></i> RUTA DE SERVICIO</th>
                                        </tr>
                                        <tr>
                                            <td WIDTH="20%" class="tx-center text-black font-weight-bold" style="border-style: none"><i class="far fa-clock"></i> ORIGEN : </td>
                                            <td class="text-dark" style="border-style: none" id="sruta_origen_descripcion"></td>
                                        </tr>
                                        <tr>
                                            <td WIDTH="20%" class="tx-center text-black font-weight-bold" style="border-style: none"><i class="fas fa-cloud-moon"></i> DESTINO:</td>
                                            <td class="text-dark" style="border-style: none" id="sruta_destino_descripcion"></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-xl-6">
                                    <table class="table shadow-lg p-1 mb-3 bg-white rounded" style="background-color: #3d454e;width: 100%;border-style: none;font-size:15px">
                                        <tr>
                                            <th  colspan='2' class="tx-center text-black" style="border-style: none;text-align:center"><i class="fas fa-traffic-light"></i> CONFIRMACIÓN</th>
                                        </tr>
                                        <tr>
                                            <td class="tx-center text-black  font-weight-bold" style="border-style: none"><i class="far fa-calendar"></i> FECHA : </td>
                                            <td class="text-dark" style="border-style: none" id="sguia_confirma_fecha"></td>
                                        </tr>
                                        <tr>
                                            <td class="tx-center text-black  font-weight-bold" style="border-style: none"><i class="fas fa-user-circle"></i> PERSONA : </td>
                                            <td class="text-dark" style="border-style: none" id="sguia_confirma_persona"></td>
                                        </tr>
                                        <tr>
                                            <td class="tx-center text-black  font-weight-bold" style="border-style: none"><i class="far fa-eye"></i> OBSERVACIÓN : </td>
                                            <td class="text-dark" style="border-style: none" id="sguia_confirma_observacion"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table shadow-lg p-1 mb-3 bg-white rounded" style="background-color: #3d454e;width: 100%;border-style: none;font-size:15px">
                                        <thead>
                                        <tr>
                                            <th colspan='4' class='tx-center text-white text-left' style='background-color: #3d454e;font-size:15px'><i class="fas fa-box-open"></i> DETALLE DE PRODUCTOS</th>
                                        </tr>
                                        <tr>
                                            <th class='tx-center text-white text-left' style='width: 180px;background-color: #3d454e;border-style: none'>GUIA DE REMISION</th>
                                            <th class='tx-center text-white text-left' style='width: 400px;background-color: #3d454e;border-style: none'>PRODUCTO(S)</th>
                                            <th class='tx-center text-white text-left' style='width: 120px;background-color: #3d454e;border-style: none'>CANTIDAD</th>
                                            <th class='tx-center text-white text-left' style='width: calc(100% - 120px);background-color: #3d454e;border-style: none'>PESO</th>
                                        </tr>
                                        <thead>
                                        <tbody id="data_detalle">
                            
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table shadow-lg p-1 mb-3 bg-white rounded" style="background-color: #f0643b;width: 100%;border-style: none;font-size:15px">
                                        <thead>
                                        <tr>
                                            <th colspan="3" class="tx-center text-white text-left" style="background-color: #f0643b;font-size:15px"><i class="fas fa-fill-drip"></i> INCIDENCIAS</th>
                                        </tr>
                                        <tr>
                                            <th class="tx-center text-white text-left" style="width: 70px;background-color: #f0643b;border-style: none">FECHA</th>
                                            <th class="tx-center text-white text-left" style="width: 50px;background-color: #f0643b;border-style: none">HORA</th>
                                            <th class="tx-center text-white text-left" style="width: calc(100% - 120px);background-color: #f0643b;border-style: none">OBSERVACIÓN</th>
                                        </tr>
                                        </thead>
                                        <tbody id="data_incidencia">
                            
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table shadow-lg p-1 mb-3 bg-white rounded" style="background-color: #3d454e;width: 100%;border-style: none;font-size:13px">
                                        <thead>
                                        <tr>
                                            <th colspan="5" class="tx-center text-white text-left" style="background-color: #3d454e;font-size:13px"><i class="far fa-file-archive"></i> DOCUMENTOS DEL CLIENTES</th>
                                        </tr>
                                        <tr>
                                            <th class="tx-center text-white text-left" style="background-color: #3d454e;border-style: none">TIPO DE DOCUMENTO</th>
                                            <th class="tx-center text-white text-left" style="background-color: #3d454e;border-style: none">NÚMERO</th>
                                            <th class="tx-center text-white text-left" style="background-color: #3d454e;border-style: none">DEVUELTO AL CLIENTE</th>
                                            <th class="tx-center text-white text-left" style="background-color: #3d454e;border-style: none">PERSONA QUE RECIBIÓ</th>
                                            <th class="tx-center text-white text-left" style="background-color: #3d454e;border-style: none">DESCARGA DE ARCHIVO</th>
                                        </tr>
                                        </thead>
                                        <tbody id="data_documentos">
                                
                                        </tbody>                                                            
                                    </table>
                                </div>
                            </div>
                        </div> -->


		</div>
		
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	</div>
	
	<?php require_once("../NavJs/index.php");?>

	<script src="seguimiento.js"></script>

</body>
</html>
<?php
    }else{
        header("Location:".Conectar::ruta()."404.php");
    }
?>
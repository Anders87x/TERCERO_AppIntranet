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
    <title><?php echo strtoupper($lsempresa_abreviatura)?> :: Reporte retorno</title>
</head>
<body>
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>

	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		
		<?php require_once("../NavUsuario/index.php");?>
		
		<?php require_once("../NavMenu/index.php");?>
		
		<!-- begin content -->
		<div id="content" class="content">
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Inicio</a></li>
				<li class="breadcrumb-item active">Reporte retorno</li>
			</ol>

			<!-- begin page-header -->
			<h1 class="page-header">Reporte retorno<small> de documentos devueltos por los representantes...</small></h1>
			<!-- end page-header -->

			<!-- begin row filter-->
			<div class="row">
				<!-- begin col-12 -->
				<div class="col-xl-12">
					<!-- begin panel -->
					<div class="panel panel-inverse panel-with-tabs" data-sortable-id="ui-unlimited-tabs-1">
						<!-- begin panel-heading -->
						<div class="panel-heading p-0">
							<!-- begin nav-tabs -->
							<div class="tab-overflow">
								<ul class="nav nav-tabs nav-tabs-inverse">
									<li class="nav-item"><a href="#nav-tab-1" data-toggle="tab" class="nav-link active">GRUPO DE CLIENTES</a></li>
								</ul>
							</div>
						</div>
						<!-- end panel-heading -->

						<!-- begin tab-content -->
						<div class="panel-body tab-content">
							<!-- begin tab-pane -->
							<div class="tab-pane fade active show" id="nav-tab-1">
								<div id="cardCollpase1" class="collapse pt-3 show">
									<div class="form-row align-items-center">
										<div class="col-xl-3">
											<label>GRUPO DE CLIENTES</label>
											<select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsgrupo_cliente_codigo">
											</select>											
										</div>
										<div class="col-xl-3">
											<label>REMITENTE</label>
											<select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsremite_cliente_codigo">
											</select>											
										</div>
										<div class="col-xl-2">
											<label>AMBITO</label>
											<select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="cmbstipo_servicio_codigo">
											</select>											
										</div>
										<div class="col-xl-2">
											<label>ORIGEN</label>
											<select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsruta_servicio_origen_codigo">
											</select>											
										</div>
										<div class="col-xl-2">
											<label>DESTINO</label>
											<select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsruta_servicio_destino_codigo">
											</select>											
										</div>
									</div>
									<div class="form-row align-items-center">
										<div class="col-xl-3">
											<label>FECHA INICIAL</label>
											<input type="text" class="form-control" id="dtpdfecha_confirma_inicial" value="<?php echo date("d/m/Y");?>" data-date-format="dd/mm/yyyy">
										</div>
										<div class="col-xl-3">
											<label>FECHA FINAL</label>
											<input type="text" class="form-control" id="dtpdfecha_confirma_final" value="<?php echo date("d-m-Y");?>" data-date-format="dd-mm-yyyy">
										</div>
										<div class="col-xl-2">
											<label>SITUACION</label>
											<select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsguia_estado">
											</select>											
										</div>										
									</div>
									<div class="form-row align-items-right">
										<div class="col-xl-8"> </div>
										<div class="col-xl-2">
												<button class="btn btn-primary waves-effect waves-light form-control" id="btnbuscar">EXPORTAR EXCEL</button>
										</div>
										<div class="col-xl-2">
												<button class="btn btn-danger waves-effect waves-light form-control" id="btnlimpiar">LIMPIAR</button>
										</div>
									</div>
								</div>
							</div>
							<!-- end tab-pane -->


						</div>
						<!-- end tab-content -->
						
					</div>
					<!-- end panel -->
				</div>
				<!-- end col-12 -->
			</div>
			<!-- end row filter-->


		</div>
		
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	</div>
	<!-- end content -->

	<?php require_once("../NavJs/index.php");?>

	<script src="rpt_retorno.js"></script>

</body>
</html>
<?php
    }else{
        header("Location:".Conectar::ruta()."404.php");
    }
?>
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
    <title><?php echo strtoupper($lsempresa_abreviatura)?> :: Intranet</title>
</head>
<body>
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>

	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		
		<?php require_once("../NavUsuario/index.php");?>
		
		<?php require_once("../NavMenu/index.php");?>

        <!-- begin #content -->
        <div id="content" class="content">

            <!-- begin page-header -->
            <h1 class="page-header">Cuadro de mando<small> representación gráfica de las principales métricas...</small></h1>
            <!-- end page-header -->        
            <!-- begin row -->
            <div class="row">
                <!-- begin col-3 -->
                <div class="col-xl-3 col-md-3">
                    <div class="widget widget-stats bg-teal">
                        <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                        <div class="stats-content">
                            <div class="stats-title">TOTAL DOCUMENTOS </div>
                            <div class="stats-number" id="nnumero_documentos"></div>
                            <div class="stats-progress progress">
                                <div class="progress-bar" style="width: 100.00%;"></div>
                            </div>
                            <div class="stats-desc">Registrados en el mes</div>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-xl-3 col-md-3">
                    <div class="widget widget-stats bg-blue">
                        <div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
                        <div class="stats-content">
                            <div class="stats-title">TOTAL EN TRANSITO</div>
                            <div class="stats-number" id="nnumero_transito"></div>
                            <div class="stats-progress progress">
                                <<div class="progress-bar" style="width: 100.00%;"></div>
                            </div>
                            <div class="stats-desc">Pendientes para su destino</div> 
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-xl-3 col-md-3">
                    <div class="widget widget-stats bg-indigo">
                        <div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
                        <div class="stats-content">
                            <div class="stats-title">TOTAL CONFIRMADOS</div>
                            <div class="stats-number" id="nnumero_confirmados"></div>
                            <div class="stats-progress progress">
                                <div class="progress-bar" style="width: 100.00%;"></div>
                            </div>
                            <div class="stats-desc">Pendientes por retornar</div>
                            <!-- <div class="stats-desc">Pendientes por confirmar (76.3%)</div> -->
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-xl-3 col-md-3">
                    <div class="widget widget-stats bg-dark">
                        <div class="stats-icon stats-icon-lg"><i class="fa fa-comment-alt fa-fw"></i></div>
                        <div class="stats-content">
                            <div class="stats-title">TOTAL RETORNADOS</div>
                            <div class="stats-number" id="nnumero_retornados"></div>
                            <div class="stats-progress progress">
                                <div class="progress-bar" style="width: 100.00%;"></div>
                            </div>
                            <div class="stats-desc">Pendientes por entregar</div>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
            </div>
            <!-- end row -->

            <!-- begin row -->
			<div class="row">
				<div class="col-xl-12 ui-sortable">
					<div class="panel panel-inverse" data-sortable-id="index-1">
						<div class="panel-heading">
							<h4 class="panel-title">DISTRIBUCION DE DOCUMENTOS</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="panel-body">
							<div class="form-row align-items-center">
								<div class="col-auto">
									<a>INDICAR MES DE CONSULTA</a>
								</div>
								<div class="col-xl-2">
									<select class="form-control" data-toggle="select2" id="cmbsguia_fecha_recepcion_mes">
										<option value="">MES</option>
										<option value="01">ENERO</option>
										<option value="02">FEBRERO</option>
										<option value="03">MARZO</option>
										<option value="04">ABRIL</option>
										<option value="05">MAYO</option>
										<option value="06">JUNIO</option>
										<option value="07">JULIO</option>
										<option value="08">AGOSTO</option>
										<option value="09">SEPTIEMBRE</option>
										<option value="10">OCTUBRE</option>
										<option value="11">NOVIEMBRE</option>
										<option value="12">DICIEMBRE</option>
									</select>
								</div>
								<div class="col-xl-1">
									<select class="form-control" data-toggle="select2" id="cmbsguia_fecha_recepcion_annio">
										<option value="">AÑO</option>
										<option value="2017">2017</option>
                                        <option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
									</select>
								</div>
								<div class="col-xl-2">
									<button class="btn btn-primary waves-effect waves-light form-control" id="btn_buscar">BUSCAR</button>
								</div>
							</div>
							<hr/>
                            <div>
                                <table id="grd_distribucion" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>TIPO</th>
                                            <th>ORIGEN</th>
                                            <th>DESTINO</th>
                                            <th>TOTAL DOCUMENTOS</th>
                                            <th>TRANSITO</th>
                                            <th>CONFIRMADOS</th>
                                            <th>RETORNADOS</th>
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
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
						</div>
					</div>
				</div>
            </div>
            <!-- end row -->



        </div>
        <!-- end #content -->

		<!-- begin #footer -->
		<div id="footer" class="footer">
			&copy; 2021 Grupo APROEM eirl  -  ventas@aproem.com  -  Todos los derechos reservados
		</div>
		<!-- end #footer -->

		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	</div>
	<!-- end content -->

	<?php require_once("../NavJs/index.php");?>

	<script src="home.js"></script>

</body>
</html>
<?php
    }else{
        header("Location:".Conectar::ruta()."404.php");
    }
?>
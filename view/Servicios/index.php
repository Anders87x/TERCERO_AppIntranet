<?php
    require_once("../../config/conexion.php");
    $lobjconexion = new conectar();
    $lsempresa_abreviatura = $lobjconexion->_mempresa_abreviatura();

    if(isset($_SESSION["lscliente_codigo"])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../NavHead/index.php");?>
    <title><?php echo strtoupper($lsempresa_abreviatura) ?> :: Reporte</title>
</head>
<body>
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>

	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">

		<?php require_once("../NavUsuario/index.php");?>

		<?php require_once("../NavMenu/index.php");?>

		<div id="content" class="content">
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Inicio</a></li>
				<li class="breadcrumb-item active">Reporte</li>
			</ol>

			<h1 class="page-header">Reporte de servicios solicitados <small></small></h1>

			<div class="row">
				<div class="col-xl-12">
					<div class="panel panel-inverse" data-sortable-id="index-1">
						<div class="panel-heading">
							<h4 class="panel-title">Reporte de servicios solicitados</h4>
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
                                    <select class="form-control" data-toggle="select2" id="cmbtipo">
                                    <option value="">Tipo servicio</option>
                                    <option value="LOC">Local</option>
                                    <option value="NAC">Nacional</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <select class="form-control" data-toggle="select2" id="cmborigen">
                                        <option value="">Origen</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <select class="form-control" data-toggle="select2" id="cmbdestino">
                                        <option value="">Destino</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <select class="form-control" data-toggle="select2" id="cmbest">
                                        <option value="">Estado</option>
                                        <option value="01">Normal</option>
                                        <option value="15">Confirmado</option>
                                        <option value="20">Retornado</option>
                                        <option value="25">Entregado</option>
                                        <option value="50">Facturado</option>
                                        <option value="90">Finalizado</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <select class="form-control" data-toggle="select2" id="cmbmes">
                                        <option value="">Mes</option>
                                        <option value="01">Enero</option>
                                        <option value="02">Febrero</option>
                                        <option value="03">Marzo</option>
                                        <option value="04">Abril</option>
                                        <option value="05">Mayo</option>
                                        <option value="06">Junio</option>
                                        <option value="07">Julio</option>
                                        <option value="08">Agosto</option>
                                        <option value="09">Setiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <select class="form-control" data-toggle="select2" id="cmbano">
                                        <option value="">Año</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary waves-effect waves-light form-control" id="btnbuscar">Buscar</button>
                                </div>
                                </div>
                                <hr/>
                                <div class="table-responsive">
                                <table class="table table-borderless table-hover table-centered" id="data_home">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>EST</th>
                                            <th>FEC. EMI.</th>
                                            <th>PRIO</th>
                                            <th>DOC. MECAV</th>
                                            <th>TIPO SERVICIO</th>
                                            <th>ORIGEN</th>
                                            <th>DESTINO</th>
                                            <th>CONSIGNATARIO</th>
                                            <th>TRANS.</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	</div>

	<?php require_once("../NavJs/index.php");?>

	<script src="servicios.js"></script>

</body>
</html>
<?php
    }else{
        header("Location:".Conectar::ruta()."404.php");
    }
?>

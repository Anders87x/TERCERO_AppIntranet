<?php
    require_once("../../config/conexion.php"); 
    if(isset($_SESSION["lscliente_codigo"])){
        $cone = new conectar();
        $varempresa = $cone->VariableEmpresa();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../NavHead/index.php");?>
    <title>Seguimiento</title>
</head>
<body>
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>

	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		
		<?php require_once("../NavUsuario/index.php");?>
		
		<?php require_once("../NavMenu/index.php");?>
		
		<div id="content" class="content">
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Seguimiento</a></li>
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
                                        <option value="<?php echo $varempresa?>"><?php echo $varempresa?></option>
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
                        
                        <div class="panel-body pr-3" id="divpanel1">
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
                        </div>
					</div>
				</div>
			</div>

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
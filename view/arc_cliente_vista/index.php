<?php
    require_once("../../config/conexion.php"); 
    if(isset($_SESSION["lscliente_codigo"])){
        $cone = new conectar();
        $varempresa = $cone->VariableEmpresa();
        $lsempresa_razon_social = $cone->_mempresa_razon_social();
        $lsempresa_abreviatura = $cone->_mempresa_abreviatura();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once("../NavHead/index.php");?>
    <title><?php echo strtoupper($lsempresa_abreviatura)?> :: Clientes</title>
</head>
<body>
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		
		<?php require_once("../NavUsuario/index.php");?>
		
		<?php require_once("../NavMenu/index.php");?>
		
		<div id="content" class="content">
		
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Inicio</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Archivos</a></li>
				<li class="breadcrumb-item active">Clientes</li>
			</ol>

            <h1 class="page-header">Clientes <small></small></h1>

			<div class="row">
				<div class="col-xl-12">
					<div class="panel panel-inverse">
                    
						<div class="panel-heading">
							<h4 class="panel-title">CLIENTES</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
                        </div>

                        <!-- begin GRILLA DESTINATARIOS REGISTRADOS -->
                        <div class="panel-body">

                            <a class="btn btn-success" href="#" id="btnregistro_nuevo">
                                <i class="fa fa-trash-o fa-lg"></i> + NUEVO
                            </a>
                            <br></br>
                            <table id="grdregistro_vista_data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>CODIGO</th>
                                        <th>RUC</th>
                                        <th>RAZON SOCIAL</th>
                                        <th>DIRECCION</th>
                                        <th>DEPARTAMENTO</th>
                                        <th>PROVINCIA</th>
                                        <th>DISTRITO</th>
                                        <th class="text-left" width="10%">ACCION</th>
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
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end GRILLA DESTINATARIOS REGISTRADOS  -->

					</div>
				</div>
            </div>
	
		    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
            
        </div>

    </div>
        
    <?php require_once("arc_cliente_mnto.php");?>
    <?php require_once("../NavJs/index.php");?>

	<script src="arc_cliente.js"></script>

</body>
</html>
<?php
    }else{
        header("Location:".conectar::ruta()."404.php");
    }
?>
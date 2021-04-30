<?php
    require_once("../../config/conexion.php"); 
    if(isset($_SESSION["lscliente_codigo"])){
		$cone = new conectar();
		$varempresa = $cone->VariableEmpresa();
		$lsempresa_abreviatura = Conectar::_mEmpresa_abreviatura();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../NavHead/index.php");?>
    <title><?php echo strtoupper($lsempresa_abreviatura) ?> :: Software logistica</title>
</head>
<body>
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed page-with-light-sidebar">
		
		<?php require_once("../NavUsuario/index.php");?>
		
		<?php require_once("../NavMenu/index.php");?>
		
		<div id="content" class="content">
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Inicio</a></li>
				<li class="breadcrumb-item active">Tipo de transporte</li>
			</ol>

			<h1 class="page-header">Tipo de transporte <small></small></h1>

			<div class="col-xl-12">
				<div class="panel panel-inverse">

				<div class="panel-heading">
				<h4 class="panel-title">Listado</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>

				<div class="panel-body">
					<table id="data-table-combine" class="table table-striped table-bordered table-td-valign-middle">
						<thead>
							<tr>
								<th width="1%"></th>
								<th width="1%" data-orderable="false"></th>
								<th class="text-nowrap">Rendering engine</th>
								<th class="text-nowrap">Browser</th>
								<th class="text-nowrap">Platform(s)</th>
								<th class="text-nowrap">Engine version</th>
								<th class="text-nowrap">CSS grade</th>
							</tr>
						</thead>

						<tbody>
							<tr class="odd gradeX">
								<td width="1%" class="f-s-600 text-inverse">1</td>
								<td width="1%" class="with-img"><img src="../assets/img/user/user-1.jpg" class="img-rounded height-30" /></td>
								<td>Trident</td>
								<td>Internet Explorer 4.0</td>
								<td>Win 95+</td>
								<td>4</td>
								<td>X</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	</div>
	
	<?php require_once("../NavJs/index.php");?>

	<!-- <script src="home.js"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
	<script>
		new Vue({
		el: '#app',
		vuetify: new Vuetify(),
		})
	</script>

</body>

<!-- /BEGIN WHATSAPP section -->
<!-- <div style="position:fixed; right:10px; bottom:10px; text-align:center; padding:3px">
	<a target="_blank" href="https://api.whatsapp.com/send?phone=+51 993 507 580">¿Consulta inmediata?</a>
	<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/240px-WhatsApp.svg.png" width="50" height="50"></a>
</div>
 --><!-- /END WHATSAPP section -->


</html>
<?php
    }else{
        header("Location:".conectar::ruta()."404.php");
    }
?>
<?php
	require_once("../../config/conexion.php"); 
	$cls_conexion_bd = new Conectar();
	$lsempresa_razon_social = $cls_conexion_bd->NombreEmpresa();
	
    if(isset($_SESSION["lscliente_codigo"])){ 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="..\..\public\assets\css\default\app.min.css" rel="stylesheet">

    <title>Actualizar Contraseña</title>
</head>
    
<bo\..\publicdy class="pace-top">

	<div id="page-loader" class="fade show"><span class="spinner"></span></div>

	<div id="page-container" class="fade">

		<div class="login login-with-news-feed">

			<div class="news-feed">
				<div class="news-image" style="background-image: url(../../public/assets/img/login-bg/login-bg-11.jpeg)"></div>
				<div class="news-caption">
					<p>
						Actualizar clave por defecto.
					</p>
				</div>
			</div>

			<div class="right-content">

				<input type="hidden" id="usercorreox" value="<?php echo $_SESSION["psusuario_correo_electronico"]?>">
				<div class="login-header">
					<div class="brand">
						<b>Actualizar clave</b>
					</div>
					<div class="icon">

					</div>
				</div>

				<div class="login-content">
					<div class="margin-bottom-0">
						<div class="form-group m-b-15">
							<input type="password" id="txtpass1" class="form-control form-control-lg" placeholder="Nueva Contraseña" required="">
						</div>
						<div class="form-group m-b-15">
							<input type="password" id="txtpass2" class="form-control form-control-lg" placeholder="Confirmar Contraseña" required="">
						</div>
						<div class="login-buttons">
							<button id="btncambiar" class="btn btn-success btn-block btn-lg">Actualizar</button>
						</div>
						<hr>
						<p class="text-center text-grey-darker mb-0">
						&copy; <?php echo $lsempresa_razon_social?> Todos lo derechos reservados 2020
						</p>
					</div>
				</div>

			</div>

		</div>


	</div>
	
	<?php require_once("../NavJs/index.php");?>

	<script src="cambiarpassword.js"></script>
</body>
</html>
<?php
    }else{
        header("Location:".Conectar::ruta()."404.php");
    }
?>
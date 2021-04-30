<?php
    require_once("config/conexion.php"); 
    if(isset($_POST["enviar"]) and $_POST["enviar"]=="si"){
        require_once("models/Servicio.php");
        $servicio = new Servicio();
		$servicio->login();
	}
	
	$cone = new Conectar();
	$cx = $cone->NombreEmpresa();
	$lsempresa_abreviatura = $cone->_mempresa_abreviatura();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">

	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="public\assets\css\default\app.min.css" rel="stylesheet">
    <title><?php echo strtoupper($lsempresa_abreviatura) ?> :: Intranet</title>
</head>
<body class="pace-top">
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>

	<div class="login-cover">
		<div class="login-cover-image" style="background-image: url(public/assets/img/login-bg/login-bg-17.jpeg)" data-id="login-cover-image"></div>
		<div class="login-cover-bg"></div>
	</div>
	
	<div id="page-container" class="fade">
		<div class="login login-v2" data-pageload-addclass="animated fadeIn">
			<div class="login-header">
				<div class="brand">
					<span class="logo"></span> <b>Bienvenido</b>
					<small><?php echo $cx?></small>
				</div>
				<div class="icon">
					
				</div>
			</div>

			<div class="login-content">
				<?php
					if (isset($_GET["m"])){
						switch($_GET["m"]){
							case "1";
							?>
								<div class="alert alert-danger" role="alert">
									<strong>Error!</strong> Usuario y/o clave incorrectos...
								</div>
							<?php
							break;

							case "2";
							?>
								<div class="alert alert-danger" role="alert">
									<strong>Error!</strong> El usuario, no está asociado en el software...
								</div>
							<?php
							break;
						}
					}
				?>
				<form action="" method="post" id="loginnum1" class="margin-bottom-0">
					<div class="form-group m-b-20">
						<input type="text" class="form-control form-control-lg" id="correo" name="correo" placeholder="Ingrese correo electronico" required="" value="aldo.santos@aproem.com">
					</div>
					<div class="form-group m-b-20">
						<input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Ingrese clave" required="" value="123">
					</div>
					<div class="checkbox checkbox-css m-b-20">
						<input type="checkbox" id="remember_checkbox"> 
						<label for="remember_checkbox">
							Recuerdame
						</label>
					</div>
					<div class="login-buttons">
						<input type="hidden" name="enviar" value="si">
						<button type="submit" class="btn btn-success btn-block btn-lg">Acceder</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="public\assets\js\app.min.js"></script>
	<script src="public\assets\js\theme\default.min.js"></script>
	
	<script src="public\assets\js\demo\login-v2.demo.js"></script>
	<script src="acceso.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-53034621-1', 'auto');
        ga('send', 'pageview');
	</script>
</body>
</html>

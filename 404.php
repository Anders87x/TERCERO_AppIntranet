<?php
  require_once("config/conexion.php"); 
  if(isset($_SESSION["usu_id"])){ 
?>
<head>
  <?php require_once("header.php");?> 
  <title>TRANSVIAS | 404</title>
</head>
<body class="pos-relative">
<?php require_once("menu.php");?>
<?php require_once("profile.php");?>

<div class="br-mainpanel">
<div class="ht-100v d-flex align-items-center justify-content-center">
      <div class="wd-lg-70p wd-xl-50p tx-center pd-x-40">
        <h1 class="tx-100 tx-xs-140 tx-normal tx-inverse tx-roboto mg-b-0">404!</h1>
        <h5 class="tx-xs-24 tx-normal tx-info mg-b-30 lh-5">La página que estás buscando no ha sido encontrada.</h5>
        <p class="tx-16 mg-b-30">La página que estás buscando podría haberse eliminado, cambiaron su nombre,o no disponible.</p>

      </div>
    </div>

<?php require_once("footer.php");?>

</div>

</body>

<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>
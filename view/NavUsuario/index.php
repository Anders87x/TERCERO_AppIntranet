<?php
    require_once("../../config/conexion.php"); 
    $cone = new conectar();
    $lsempresa_razon_social = $cone->_mempresa_razon_social();
?>

<div id="header" class="header navbar-default">
    <div class="navbar-header">
        <a href="../Home/" class="navbar-brand"></span> <?php echo $lsempresa_razon_social ?></a>
        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    
    <input type="hidden" id="useridx" value="<?php echo $_SESSION["lscliente_codigo"]?>">
    <input type="hidden" id="userclax" value="<?php echo $_SESSION["lscliente_contacto_clave"]?>">
    <input type="hidden" id="usercorreox" value="<?php echo $_SESSION["ps_usuario_correo_electronico"]?>">
    <input type="hidden" id="usercontactocodigox" value="<?php echo $_SESSION["lscliente_contacto_codigo"]?>">
    <input type="hidden" id="VGL_susuario_codigo" value="<?php echo $_SESSION["lscliente_contacto_codigo"]?>">


    <ul class="navbar-nav navbar-right">
        <li class="navbar-form">
            <form action="" method="POST" name="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Buscar">
                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </li>
        <li class="dropdown navbar-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="..\..\public\assets\img\user\user-13.jpeg" alt=""> 
                <span class="d-none d-md-inline"><?php echo $_SESSION["lscliente_contacto_nombre"]?></span> <b class="caret"></b>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="..\CambiarPassword\" class="dropdown-item">Editar clave</a>
                <a href="..\Logout\" class="dropdown-item">Cerrar sesión</a>
            </div>
        </li>
    </ul>
</div>
<div id="sidebar" class="sidebar">
    <div data-scrollbar="true" data-height="100%">
        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <img src="..\..\public\assets\img\user\user-13.jpeg" alt="">
                    </div>
                    <div class="info">
                        <b class="caret pull-right"></b>
                        <?php echo $_SESSION["lscliente_contacto_nombre"]?>
                        <small><?php echo $_SESSION["lscliente_codigo"]?>-<?php echo $_SESSION["lscliente_razon_social"]?></small>
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile">
                    <li><a href="javascript:;"><i class="fa fa-cog"></i> Configuración</a></li>
                    <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Ayuda</a></li>
                </ul>
            </li>
        </ul>

        <ul class="nav">
            <li class="nav-header">NAVEGACION DEL MODULO</li>
            <li class="has-sub">
                <a href="../home/">
                    <i class="fa fa-th-large"></i>
                    <span>INICIO</span>
                </a>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-th-large"></i>
                    <span>ARCHIVOS</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="../arc_tipo_transporte_vista/">TIPO DE TRANSPORTES</a></li>
                    <li><a href="../arc_area_vista/">AREAS DE TRABAJO</a></li>
                    <li><a href="../arc_tipo_documento_vista/">TIPO DE DOCUMENTOS</a></li>
                    <li><a href="../arc_prioridad_vista/">PRIORIDADES</a></li>
                    <li><a href="../arc_tipo_servicio_vista/">TIPO DE SERVICIOS</a></li>
                    <li><a href="../arc_ruta_servicio_vista/">RUTAS DE SERVICIOS</a></li>
                    <li><a href="../arc_producto_vista/">PRODUCTOS</a></li>
                    <li><a href="../arc_grupo_cliente_vista/">GRUPO DE CLIENTES</a></li>
                    <li><a href="../arc_cliente_vista/">CLIENTES</a></li>
                    <li><a href="../arc_cliente_contacto_vista/">CONTACTOS DEL CLIENTE</a></li>
                    <li><a href="../arc_proveedor_vista/">PROVEEDORES</a></li>
                    <li><a href="../arc_agente_vista/">AGENTE/SUCURSAL</a></li>
                    <li><a href="../arc_destinatario_vista/">DESTINATARIOS</a></li>
                </ul>
			</li>            
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-th-large"></i>
                    <span>MOVIMIENTOS</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="../mov_registro_vista/">REGISTRO DOCUMENTOS</a></li>
                    <li><a href="../mov_confirma_vista/">CONFIRMACIONES</a></li>
                    <li><a href="../mov_retorno_vista/">RETORNOS</a></li>
                </ul>
			</li>
            <li class="has-sub">
                <a href="../mov_consulta_vista/">
                    <i class="fa fa-th-large"></i>
                    <span>CONSULTA COMPLETA</span>
                </a>
            </li>            
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-th-large"></i>
                    <span>REPORTES</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="../rpt_diario/">DIARIO</a></li>
                    <li><a href="../rpt_confirma/">CONFIRMACIONES</a></li>
                    <li><a href="../rpt_retorno/">RETORNADOS</a></li>
                    <li><a href="../rpt_metadata/">METADATA</a></li>
                </ul>
			</li>
            
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>

        </ul>

    </div>

</div>
<div class="sidebar-bg"></div>

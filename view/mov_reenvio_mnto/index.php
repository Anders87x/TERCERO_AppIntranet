<?php
    require_once("../../config/conexion.php"); 
    if(isset($_SESSION["lscliente_codigo"])){
        $cone = new conectar();
        $varempresa = $cone->VariableEmpresa();
        $lsempresa_razon_social = $cone->_mempresa_razon_social();
        $lsempresa_abreviatura = $cone->_mempresa_abreviatura();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("../NavHead/index.php");?>
    <title><?php echo strtoupper($lsempresa_abreviatura)?> :: Nuevo reenvio</title>
</head>
<body>
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		
		<?php require_once("../NavUsuario/index.php");?>
		
		<?php require_once("../NavMenu/index.php");?>
		
		<div id="content" class="content">
		
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Inicio</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Reenvio de documento</a></li>
				<li class="breadcrumb-item active">Nuevo</li>
			</ol>

			<h1 class="page-header">Nuevo reenvío <small>de documento...</small></h1>

            <input type="hidden" id="ID_GUIA" name="ID_GUIA">
            <input type="hidden" id="ID_MANIFIESTO" name="ID_MANIFIESTO">


			<!-- Begin DATOS BASICOS -->
            <!-- <form data-parsley-validate="true" id="frmmov_reenvio_mnto" > -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <h4 class="panel-title">DATOS BASICOS</h4>
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            
                            <div class="panel-body">
                                <div class="row row-space-30">
                                    <div class="col-xl-4">
                                        <div class="form-group row m-b-12 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="cmbstipo_documento_codigo">TIPO DE DOCUMENTO</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-live-search="true" data-style="btn-white" id="cmbstipo_documento_codigo" name="cmbstipo_documento_codigo" placeholder="" data-parsley-required="true"></select>											
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-12">
                                            <label class="col-md-4 col-sm-4 col-form-label col-form-label-sm" >NRO. DE DOCUMENTO</label>
                                            <div class="col-md-3 col-sm-3">
                                                <input class="form-control" type="text" maxlength="3" id="txtsguia_serie" name="txtsguia_serie" placeholder="Serie" onblur="txtsguia_serie__onblur(this)" data-parsley-required="true">
                                                
                                            </div>
                                            <div class="col-md-5 col-sm-5 ">
                                                <input class="form-control" type="text" maxlength="6" id="txtsguia_correlativo" name="txtsguia_correlativo" placeholder="Correlativo" onblur="txtsguia_correlativo__onblur(this)" data-parsley-required="true">
                                                
                                            </div>                                    
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="form-group row m-b-12 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="dtpdguia_fecha_reenvio">FECHA DE REENVIO</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control" type="text" id="dtpdguia_fecha_reenvio" name="dtpdguia_fecha_reenvio" data-parsley-required="true">
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- End DATOS BASICOS  -->

                <!-- Begin MANIFIESTO -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <h4 class="panel-title">DATOS DEL MANIFIESTO</h4>
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                </div>
                            </div>            
                            <div class="panel-body">
                                <div class="row row-space-30">
                                    <div class="col-xl-6">
                                        <h4>DATOS DEL DESTINATARIO</h4>
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="cmbsdestino_empresa_razon_social">DESTINATARIO</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsdestino_empresa_razon_social" name="cmbsdestino_empresa_razon_social" placeholder="" data-parsley-required="true"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="txtsdestino_empresa_direccion">DIRECCIÓN</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control" type="text" style="text-transform:uppercase;" id="txtsdestino_empresa_direccion" name="txtsdestino_empresa_direccion" placeholder="" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="cmbsdestino_departamento_codigo">DEPARTAMENTO</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsdestino_departamento_codigo" name="cmbsdestino_departamento_codigo" placeholder="" data-parsley-required="true"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="cmbsdestino_provincia_codigo">PROVINCIA</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsdestino_provincia_codigo" name="cmbsdestino_provincia_codigo" placeholder="" data-parsley-required="true"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="cmbsdestino_distrito_codigo">DISTRITO</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsdestino_distrito_codigo" name="cmbsdestino_distrito_codigo" placeholder="" data-parsley-required="true"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="txtsdestino_atencion">ATENCIÓN</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control" type="text" style="text-transform:uppercase;" id="txtsdestino_atencion" name="txtsdestino_atencion" placeholder="" data-parsley-required="true">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <h4>DATOS DEL PROVEEDOR</h4>
                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_cmbsagente_codigo">AGENTE</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="pgmanifiesto_cmbsagente_codigo" name="pgmanifiesto_cmbsagente_codigo" placeholder="" data-parsley-required="true"></select>
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_cmbstipo_servicio_codigo">TIPO DE SERVICIO</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="pgmanifiesto_cmbstipo_servicio_codigo" name="pgmanifiesto_cmbstipo_servicio_codigo" placeholder="" data-parsley-required="true"></select>
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_cmbsruta_servicio_codigo">RUTA DEL DESTINO</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="pgmanifiesto_cmbsruta_servicio_codigo" name="pgmanifiesto_cmbsruta_servicio_codigo" placeholder="" data-parsley-required="true"></select>
                                            </div>
                                        </div>

                                        <hr style="width:75%;">

                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_cmbsproveedor_codigo">PROVEEDOR DE SERVICIO</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="pgmanifiesto_cmbsproveedor_codigo" name="pgmanifiesto_cmbsproveedor_codigo" placeholder="" data-parsley-required="true"></select>
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_cmbstipo_transporte_codigo">TIPO DE TRANSPORTE</label>
                                            <div class="col-md-8 col-sm-8">
                                                <select class="selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="pgmanifiesto_cmbstipo_transporte_codigo" name="pgmanifiesto_cmbstipo_transporte_codigo" placeholder="" data-parsley-required="true"></select>
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_dtpdmanifiesto_fecha_salida">FECHA DE SALIDA</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control" type="text" id="pgmanifiesto_dtpdmanifiesto_fecha_salida" name="pgmanifiesto_dtpdmanifiesto_fecha_salida" data-parsley-required="true">
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-15 align-items-center">
                                            <label class="col-sm-4 col-form-label" for="pgmanifiesto_txtsmanifiesto_hora_salida">HORA</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="time" id="pgmanifiesto_txtsmanifiesto_hora_salida" name="pgmanifiesto_txtsmanifiesto_hora_salida">
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_txtsmanifiesto_despachador">DESPACHADOR</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control" type="text" style="text-transform:uppercase" id="pgmanifiesto_txtsmanifiesto_despachador" name="pgmanifiesto_txtsmanifiesto_despachador" placeholder="" >
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-15 form-row align-items-center">
                                            <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_txtsmanifiesto_proveedor_documento">FAC/BOL/PROVEEDOR</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class="form-control" type="text" style="text-transform:uppercase" id="pgmanifiesto_txtsmanifiesto_proveedor_documento" name="pgmanifiesto_txtsmanifiesto_proveedor_documento" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 offset-md-12 text-center">
                                    <div class="form-row">
                                        <div class="col-xl-8">

                                        </div>
                                        <div class="col-xl-2">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light form-control" id="btnguardar_todo">GUARDAR</button>
                                        </div>
                                        <div class="col-xl-2">
                                            <button type="submit" class="btn btn-danger waves-effect waves-light form-control" id="bntcancelar_todo">REGRESAR</button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Begin MANIFIESTO -->
            <!-- </form> -->

		</div>
		
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	</div>
	
    <?php require_once("../NavJs/index.php");?>

	<script src="mov_reenvio_mnto.js"></script>


</body>
</html>
<?php
    }else{
        header("Location:".Conectar::ruta()."404.php");
    }
?>
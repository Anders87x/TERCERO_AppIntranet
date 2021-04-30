<div class="modal fade" id="modal_registro" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="lbltitle">NUEVO </h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
			</div>

			<div class="modal-body">
				<div>

<!--                     <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">CODIGO</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="7" id="txtscliente_codigo" name="txtscliente_codigo" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="true">
                        </div>
                    </div> -->
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">RUC</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="11" id="txtscliente_ruc" name="txtscliente_ruc" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="false" pattern="[0-9]">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">RAZON SOCIAL</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="250" id="txtscliente_razon_social" name="txtscliente_razon_social" type="textscliente_razon_social" style="text-transform:uppercase;" placeholder="" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">ABREVIATURA</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="50" id="txtscliente_abreviatura" name="txtscliente_abreviatura" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="false">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">CENTRAL TELEFONICA</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="20" id="txtscliente_central_telefonica" name="txtscliente_central_telefonica" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="false">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">DIRECCION</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="250" id="txtscliente_direccion" name="txtscliente_direccion" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="true">
                        </div>
                    </div>

                    <div class="form-group row m-b-15 form-row align-items-center">
                        <label class="col-md-4 col-sm-4 col-form-label" for="cmbsdepartamento_codigo">DEPARTAMENTO</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsdepartamento_codigo" name="cmbsdepartamento_codigo" placeholder="" data-parsley-required="true"></select>
                        </div>
                    </div>
                    <div class="form-group row m-b-15 form-row align-items-center">
                        <label class="col-md-4 col-sm-4 col-form-label" for="cmbsprovincia_codigo">PROVINCIA</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsprovincia_codigo" name="cmbsprovincia_codigo" placeholder="" data-parsley-required="true"></select>
                        </div>
                    </div>
                    <div class="form-group row m-b-15 form-row align-items-center">
                        <label class="col-md-4 col-sm-4 col-form-label" for="cmbsdistrito_codigo">DISTRITO</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsdistrito_codigo" name="cmbsdistrito_codigo" placeholder="" data-parsley-required="true"></select>
                        </div>
                    </div>

                    <div class="form-group row m-b-15 form-row align-items-center">
                        <label class="col-md-4 col-sm-4 col-form-label" for="cmbsgrupo_cliente_codigo">GRUPO DE CLIENTES</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsgrupo_cliente_codigo" name="cmbsgrupo_cliente_codigo" placeholder="" data-parsley-required="false"></select>
                        </div>
                    </div>
					<div class="form-group row m-b-15 align-items-center">
						<div class="custom-control custom-switch">
							<div class="col-sm-12">
								<input type="checkbox" class="custom-control-input" id="chkscliente_politica_precio" name="chkscliente_politica_precio">
								<label class="custom-control-label" for="chkscliente_politica_precio">    TIENE ASIGNADA UNA POLITICA DE PRECIO</label>
							</div>
						</div>
					</div>
					<div class="form-group row m-b-15 align-items-center">
						<div class="custom-control custom-switch">
							<div class="col-sm-12">
								<input type="checkbox" class="custom-control-input" id="chkscliente_facturacion" name="chkscliente_facturacion">
								<label class="custom-control-label" for="chkscliente_facturacion">    CLIENTE REGISTRADO PARA FACTURACION</label>
							</div>
						</div>
					</div>
					<div class="form-group row m-b-15 align-items-center">
						<div class="custom-control custom-switch">
							<div class="col-sm-12">
								<input type="checkbox" class="custom-control-input" id="chkscliente_estado" name="chkscliente_estado">
								<label class="custom-control-label" for="chkscliente_estado">    EL CLIENTE ESTA ACTIVO</label>
							</div>
						</div>
					</div>



				</div>
			</div>

			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-white" data-dismiss="modal">CERRAR</a>
				<a href="javascript:;" class="btn btn-primary" id="btnregistro_guardar">GUARDAR</a>
			</div>

		</div>
	</div>
</div>

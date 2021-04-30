<?php
	class svrarc_cliente extends Conectar{

		/** METODO: OBTENER VISTA DE REGISTROS ******************************************/
		public function mdl_obtener_vista_00(
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_arc_cliente_obtener_vista_00 ()";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}

		/** METODO: NUEVO REGISTRO ****************************************************/
		public function mdl_agregar(
			$pscliente_codigo,
			$pscliente_ruc,
			$pscliente_razon_social,
			$pscliente_abreviatura,
			$pscliente_direccion,
			$psdepartamento_codigo,
			$psprovincia_codigo,
			$psubigeo_codigo,
			$pscliente_central_telefonica,
			$psgrupo_cliente_codigo,
			$pscliente_politica_precio,
			$pscliente_facturacion,
			$pscliente_estado,
			$psauditoria_usuario
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_arc_cliente_agregar (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $pscliente_codigo);
			$ssql_objeto->bindValue(2, $pscliente_ruc);
			$ssql_objeto->bindValue(3, $pscliente_razon_social);
			$ssql_objeto->bindValue(4, $pscliente_abreviatura);
			$ssql_objeto->bindValue(5, $pscliente_direccion);
			$ssql_objeto->bindValue(6, $psdepartamento_codigo);
			$ssql_objeto->bindValue(7, $psprovincia_codigo);
			$ssql_objeto->bindValue(8, $psubigeo_codigo);
			$ssql_objeto->bindValue(9, $pscliente_central_telefonica);
			$ssql_objeto->bindValue(10, $psgrupo_cliente_codigo);
			$ssql_objeto->bindValue(11, $pscliente_politica_precio);
			$ssql_objeto->bindValue(12, $pscliente_facturacion);
			$ssql_objeto->bindValue(13, $pscliente_estado);
			$ssql_objeto->bindValue(14, $psauditoria_usuario);

			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}

		/** METODO: ELIMINAR REGISTRO ****************************************************/
		public function mdl_eliminar(
			$pscodigo_aleatorio,
			$psauditoria_usuario
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia ="call apr_web_arc_cliente_eliminar (?,?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $pscodigo_aleatorio);
			$ssql_objeto->bindValue(2, $psauditoria_usuario);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}

		/** METODO: BUSCAR REGISTRO ****************************************************/
		public function mdl_buscar(
			$pscodigo_aleatorio
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_arc_cliente_buscar (?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $pscodigo_aleatorio);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}

        /** METODO: OBTENER VISTA DE REGISTROS PARA COMBOBOX ******************************************/
        public function mdl_select(
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_arc_cliente_select()";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}
				
		/** METODO: BUSCAR REGISTRO EN OTRAS TABLAS ****************************************************/
		public function mdl_buscar_dependencia(
			$pscodigo_aleatorio
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();
			$ssql_sentencia = "call apr_web_arc_cliente_buscar_dependencia (?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $pscodigo_aleatorio);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}
	}
?>

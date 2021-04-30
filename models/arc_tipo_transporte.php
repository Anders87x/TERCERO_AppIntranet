<?php
	class svrarc_tipo_transporte extends Conectar{

		/** METODO: OBTENER VISTA DE REGISTROS ******************************************/
		public function mdl_obtener_vista_00(
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_arc_tipo_transporte_obtener_vista_00 ()";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}

		/** METODO: NUEVO REGISTRO ****************************************************/
		public function mdl_agregar(
			$pstipo_transporte_codigo,
			$pstipo_transporte_descripcion,
			$pstipo_transporte_abreviatura,
			$psauditoria_usuario
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_arc_tipo_transporte_agregar (?,?,?,?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $pstipo_transporte_codigo);
			$ssql_objeto->bindValue(2, $pstipo_transporte_descripcion);
			$ssql_objeto->bindValue(3, $pstipo_transporte_abreviatura);
			$ssql_objeto->bindValue(4, $psauditoria_usuario);

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

			$ssql_sentencia ="call apr_web_arc_tipo_transporte_eliminar (?,?)";
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

			$ssql_sentencia = "call apr_web_arc_tipo_transporte_buscar (?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $pscodigo_aleatorio);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}

		/** METODO: BUSCAR REGISTRO EN OTRAS TABLAS ****************************************************/
		public function mdl_buscar_dependencia(
			$pscodigo_aleatorio
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();
			$ssql_sentencia = "call apr_web_arc_tipo_transporte_buscar_dependencia (?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $pscodigo_aleatorio);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}
	}
?>

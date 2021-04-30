<?php
	class svrarc_tipo_estado extends Conectar{

		/** METODO: OBTENER VISTA DE REGISTROS ******************************************/
		public function mdl_obtener_vista_00(
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_arc_tipo_estado_obtener_vista_00 ()";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}

		/** METODO: NUEVO REGISTRO ****************************************************/
		public function mdl_agregar(
			$pstipo_estado_codigo,
			$pstipo_estado_descripcion,
			$pstipo_estado_abreviatura,
			$psauditoria_usuario
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_arc_tipo_estado_agregar (?,?,?,?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $pstipo_estado_codigo);
			$ssql_objeto->bindValue(2, $pstipo_estado_descripcion);
			$ssql_objeto->bindValue(3, $pstipo_estado_abreviatura);
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

			$ssql_sentencia ="call apr_web_arc_tipo_estado_eliminar (?,?)";
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

			$ssql_sentencia = "call apr_web_arc_tipo_estado_buscar (?)";
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

			$ssql_sentencia = "call apr_web_arc_tipo_estado_select()";
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
			$ssql_sentencia = "call apr_web_arc_tipo_estado_buscar_dependencia (?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $pscodigo_aleatorio);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}
	}
?>

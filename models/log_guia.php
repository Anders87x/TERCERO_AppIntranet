<?php
    class svrlog_guia extends Conectar{

        /** METODO: ACTUALIZAR DATOS DEL REMITENTE ******************************************/
        public function mdl_editar_remitente(
            $psgrupo_cliente_codigo_editar,
            $psremite_cliente_codigo_editar,
            $psremite_cliente_direccion_editar,
            $psremite_departamento_codigo_editar,
            $psremite_provincia_codigo_editar,
            $psremite_distrito_codigo_editar,
            $psremite_atencion_editar,
            $pscodigo_aleatorio,
            $psauditoria_usuario
        ){
            $nhandle_conexion_bd = parent::_crear_conexion_bd();
            parent::set_names();

            $ssql_sentencia = "call apr_web_log_guia_remitente_editar (?,?,?,?,?,?,?,?,?)";
            $ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
            $ssql_objeto->bindValue(1, $psgrupo_cliente_codigo_editar);
            $ssql_objeto->bindValue(2, $psremite_cliente_codigo_editar);
            $ssql_objeto->bindValue(3, $psremite_cliente_direccion_editar);
            $ssql_objeto->bindValue(4, $psremite_departamento_codigo_editar);
            $ssql_objeto->bindValue(5, $psremite_provincia_codigo_editar);
            $ssql_objeto->bindValue(6, $psremite_distrito_codigo_editar);
            $ssql_objeto->bindValue(7, $psremite_atencion_editar);
            $ssql_objeto->bindValue(8, $pscodigo_aleatorio);
            $ssql_objeto->bindValue(9, $psauditoria_usuario);
            $ssql_objeto->execute();
            return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
        }

        /** METODO: ACTUALIZAR DATOS DEL DESTINATARIO ******************************************/
        public function mdl_editar_destinatario(
            $psdestino_empresa_razon_social_editar,
            $psdestino_empresa_direccion_editar,
            $psdestino_departamento_codigo_editar,
            $psdestino_provincia_codigo_editar,
            $psdestino_distrito_codigo_editar,
            $psdestino_atencion_editar,
            $pscodigo_aleatorio,
            $psauditoria_usuario
        ){
            $nhandle_conexion_bd = parent::_crear_conexion_bd();
            parent::set_names();

            $ssql_sentencia = "call apr_web_log_guia_destinatario_editar (?,?,?,?,?,?,?,?)";
            $ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
            $ssql_objeto->bindValue(1, $psdestino_empresa_razon_social_editar);
            $ssql_objeto->bindValue(2, $psdestino_empresa_direccion_editar);
            $ssql_objeto->bindValue(3, $psdestino_departamento_codigo_editar);
            $ssql_objeto->bindValue(4, $psdestino_provincia_codigo_editar);
            $ssql_objeto->bindValue(5, $psdestino_distrito_codigo_editar);
            $ssql_objeto->bindValue(6, $psdestino_atencion_editar);
            $ssql_objeto->bindValue(7, $pscodigo_aleatorio);
            $ssql_objeto->bindValue(8, $psauditoria_usuario);
            $ssql_objeto->execute();
            return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
        }

        /** METODO: ACTUALIZAR DATOS BASICOS DE LA GUIA ******************************************/
        public function mdl_editar_datos_basicos(
            $psguia_hoja_ruta_editar,
            $pdguia_fecha_recepcion_editar,
            $pdguia_fecha_vencimiento_editar,
            $pdguia_fecha_retorno_limite_editar,
            $psprioridad_codigo_editar,
            $psguia_licitacion_editar,
            $psguia_exclusivo_editar,
            $pscodigo_aleatorio,
            $psauditoria_usuario
        ){
            $nhandle_conexion_bd = parent::_crear_conexion_bd();
            parent::set_names();

            $ssql_sentencia = "call apr_web_log_guia_datos_basicos_editar (?,?,?,?,?,?,?,?,?)";
            $ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
            $ssql_objeto->bindValue(1, $psguia_hoja_ruta_editar);
            $ssql_objeto->bindValue(2, $pdguia_fecha_recepcion_editar);
            $ssql_objeto->bindValue(3, $pdguia_fecha_vencimiento_editar);
            $ssql_objeto->bindValue(4, $pdguia_fecha_retorno_limite_editar);
            $ssql_objeto->bindValue(5, $psprioridad_codigo_editar);
            $ssql_objeto->bindValue(6, $psguia_licitacion_editar);
            $ssql_objeto->bindValue(7, $psguia_exclusivo_editar);
            $ssql_objeto->bindValue(8, $pscodigo_aleatorio);
            $ssql_objeto->bindValue(9, $psauditoria_usuario);
            $ssql_objeto->execute();
            return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
        }

        /** METODO: OBTENER TODO EL REGISTRO ******************************************/
        public function mdl_obtener_registro($pscodigo_aleatorio){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_log_guia_obtener_registro (?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pscodigo_aleatorio);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

		/** METODO: OBTENER VISTA DE REGISTROS ******************************************/
		public function mdl_precio_vista_01(
        ){
            $nhandle_conexion_bd = parent::_crear_conexion_bd();
            parent::set_names();

            $ssql_sentencia = "call apr_web_log_guia_precio_vista_01 ()";
            $ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
            $ssql_objeto->execute();
            return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
        }
    
        
        /** METODO: OBTENER VISTA PARA PANEL CABECERA ******************************************/
        public function mdl_panel_cabecera(
            $pscodigo_aleatorio
        ){
            $nhandle_conexion_bd = parent::_crear_conexion_bd();
            parent::set_names();

            $ssql_sentencia = "call apr_web_log_guia_panel_cabecera (?)";
            $ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
            $ssql_objeto->bindValue(1, $pscodigo_aleatorio);
            $ssql_objeto->execute();
            return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
        }

        /** METODO: BUSCAR DUPLICADO ******************************************/
        public function mdl_buscar_duplicado(
            $pstipo_documento_codigo,
            $psguia_serie,
            $psguia_correlativo
        ){
            $nhandle_conexion_bd = parent::_crear_conexion_bd();
            parent::set_names();

            $ssql_sentencia = "call apr_web_log_guia_buscar_duplicado (?,?,?)";
            $ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
            $ssql_objeto->bindValue(1, $pstipo_documento_codigo);
            $ssql_objeto->bindValue(2, $psguia_serie);
            $ssql_objeto->bindValue(3, $psguia_correlativo);
            $ssql_objeto->execute();

            return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>

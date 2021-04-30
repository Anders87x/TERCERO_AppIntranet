<?php
    class svrlog_guia_reenvio extends Conectar{

        public function mdl_registro_insert(
            $pstipo_documento_codigo,
            $psguia_serie,
            $psguia_correlativo,
            $psguia_item,
            $pdguia_fecha_reenvio,
            $psdestino_empresa_razon_social,
            $psdestino_empresa_direccion,
            $psdestino_distrito_codigo,
            $psdestino_provincia_codigo,
            $psdestino_departamento_codigo,
            $psdestino_atencion,
            $psagente_codigo,
            $pstipo_servicio_codigo,
            $psruta_servicio_codigo,
            $psproveedor_codigo,
            $pstipo_transporte_codigo,
            $pdmanifiesto_fecha_salida,
            $psmanifiesto_hora_salida,
            $psmanifiesto_despachador,
            $psmanifiesto_proveedor_documento,
            $psauditoria_usuario
        ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();

            $sql="call apr_web_log_guia_reenvio_insert (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->bindValue(4, $psguia_item);
            $stmt->bindValue(5, $pdguia_fecha_reenvio);
            $stmt->bindValue(6, $psdestino_empresa_razon_social);
            $stmt->bindValue(7, $psdestino_empresa_direccion);
            $stmt->bindValue(8, $psdestino_distrito_codigo);
            $stmt->bindValue(9, $psdestino_provincia_codigo);
            $stmt->bindValue(10, $psdestino_departamento_codigo);
            $stmt->bindValue(11, $psdestino_atencion);
            $stmt->bindValue(12, $psagente_codigo);
            $stmt->bindValue(13, $pstipo_servicio_codigo);
            $stmt->bindValue(14, $psruta_servicio_codigo);
            $stmt->bindValue(15, $psproveedor_codigo);
            $stmt->bindValue(16, $pstipo_transporte_codigo);
            $stmt->bindValue(17, $pdmanifiesto_fecha_salida);
            $stmt->bindValue(18, $psmanifiesto_hora_salida);
            $stmt->bindValue(19, $psmanifiesto_despachador);
            $stmt->bindValue(20, $psmanifiesto_proveedor_documento);
            $stmt->bindValue(21, $psauditoria_usuario);

            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_registro_delete(
            $pscodigo_aleatorio,
            $psauditoria_usuario
        ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();

            $sql="call apr_web_log_guia_reenvio_delete (?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pscodigo_aleatorio);
            $stmt->bindValue(2, $psauditoria_usuario);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function mdl_vista_01(
            $pstipo_documento_codigo,
            $psguia_serie,
            $psguia_correlativo
        ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();

            $sql="call apr_web_mov_log_guia_reenvio_vista_01(?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_obtener_datos_xml(
            $pscodigo_aleatorio
        ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();

            $sql="call apr_web_mov_log_guia_reenvio_obtener_datos_xml(?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pscodigo_aleatorio);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        

    }
?>

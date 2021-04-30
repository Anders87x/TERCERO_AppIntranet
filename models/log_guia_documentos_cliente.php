<?php
    class svrlog_guia_documentos_cliente extends Conectar{

        /** METODO: OBTENER VISTA PARA PANEL CABECERA ******************************************/
        public function mdl_log_guia_documentos_cliente_update_file(
            $psguia_documento_ruta_web,
            $pscodigo_aleatorio
        ){
            $nhandle_conexion_bd = parent::_crear_conexion_bd();
            parent::set_names();

            $ssql_sentencia = "call apr_web_log_guia_documentos_cliente_update_file (?,?)";
            $ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
            $ssql_objeto->bindValue(1, $psguia_documento_ruta_web);
            $ssql_objeto->bindValue(2, $pscodigo_aleatorio);
            $ssql_objeto->execute();
            return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>

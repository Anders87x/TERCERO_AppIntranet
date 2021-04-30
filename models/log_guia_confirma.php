<?php
    class svrlog_guia_confirma extends Conectar{

        /** METODO: OBTENER VISTA PARA PANEL CABECERA ******************************************/
        public function mdl_panel_cabecera(
            $pscodigo_aleatorio
        ){
            $nhandle_conexion_bd = parent::_crear_conexion_bd();
            parent::set_names();

            $ssql_sentencia = "call apr_web_log_guia_confirma_panel_cabecera (?)";
            $ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
            $ssql_objeto->bindValue(1, $pscodigo_aleatorio);
            $ssql_objeto->execute();
            return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>

<?php
    class Servicio extends Conectar{
        
        public function login(){
			$conectar_FCL=parent::conexion_FCL();
			parent::set_names();
			if(isset($_POST["enviar"])){
                $correo = $_POST["correo"];
                $password = $_POST["password"];

                if(empty($correo) and empty($password)){
                    header("Location:".conectar::ruta()."index.php?m=1");
                    exit();
                } else {
                    $sql= "call apr_web_usuario_validar_clave(?,?)";
                    $stmt=$conectar_FCL->prepare($sql);
                    $stmt->bindValue(1, $correo);
                    $stmt->bindValue(2, $password);
                    $stmt->execute();

                    $resultado = $stmt->fetch();

                        if(strlen($resultado["scodigo_aleatorio"])<>0){

                            $_SESSION["lscliente_codigo"] = trim($resultado["scodigo_aleatorio"]);
                            $_SESSION["lscliente_contacto_codigo"] = trim($resultado["susuario_codigo"]);
                            $_SESSION["lscliente_contacto_nombre"] = trim($resultado["susuario_nombre"]);
                            $_SESSION["lscliente_contacto_clave"] = trim($resultado["susuario_clave_web"]);
                            $_SESSION["psusuario_correo_electronico"] = trim($resultado["susuario_correo"]);
                            $_SESSION["lscliente_razon_social"] = "";

                            if (trim($resultado["susuario_clave_web"])=="e10adc3949ba59abbe56e057f20f883e"){
                                header("Location:".Conectar::ruta()."view/CambiarPassword/");

                            }else{
                                header("Location:".Conectar::ruta()."view/home/");

                            }
                            exit();
                        } else {
                            header("Location:".Conectar::ruta()."index.php?m=2");
                            exit();
                        } 
                    }
                }
         
        }

        public function mdl_apr_web_usuario_actualizar_clave($correo,$clave){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_usuario_actualizar_clave (?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $correo);
            $stmt->bindValue(2, $clave);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }
 
        public function APR_rpt_servicio_resumen($usu_id,$mes,$ano){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call sp_APR_rpt_servicio_resumem (?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $usu_id);
            $stmt->bindValue(2, $mes);
            $stmt->bindValue(3, $ano);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }
 
        public function APR_rpt_servicio_resumen_suma($usu_id,$mes,$ano){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call sp_APR_rpt_servicio_resumen_suma (?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $usu_id);
            $stmt->bindValue(2, $mes);
            $stmt->bindValue(3, $ano);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function APR_consulta_A02_guia($usu_id,$mes,$ano,$parametro){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call sp_APR_consulta_A02_guia (?,?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $usu_id);
            $stmt->bindValue(2, $mes);
            $stmt->bindValue(3, $ano);
            $stmt->bindValue(4, $parametro);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function APR_llenar_cliente_combo(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call sp_APR_llenar_cliente_combo";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_tipo_documento_select($pstipo_documento_sunat){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call APR_WEB_tipo_documento_select (?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_sunat);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_grupo_cliente_select(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call APR_WEB_grupo_cliente_select() ";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_ubigeo_dpto_select(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_ubigeo_dpto_select() ";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_ubigeo_prov_select($psdepartamento_codigo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_ubigeo_prov_select(?) ";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $psdepartamento_codigo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_ubigeo_dist_select($psprovincia_codigo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_ubigeo_dist_select(?) ";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $psprovincia_codigo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_remitente_select($psgrupo_cliente_codigo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="CALL APR_WEB_remitente_select (?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $psgrupo_cliente_codigo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_remitente_obtener_registro($psgrupo_cliente_codigo, $psremite_cliente_codigo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_remitente_obtener_registro (?, ?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $psgrupo_cliente_codigo);
            $stmt->bindValue(2, $psremite_cliente_codigo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_destinatario_obtener_registro($pscodigo_aleatorio){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_destinatario_obtener_registro (?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pscodigo_aleatorio);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_producto_obtener_registro($psproducto_codigo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_producto_obtener_registro (?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $psproducto_codigo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_agente_obtener_registro($psagente_codigo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_agente_obtener_registro (?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $psagente_codigo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_destinatario_select(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_destinatario_select ()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function mdl_apr_web_producto_select(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_producto_select ()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function mdl_apr_web_agente_select(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_agente_select ()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_tipo_servicio_select(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_tipo_servicio_select ()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_proveedor_select(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_proveedor_select ()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }        
        
        public function mdl_apr_web_tipo_transporte_select(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_tipo_transporte_select ()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }        

        public function mdl_apr_web_ubigeo_select($pstipo_ubigeo_codigo, $psubigeo_codigo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_ubigeo_select (?, ?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_ubigeo_codigo);
            $stmt->bindValue(2, $psubigeo_codigo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_ruta_servicio_select($pstipo_servicio_codigo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="CALL APR_WEB_ruta_servicio_select (?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_servicio_codigo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function APR_llenar_combo_origen_destino($tipo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            /*$sql="SELECT sruta_codigo, sruta_descripcion from dbo.ARC_ruta_servicio where stipo_servicio_codigo = ? AND sregistro_estado = '1' order by 2"; */
            $sql="call sp_APR_llenar_combo_origen_destino (?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $tipo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function APR_servicio_solicitado($usu_id,$tipo,$origen,$destino,$estado,$mes,$ano){
            $conectar_FCL=parent::conexion_FCL();	
            parent::set_names();
            $sql="call sp_APR_rpt_servicio_solicitado (?,?,?,?,?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $usu_id);
            $stmt->bindValue(2, $tipo);
            $stmt->bindValue(3, $origen);
            $stmt->bindValue(4, $destino);
            $stmt->bindValue(5, $estado);
            $stmt->bindValue(6, $mes);
            $stmt->bindValue(7, $ano);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_consulta_A01_guia($pstipo_documento_codigo, $psguia_serie, $psguia_correlativo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_consulta_A01_guia (?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_consulta_A01_guia_cabecera($pstipo_documento_codigo, $psguia_serie, $psguia_correlativo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_consulta_A01_guia_cabecera (?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_consulta_A01_guia_detalle($pstipo_documento_codigo, $psguia_serie, $psguia_correlativo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_consulta_A01_guia_detalle (?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_consulta_A01_guia_incidencia($pstipo_documento_codigo, $psguia_serie, $psguia_correlativo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_consulta_A01_guia_incidencia (?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_consulta_A01_guia_documento($pstipo_documento_codigo, $psguia_serie, $psguia_correlativo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_consulta_A01_guia_documento (?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }


        public function mdl_dashboard_resumen_01($psguia_fecha_recepcion_mes, $psguia_fecha_recepcion_annio){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_dashboard_resumen_01 (?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $psguia_fecha_recepcion_mes);
            $stmt->bindValue(2, $psguia_fecha_recepcion_annio);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function mdl_dashboard_distribucion_documentos($psguia_fecha_recepcion_mes, $psguia_fecha_recepcion_annio){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_dashboard_distribucion_documentos(?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $psguia_fecha_recepcion_mes);
            $stmt->bindValue(2, $psguia_fecha_recepcion_annio);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_mov_registro_vista(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="CALL apr_web_mov_registro_vista()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_mov_registro_vista_01($pstipo_documento_codigo,$psguia_serie,$psguia_correlativo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_mov_registro_vista_01('NAC', '001', '001441')";
            $sql="CALL apr_web_mov_registro_vista_01(?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_mov_registro_vista_02($pstipo_servicio_codigo,$psruta_servicio_destino_codigo,$psgrupo_cliente_codigo,$psfecha_recepcion_inicial,$psfecha_recepcion_final,$psguia_hoja_ruta){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_mov_registro_vista_02('', '', '', '20200901', '20200930', '25-09-2020')";
            $sql="CALL apr_web_mov_registro_vista_02(?,?,?,?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_servicio_codigo);
            $stmt->bindValue(2, $psruta_servicio_destino_codigo);
            $stmt->bindValue(3, $psgrupo_cliente_codigo);
            $stmt->bindValue(4, $psfecha_recepcion_inicial);
            $stmt->bindValue(5, $psfecha_recepcion_final);
            $stmt->bindValue(6, $psguia_hoja_ruta);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

/*******************************************************************************/
/* MOVIMIENTO --> CONFIRMACION DE DOCUMENTOS */

        public function apr_web_mov_confirma_vista(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_confirma_vista()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_mov_confirma_vista_01($pstipo_documento_codigo,$psguia_serie,$psguia_correlativo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="CALL apr_web_mov_confirma_vista_01(?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_mov_confirma_vista_02($pstipo_servicio_codigo,$psruta_servicio_destino_codigo,$psgrupo_cliente_codigo,$psfecha_recepcion_inicial,$psfecha_recepcion_final,$psguia_estado){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="CALL apr_web_mov_confirma_vista_02(?,?,?,?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_servicio_codigo);
            $stmt->bindValue(2, $psruta_servicio_destino_codigo);
            $stmt->bindValue(3, $psgrupo_cliente_codigo);
            $stmt->bindValue(4, $psfecha_recepcion_inicial);
            $stmt->bindValue(5, $psfecha_recepcion_final);
            $stmt->bindValue(6, $psguia_estado);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_mov_confirma_vista_03($pstipo_documento_codigo,$psdocumento_numero){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="CALL apr_web_mov_confirma_vista_03(?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psdocumento_numero);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }


        public function mdl_apr_web_mov_confirma_resumen(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_confirma_resumen()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_confirma_resumen_01(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_confirma_resumen_01()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_confirma_resumen_02(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_confirma_resumen_02()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_confirma_resumen_03(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_confirma_resumen_03()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_confirma_resumen_04(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_confirma_resumen_04()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_confirma_resumen_05(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_confirma_resumen_05()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_confirma_resumen_05_vista($pstipo_servicio_codigo,$psruta_origen_codigo,$psruta_destino_codigo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_confirma_resumen_05_vista(?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_servicio_codigo);
            $stmt->bindValue(2, $psruta_origen_codigo);
            $stmt->bindValue(3, $psruta_destino_codigo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_confirma_resumen_06(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_confirma_resumen_06()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_confirma_resumen_06_vista($pstipo_servicio_codigo,$psruta_origen_codigo,$psruta_destino_codigo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_confirma_resumen_06_vista(?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_servicio_codigo);
            $stmt->bindValue(2, $psruta_origen_codigo);
            $stmt->bindValue(3, $psruta_destino_codigo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }



/*******************************************************************************/
/* MOVIMIENTO --> RETORNO DE DOCUMENTOS */

        public function apr_web_mov_retorno_vista(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="CALL apr_web_mov_retorno_vista()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_mov_retorno_vista_01($pstipo_documento_codigo,$psguia_serie,$psguia_correlativo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="CALL apr_web_mov_retorno_vista_01(?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_mov_retorno_vista_02($pstipo_servicio_codigo,$psruta_servicio_destino_codigo,$psgrupo_cliente_codigo,$psfecha_recepcion_inicial,$psfecha_recepcion_final,$psguia_estado){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="CALL apr_web_mov_retorno_vista_02(?,?,?,?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_servicio_codigo);
            $stmt->bindValue(2, $psruta_servicio_destino_codigo);
            $stmt->bindValue(3, $psgrupo_cliente_codigo);
            $stmt->bindValue(4, $psfecha_recepcion_inicial);
            $stmt->bindValue(5, $psfecha_recepcion_final);
            $stmt->bindValue(6, $psguia_estado);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_mov_retorno_vista_03($pstipo_documento_codigo,$psdocumento_numero){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="CALL apr_web_mov_retorno_vista_03(?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psdocumento_numero);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }


        public function mdl_apr_web_mov_retorno_resumen(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_retorno_resumen()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_retorno_resumen_01(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_retorno_resumen_01()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_retorno_resumen_02(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_retorno_resumen_02()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_retorno_resumen_03(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_retorno_resumen_03()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_retorno_resumen_04(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_retorno_resumen_04()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_retorno_resumen_05(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_retorno_resumen_05()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }
                        
        public function mdl_apr_web_mov_retorno_resumen_05_vista($pstipo_servicio_codigo,$psruta_origen_codigo,$psruta_destino_codigo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_retorno_resumen_05_vista(?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_servicio_codigo);
            $stmt->bindValue(2, $psruta_origen_codigo);
            $stmt->bindValue(3, $psruta_destino_codigo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }



/*******************************************************************************/
/* MOVIMIENTO --> CONSULTA COMPLETA DE DOCUMENTOS */

        public function apr_web_mov_consulta_A01_guia($pstipo_documento_codigo,$psguia_serie,$psguia_correlativo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_mov_consulta_A01_guia('NAC', '001', '001441')";
            $sql="CALL apr_web_mov_consulta_A01_guia(?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_mov_consulta_A01_guia_cabecera($pstipo_documento_codigo,$psguia_serie,$psguia_correlativo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="CALL apr_web_mov_consulta_A01_guia_cabecera(?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_mov_consulta_A01_guia_retorno($pstipo_documento_codigo,$psguia_serie,$psguia_correlativo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_mov_consulta_A01_guia_retorno(?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }        

        public function apr_web_mov_consulta_A01_guia_confirmacion($pstipo_documento_codigo,$psguia_serie,$psguia_correlativo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="CALL apr_web_mov_consulta_A01_guia_confirmacion(?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }        

        public function apr_web_mov_consulta_A01_guia_detalle($pstipo_documento_codigo,$psguia_serie,$psguia_correlativo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_mov_consulta_A01_guia_detalle('NAC', '001', '001441')";
            $sql="CALL apr_web_mov_consulta_A01_guia_detalle(?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_mov_consulta_A01_guia_incidencia($pstipo_documento_codigo,$psguia_serie,$psguia_correlativo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_mov_consulta_A01_guia_incidencia('NAC', '001', '001441')";
            $sql="CALL apr_web_mov_consulta_A01_guia_incidencia(?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_mov_consulta_A01_guia_documento($pstipo_documento_codigo,$psguia_serie,$psguia_correlativo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_mov_consulta_A01_guia_documento('NAC', '001', '001441')";
            $sql="CALL apr_web_mov_consulta_A01_guia_documento(?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_mov_consulta_A01_guia_manifiesto($pstipo_documento_codigo,$psguia_serie,$psguia_correlativo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_mov_consulta_A01_guia_manifiesto('NAC', '001', '001441')";
            $sql="CALL apr_web_mov_consulta_A01_guia_manifiesto(?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_log_guia_delete($pstipo_documento_codigo,$psguia_serie,$psguia_correlativo, $psauditoria_usuario){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_log_guia_delete('NAC', '001', '001441')";
            $sql="call apr_web_log_guia_delete(?,?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->bindValue(4, $psauditoria_usuario);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function log_guia_detalle_delete($pscodigo_aleatorio,$psauditoria_usuario){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_log_guia_detalle_delete('4FF9CDCDDC', 'APROEM-SISTEMAS')";
            $sql="CALL apr_web_log_guia_detalle_delete(?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pscodigo_aleatorio);
            $stmt->bindValue(2, $psauditoria_usuario);
            $stmt->execute();
        }

        public function mdl_apr_web_log_guia_retorno_delete($pscodigo_aleatorio,$psauditoria_usuario){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_log_guia_detalle_delete('4FF9CDCDDC', 'APROEM-SISTEMAS')";
            $sql="call apr_web_log_guia_retorno_delete(?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pscodigo_aleatorio);
            $stmt->bindValue(2, $psauditoria_usuario);
            $stmt->execute();
        }

        public function mdl_apr_web_log_guia_confirma_delete($pscodigo_aleatorio,$psauditoria_usuario){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_log_guia_detalle_delete('4FF9CDCDDC', 'APROEM-SISTEMAS')";
            $sql="call apr_web_log_guia_confirma_delete(?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pscodigo_aleatorio);
            $stmt->bindValue(2, $psauditoria_usuario);
            $stmt->execute();
        }

        public function log_guia_documentos_cliente_delete($pscodigo_aleatorio,$psauditoria_usuario){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_log_guia_documentos_cliente_delete('41661B1058', 'APROEM-SISTEMAS')";
            $sql="CALL apr_web_log_guia_documentos_cliente_delete(?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pscodigo_aleatorio);
            $stmt->bindValue(2, $psauditoria_usuario);
            $stmt->execute();
        }

        public function mdl_apr_web_log_guia_retorno_insert(
            $pstipo_documento_codigo,
            $psguia_serie,
            $psguia_correlativo,
            $psguia_retorno_fecha,
            $psguia_numero_reporte,
            $psguia_retorno_observacion,
            $pscodigo_aleatorio,
            $pssuperior_aleatorio,
            $psauditoria_usuario
        ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_log_guia_retorno_insert(?,?,?,?,?,?,?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->bindValue(4, $psguia_retorno_fecha);
            $stmt->bindValue(5, $psguia_numero_reporte);
            $stmt->bindValue(6, $psguia_retorno_observacion);
            $stmt->bindValue(7, $pscodigo_aleatorio);
            $stmt->bindValue(8, $pssuperior_aleatorio);
            $stmt->bindValue(9, $psauditoria_usuario);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        
        public function mdl_apr_web_log_guia_confirma_insert(
            $pstipo_documento_codigo,
            $psguia_serie,
            $psguia_correlativo,
            $psguia_confirma_persona,
            $psguia_confirma_persona_documento,
            $psguia_confirma_fecha,
            $psguia_confirma_veces_visita,
            $psguia_confirma_estado,
            $psguia_confirma_observacion,
            $pscodigo_aleatorio,
            $pssuperior_aleatorio,
            $psauditoria_usuario
        ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_log_guia_confirma_insert(?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->bindValue(4, $psguia_confirma_persona);
            $stmt->bindValue(5, $psguia_confirma_persona_documento);
            $stmt->bindValue(6, $psguia_confirma_fecha);
            $stmt->bindValue(7, $psguia_confirma_veces_visita);
            $stmt->bindValue(8, $psguia_confirma_estado);
            $stmt->bindValue(9, $psguia_confirma_observacion);
            $stmt->bindValue(10, $pscodigo_aleatorio);
            $stmt->bindValue(11, $pssuperior_aleatorio);
            $stmt->bindValue(12, $psauditoria_usuario);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }


        public function mdl_apr_web_log_guia_incidencia_insert(
            $pstipo_documento_codigo,
            $psguia_serie,
            $psguia_correlativo,
            $psguia_incidencia_fecha,
            $psguia_incidencia_tipo,
            $psguia_incidencia_observacion,
            $pscodigo_aleatorio,
            $pssuperior_aleatorio,
            $psauditoria_usuario
        ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_log_guia_incidencia_insert(?,?,?,?,?,?,?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->bindValue(4, $psguia_incidencia_fecha);
            $stmt->bindValue(5, $psguia_incidencia_tipo);
            $stmt->bindValue(6, $psguia_incidencia_observacion);
            $stmt->bindValue(7, $pscodigo_aleatorio);
            $stmt->bindValue(8, $pssuperior_aleatorio);
            $stmt->bindValue(9, $psauditoria_usuario);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function mdl_apr_web_log_guia_incidencia_delete(
                        $pscodigo_aleatorio,
                        $psauditoria_usuario
        ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="call apr_web_log_guia_incidencia_delete(?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pscodigo_aleatorio);
            $stmt->bindValue(2, $psauditoria_usuario);
            $stmt->execute();
        }
        
        public function log_guia_detalle_insert(
            $pstipo_documento_codigo,$psguia_serie,$psguia_correlativo,$psguia_detalle_numero_item,
            $psproducto_codigo,$psproducto_descripcion,$pnproducto_cantidad,$pnproducto_peso,$pnproducto_costo,
            $scodigo_aleatorio,$pssuperior_aleatorio,$psauditoria_usuario){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_log_guia_detalle_insert('NAC', '001', '009142', '','0001', 'VACUNAS', 5.00, 52.21,14.75, '', '2CE7EC92UD', 'APROEM-SISTEMAS');";
            $sql="CALL apr_web_log_guia_detalle_insert(?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->bindValue(4, $psguia_detalle_numero_item);
            $stmt->bindValue(5, $psproducto_codigo);
            $stmt->bindValue(6, $psproducto_descripcion);
            $stmt->bindValue(7, $pnproducto_cantidad);
            $stmt->bindValue(8, $pnproducto_peso);
            $stmt->bindValue(9, $pnproducto_costo);
            $stmt->bindValue(10, $scodigo_aleatorio);
            $stmt->bindValue(11, $pssuperior_aleatorio);
            $stmt->bindValue(12, $psauditoria_usuario);
            $stmt->execute();
        } 

        public function guia_documentos_cliente_insert(
            $pscliente_codigo,$psguia_tipo_documento_codigo,$psguia_serie,$psguia_correlativo,
            $pscliente_tipo_documento_codigo,$pscliente_guia_numero,$psguia_documento_ruta_local,
            $psguia_documento_ruta_web,$pscodigo_aleatorio,$pssuperior_aleatorio,$psauditoria_usuario){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="call apr_web_log_guia_documentos_cliente_insert('001', 'NAC', '001', '009142', 'FAC','002-000758', '', '','', '2CE7EC92UD', 'APROEM-SISTEMAS')";
            $sql="CALL apr_web_log_guia_documentos_cliente_insert(?,?,?,?,?,?,?,?,?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pscliente_codigo);
            $stmt->bindValue(2, $psguia_tipo_documento_codigo);
            $stmt->bindValue(3, $psguia_serie);
            $stmt->bindValue(4, $psguia_correlativo);
            $stmt->bindValue(5, $pscliente_tipo_documento_codigo);
            $stmt->bindValue(6, $pscliente_guia_numero);
            $stmt->bindValue(7, $psguia_documento_ruta_local);
            $stmt->bindValue(8, $psguia_documento_ruta_web);
            $stmt->bindValue(9, $pscodigo_aleatorio);
            $stmt->bindValue(10, $pssuperior_aleatorio);
            $stmt->bindValue(11, $psauditoria_usuario);
            $stmt->execute();
        }

        public function guia_manifiesto_prov_update(
            $pstipo_documento_codigo,$psguia_serie,$psguia_correlativo,
            $psproveedor_codigo,$pstipo_transporte_codigo,$psmanifiesto_fecha_salida,
            $pnmanifiesto_dias_transito,$psmanifiesto_despachador,$psmanifiesto_proveedor_documento,
            $psauditoria_usuario
           ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="call apr_web_log_guia_manifiesto_prov_update('NAC','001','009142','0002','TER','2020-11-18 15:33:00',2,'JOS VALDEZ','FAC 001-005213','APROEM-SISTEMAS')";
            $sql="CALL apr_web_log_guia_manifiesto_update_prov(?,?,?,?,?,?,?,?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->bindValue(4, $psproveedor_codigo);
            $stmt->bindValue(5, $pstipo_transporte_codigo);
            $stmt->bindValue(6, $psmanifiesto_fecha_salida);
            $stmt->bindValue(7, $pnmanifiesto_dias_transito);
            $stmt->bindValue(8, $psmanifiesto_despachador);
            $stmt->bindValue(9, $psmanifiesto_proveedor_documento);
            $stmt->bindValue(10, $psauditoria_usuario);
            $stmt->execute();
        }

        public function guia_manifiesto_rpte_update(
            $pstipo_documento_codigo,
            $psguia_serie,
            $psguia_correlativo,
            $psagente_codigo
           ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="call apr_web_log_guia_manifiesto_rpte_update()";
            $sql="CALL apr_web_log_guia_manifiesto_update_rpte(?,?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->bindValue(4, $psagente_codigo);
            $stmt->execute();
        }

        public function apr_web_log_guia_insert_buffer(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_log_guia_insert_buffer()";
            $sql="CALL apr_web_log_guia_insert_buffer();";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_log_guia_manifiesto_insert_buffer($pssuperior_aleatorio){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_log_guia_manifiesto_insert_buffer('1CE7EC92UD');";
            $sql="CALL apr_web_log_guia_manifiesto_insert_buffer(?);";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pssuperior_aleatorio);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_log_guia_detalle_insert_buffer(
            $pstipo_documento_codigo,
            $psguia_serie,
            $psguia_correlativo,
            $psguia_detalle_numero_item,
            $psproducto_codigo,
            $psproducto_descripcion,
            $pnproducto_cantidad,
            $pnproducto_peso,
            $pnproducto_costo,
            $pscodigo_aleatorio,
            $pssuperior_aleatorio,
            $psauditoria_usuario
            ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_log_guia_detalle_insert_buffer('NAC', '999', '000520','','0001', 'VACUNAS', 5.00, 52.21,14.75, '', '66E1F43258', 'APROEM-SISTEMAS');";
            $sql="CALL apr_web_log_guia_detalle_insert_buffer(?,?,?,?,?,?,?,?,?,?,?,?);";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1,$pstipo_documento_codigo);
            $stmt->bindValue(2,$psguia_serie);
            $stmt->bindValue(3,$psguia_correlativo);
            $stmt->bindValue(4,$psguia_detalle_numero_item);
            $stmt->bindValue(5,$psproducto_codigo);
            $stmt->bindValue(6,$psproducto_descripcion);
            $stmt->bindValue(7,$pnproducto_cantidad);
            $stmt->bindValue(8,$pnproducto_peso);
            $stmt->bindValue(9,$pnproducto_costo);
            $stmt->bindValue(10,$pscodigo_aleatorio);
            $stmt->bindValue(11,$pssuperior_aleatorio);
            $stmt->bindValue(12,$psauditoria_usuario);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_log_guia_documentos_cliente_insert_buffer(
            $psremite_cliente_codigo,
            $psguia_tipo_documento_codigo,
            $psguia_serie,
            $psguia_correlativo,
            $pscliente_tipo_documento_codigo,
            $pscliente_guia_numero,
            $psguia_documento_ruta_local,
            $psguia_documento_ruta_web,
            $pscodigo_aleatorio,
            $pssuperior_aleatorio,
            $psauditoria_usuario
            ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="call apr_web_log_guia_documentos_cliente_insert_buffer('001', 'NAC','999', '000520', 'FAC','002-000758', '', '','', '2CE7EC92UD', 'APROEM-SISTEMAS');";
            $sql="call apr_web_log_guia_documentos_cliente_insert_buffer(?,?,?,?,?,?,?,?,?,?,?);";
                       
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1,$psremite_cliente_codigo);
            $stmt->bindValue(2,$psguia_tipo_documento_codigo);
            $stmt->bindValue(3,$psguia_serie);
            $stmt->bindValue(4,$psguia_correlativo);
            $stmt->bindValue(5,$pscliente_tipo_documento_codigo);
            $stmt->bindValue(6,$pscliente_guia_numero);
            $stmt->bindValue(7,$psguia_documento_ruta_local);
            $stmt->bindValue(8,$psguia_documento_ruta_web);
            $stmt->bindValue(9,$pscodigo_aleatorio);
            $stmt->bindValue(10,$pssuperior_aleatorio);
            $stmt->bindValue(11,$psauditoria_usuario);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_log_guia_detalle_delete_buffer(
            $pscodigo_aleatorio,
            $psauditoria_usuario
            ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_log_guia_detalle_delete_buffer('4FF9CDCDDC', 'APROEM-SISTEMAS')";
            $sql="CALL apr_web_log_guia_detalle_delete_buffer(?,?);";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1,$pscodigo_aleatorio);
            $stmt->bindValue(2,$psauditoria_usuario);
            $stmt->execute();
        }

        public function apr_web_log_guia_documentos_cliente_delete_buffer(
            $pscodigo_aleatorio,
            $psauditoria_usuario
            ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_log_guia_documentos_cliente_delete_buffer('41661B1058', 'APROEM-SISTEMAS')";
            $sql="CALL apr_web_log_guia_documentos_cliente_delete_buffer(?,?);";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1,$pscodigo_aleatorio);
            $stmt->bindValue(2,$psauditoria_usuario);
            $stmt->execute();
        }

        public function apr_web_log_guia_detalle_select_buffer($pscodigo_aleatorio){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_log_guia_detalle_select_buffer('47E5F18C94');";
            $sql="CALL apr_web_log_guia_detalle_select_buffer(?);";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1,$pscodigo_aleatorio);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_log_guia_documentos_cliente_select_buffer($pscodigo_aleatorio){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="CALL apr_web_log_guia_detalle_select_buffer('2CE7EC92UD');";
            $sql="CALL apr_web_log_guia_documentos_cliente_select_buffer(?);";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1,$pscodigo_aleatorio);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_log_guia_manifiesto_update_buffer(
            $pstipo_documento_codigo,
            $psguia_serie,
            $psguia_correlativo,
            $psagente_codigo,
            $pstipo_servicio_codigo,
            $psruta_servicio_codigo,
            $psproveedor_codigo,
            $pstipo_transporte_codigo,
            $pdmanifiesto_fecha_salida,
            $pnmanifiesto_dias_transito,
            $psmanifiesto_despachador,
            $psmanifiesto_proveedor_documento,
            $pscodigo_aleatorio,
            $pssuperior_aleatorio,
            $psauditoria_usuario
            ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="call apr_web_log_guia_manifiesto_update_buffer('NAC','999', '000520','Z001', '01', '15','0002', 'TER', '2020-11-25 15:33:00',4, 'JOSE VALDEZ','FAC 001-005215', '5D3B0CC67A', '1CE7EC92UD', 'ALDO.SANTOS');";
            $sql="CALL apr_web_log_guia_manifiesto_update_buffer(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->bindValue(4, $psagente_codigo);
            $stmt->bindValue(5, $pstipo_servicio_codigo);
            $stmt->bindValue(6, $psruta_servicio_codigo);
            $stmt->bindValue(7, $psproveedor_codigo);
            $stmt->bindValue(8, $pstipo_transporte_codigo);
            $stmt->bindValue(9, $pdmanifiesto_fecha_salida);
            $stmt->bindValue(10,$pnmanifiesto_dias_transito);
            $stmt->bindValue(11,$psmanifiesto_despachador);
            $stmt->bindValue(12,$psmanifiesto_proveedor_documento);
            $stmt->bindValue(13,$pscodigo_aleatorio);
            $stmt->bindValue(14,$pssuperior_aleatorio);
            $stmt->bindValue(15,$psauditoria_usuario);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_log_guia_update_buffer(
            $pstipo_documento_codigo,
            $psguia_serie,
            $psguia_correlativo,
            $psguia_hoja_ruta,
            $pdguia_fecha_recepcion,
            $pdguia_fecha_vencimiento,
            $pdguia_fecha_retorno_limite,
            $psgrupo_cliente_codigo,
            $psremite_cliente_codigo,
            $psremite_cliente_direccion,
            $psremite_distrito_codigo,
            $psremite_provincia_codigo,
            $psremite_departamento_codigo,
            $psremite_atencion,
            $psdestino_empresa_razon_social,
            $psdestino_empresa_direccion,
            $psdestino_distrito_codigo,
            $psdestino_provincia_codigo,
            $psdestino_departamento_codigo,
            $psdestino_atencion,
            $psdestino_almacen_descripcion,
            $psprioridad_codigo,
            $psguia_licitacion,
            $psguia_exclusivo,
            $psguia_observacion,
            $pscodigo_aleatorio,
            $pssession_id,
            $psauditoria_usuario
            ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="call apr_web_log_guia_update_buffer('NAC', '999', '000520','20201125-01', '20201125', '20201126','20201128', '001', 'AV. NICOLAS ARRIOLA N°345','150105', '1501', '15','SRTA. JESSICA.', 'LABORATORIOS DE VACUNAS', 'AV. PACIFICO 345','010105', '0101', '01','ALDO SANTOS', 'ALMACEN', '3','1', '1', '', '66E1F43258', '', 'ADMINISTRADOR');";
            $sql="CALL apr_web_log_guia_update_buffer(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->bindValue(4, $psguia_hoja_ruta);
            $stmt->bindValue(5, $pdguia_fecha_recepcion);
            $stmt->bindValue(6, $pdguia_fecha_vencimiento);
            $stmt->bindValue(7, $pdguia_fecha_retorno_limite);
            $stmt->bindValue(8, $psgrupo_cliente_codigo);
            $stmt->bindValue(9, $psremite_cliente_codigo);
            $stmt->bindValue(10, $psremite_cliente_direccion);
            $stmt->bindValue(11, $psremite_distrito_codigo);
            $stmt->bindValue(12, $psremite_provincia_codigo);
            $stmt->bindValue(13, $psremite_departamento_codigo);
            $stmt->bindValue(14, $psremite_atencion);
            $stmt->bindValue(15, $psdestino_empresa_razon_social);
            $stmt->bindValue(16, $psdestino_empresa_direccion);
            $stmt->bindValue(17, $psdestino_distrito_codigo);
            $stmt->bindValue(18, $psdestino_provincia_codigo);
            $stmt->bindValue(19, $psdestino_departamento_codigo);
            $stmt->bindValue(20, $psdestino_atencion);
            $stmt->bindValue(21, $psdestino_almacen_descripcion);
            $stmt->bindValue(22, $psprioridad_codigo);
            $stmt->bindValue(23, $psguia_licitacion);
            $stmt->bindValue(24, $psguia_exclusivo);
            $stmt->bindValue(25, $psguia_observacion);
            $stmt->bindValue(26, $pscodigo_aleatorio);
            $stmt->bindValue(27, $pssession_id);
            $stmt->bindValue(28, $psauditoria_usuario);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function apr_web_prioridad_select(){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            //$sql="call APR_WEB_prioridad_select();";
            $sql="call APR_WEB_prioridad_select();";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        /*
        MOVIMIENTO: CONSULTA DE DOCUMENTOS
         */
        public function mdl_apr_web_mov_consulta_vista_01($pstipo_documento_codigo,$psguia_serie,$psguia_correlativo){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="CALL apr_web_mov_consulta_vista_01(?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psguia_serie);
            $stmt->bindValue(3, $psguia_correlativo);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_consulta_vista_02($pstipo_servicio_codigo,$psruta_servicio_destino_codigo,$psgrupo_cliente_codigo,$psfecha_recepcion_inicial,$psfecha_recepcion_final,$psguia_estado){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="CALL apr_web_mov_consulta_vista_02(?,?,?,?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_servicio_codigo);
            $stmt->bindValue(2, $psruta_servicio_destino_codigo);
            $stmt->bindValue(3, $psgrupo_cliente_codigo);
            $stmt->bindValue(4, $psfecha_recepcion_inicial);
            $stmt->bindValue(5, $psfecha_recepcion_final);
            $stmt->bindValue(6, $psguia_estado);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function mdl_apr_web_mov_consulta_vista_03($pstipo_documento_codigo,$psdocumento_numero){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();
            $sql="CALL apr_web_mov_consulta_vista_03(?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pstipo_documento_codigo);
            $stmt->bindValue(2, $psdocumento_numero);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>
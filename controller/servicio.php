<?php
    require_once("../config/conexion.php");
    require_once("../models/Servicio.php");
    $servicio = new Servicio();

    switch($_GET["op"]){
        
        case 'listar_home_derecha':
            $datos=$servicio->APR_rpt_servicio_resumen($_POST["usu_id"],$_POST["mes"],$_POST["ano"]);
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["nnumero_atenciones"];
                $sub_array[] = '<button class="btn btn-info btn-rounded waves-effect waves-light btn-sm" type="button" onClick="buscarpanelderecho(\''.trim($row["stipo_servicio_codigo"]).'\',\''.trim($row["sruta_origen_codigo"]).'\',\''.trim($row["sruta_destino_codigo"]).'\');" id=""><i class="fa fa-arrow-right"></button>';
                $data[] = $sub_array;
            }
        
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        case 'sumar_cantidad':
            $datos=$servicio->APR_rpt_servicio_resumen_suma($_POST["usu_id"],$_POST["mes"],$_POST["ano"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["total_nnumero_atenciones"]  = $row['total_nnumero_atenciones'];
                }
                echo json_encode($output);
            }
        break;

        case 'home_texto1':
            $datos=$servicio->APR_consulta_A02_guia($_POST["usu_id"],$_POST["mes"],$_POST["ano"],$_POST["parametro"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["nnumero_atenciones"]  = $row['nnumero_atenciones'];
                }
                echo json_encode($output);
            }      
        break;

        case 'combo_cliente_home':
            $datos=$servicio->APR_llenar_cliente_combo();
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['stipo_documento_codigo']."'>".ucwords($row['stipo_documento_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;

        case 'ctrl_apr_web_tipo_documento_select':
            $datos=$servicio->mdl_apr_web_tipo_documento_select($_POST["lstipo_documento_sunat"]);
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['stipo_documento_codigo']."'>".ucwords($row['stipo_documento_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;

        case 'ctrl_apr_web_ubigeo_dpto_select':
            $datos=$servicio->mdl_apr_web_ubigeo_dpto_select();
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['sdepartamento_codigo']."'>".ucwords($row['sdepartamento_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;

        case 'ctrl_apr_web_ubigeo_prov_select':
            $datos=$servicio->mdl_apr_web_ubigeo_prov_select($_POST["psdepartamento_codigo"]);
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['sprovincia_codigo']."'>".ucwords($row['sprovincia_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;

        case 'ctrl_apr_web_ubigeo_dist_select':
            $datos=$servicio->mdl_apr_web_ubigeo_dist_select($_POST["psprovincia_codigo"]);
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['subigeo_codigo']."'>".ucwords($row['subigeo_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;
        
        case 'ctrl_apr_web_grupo_cliente_select':
            $datos=$servicio->mdl_apr_web_grupo_cliente_select();
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['sgrupo_cliente_codigo']."'>".ucwords($row['sgrupo_cliente_razon_social'])."</option>";
                }
                echo $html;      
            }
        break;

        case 'ctrl_apr_web_producto_select':
            $datos=$servicio->mdl_apr_web_producto_select();
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['sproducto_codigo']."'>".ucwords($row['sproducto_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;        

        case 'ctrl_apr_web_destinatario_select':
            $datos=$servicio->mdl_apr_web_destinatario_select();
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    $html.= "<option data-subtext='".$row['sdestinatario_direccion']."' value='".$row['scodigo_aleatorio']."'>".ucwords($row['sdestinatario_razon_social'])."</option>";
                }
                echo $html;      
            }
        break;

        case 'ctrl_apr_web_remitente_select':
            $datos=$servicio->mdl_apr_web_remitente_select($_POST["psgrupo_cliente_codigo"]);
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['scliente_codigo']."'>".ucwords($row['scliente_razon_social'])."</option>";
                }
                echo $html;      
            }
        break;

        case 'ctrl_apr_web_remitente_obtener_registro':
            $datos=$servicio->mdl_apr_web_remitente_obtener_registro($_POST["psgrupo_cliente_codigo"], $_POST["psremite_cliente_codigo"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["scliente_direccion"]  = $row['scliente_direccion'];
                    $output["sdepartamento_codigo"]  = $row['sdepartamento_codigo'];
                    $output["sdepartamento_descripcion"]  = $row['sdepartamento_descripcion'];
                    $output["sprovincia_codigo"]  = $row['sprovincia_codigo'];
                    $output["sprovincia_descripcion"]  = $row['sprovincia_descripcion'];
                    $output["sdistrito_codigo"]  = $row['sdistrito_codigo'];
                    $output["sdistrito_descripcion"]  = $row['sdistrito_descripcion'];

                }
                echo json_encode($output);
            }      
        break;

        case 'ctrl_apr_web_destinatario_obtener_registro':
            $datos=$servicio->mdl_apr_web_destinatario_obtener_registro($_POST["pscodigo_aleatorio"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["sdestinatario_razon_social"]  = $row['sdestinatario_razon_social'];
                    $output["sdestinatario_direccion"]  = $row['sdestinatario_direccion'];
                    $output["sdepartamento_codigo"]  = $row['sdepartamento_codigo'];
                    $output["sdepartamento_descripcion"]  = $row['sdepartamento_descripcion'];
                    $output["sprovincia_codigo"]  = $row['sprovincia_codigo'];
                    $output["sprovincia_descripcion"]  = $row['sprovincia_descripcion'];
                    $output["sdistrito_codigo"]  = $row['sdistrito_codigo'];
                    $output["sdistrito_descripcion"]  = $row['sdistrito_descripcion'];

                }
                echo json_encode($output);
            }      
        break;

        case 'ctrl_apr_web_producto_obtener_registro':
            $datos=$servicio->mdl_apr_web_producto_obtener_registro($_POST["psproducto_codigo"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["sproducto_codigo"]  = $row['sproducto_codigo'];
                    $output["sproducto_descripcion"]  = $row['sproducto_descripcion'];
                    $output["sproducto_abreviatura"]  = $row['sproducto_abreviatura'];
                    $output["sproducto_unidad"]  = $row['sproducto_unidad'];
                    $output["scodigo_aleatorio"]  = $row['scodigo_aleatorio'];
                }
                echo json_encode($output);
            }      
        break;

        case 'ctrl_apr_web_agente_obtener_registro':
            $datos=$servicio->mdl_apr_web_agente_obtener_registro($_POST["psagente_codigo"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["sagente_codigo"]  = $row['sagente_codigo'];
                    $output["sagente_nombre"]  = $row['sagente_nombre'];
                    $output["stipo_servicio_codigo"]  = $row['stipo_servicio_codigo'];
                    $output["sruta_servicio_codigo"]  = $row['sruta_servicio_codigo'];
                    $output["scodigo_aleatorio"]  = $row['scodigo_aleatorio'];
                }
                echo json_encode($output);
            }      
        break;
  
        case 'apr_web_tipo_servicio_select':
            $datos=$servicio->mdl_apr_web_tipo_servicio_select();
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['stipo_servicio_codigo']."'>".ucwords($row['stipo_servicio_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;
        
        case 'apr_web_ruta_servicio_select':
            $datos=$servicio->mdl_apr_web_ruta_servicio_select($_POST["pstipo_servicio_codigo"]);
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['sruta_servicio_codigo']."'>".ucwords($row['sruta_servicio_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;

        case 'ctrl_apr_web_ubigeo_select':
            $datos=$servicio->mdl_apr_web_ubigeo_select($_POST["pstipo_ubigeo_codigo"], $_POST["psubigeo_codigo"]);
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['subigeo_codigo']."'>".ucwords($row['subigeo_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;

        case 'ctrl_apr_web_agente_select':
            $datos=$servicio->mdl_apr_web_agente_select();
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['sagente_codigo']."'>".ucwords($row['sagente_nombre'])."</option>";
                }
                echo $html;      
            }
        break;

        case 'ctrl_apr_web_tipo_servicio_select':
            $datos=$servicio->mdl_apr_web_tipo_servicio_select();
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['stipo_servicio_codigo']."'>".ucwords($row['stipo_servicio_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;

        case 'ctrl_apr_web_ruta_servicio_select':
            $datos=$servicio->mdl_apr_web_ruta_servicio_select($_POST["pstipo_servicio_codigo"]);
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".trim($row['sruta_servicio_codigo'])."'>".ucwords($row['sruta_servicio_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;

        case 'ctrl_apr_web_ruta_servicio_select_2':
            $datos=$servicio->mdl_apr_web_ruta_servicio_select($_POST["pstipo_servicio_codigo"],$_POST["sruta_servicio_codigo"]);
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    if(trim($row['sruta_servicio_codigo'])==$_POST["sruta_servicio_codigo"]){
                        $html.= "<option value='".trim($row['sruta_servicio_codigo'])."' selected>".ucwords($row['sruta_servicio_descripcion'])."</option>";
                    }else{
                        $html.= "<option value='".trim($row['sruta_servicio_codigo'])."'>".ucwords($row['sruta_servicio_descripcion'])."</option>";
                    }
                }
                echo $html;      
            }
        break;

        case 'ctrl_apr_web_proveedor_select':
            $datos=$servicio->mdl_apr_web_proveedor_select();
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['sproveedor_codigo']."'>".ucwords($row['sproveedor_razon_social'])."</option>";
                }
                echo $html;      
            }
        break;

        case 'ctrl_apr_web_tipo_transporte_select':
            $datos=$servicio->mdl_apr_web_tipo_transporte_select();
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['stipo_transporte_codigo']."'>".ucwords($row['stipo_transporte_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;    

        case 'listar_servicio_solicitado':
            $datos=$servicio->APR_servicio_solicitado($_POST["usu_id"],$_POST["tipo"],$_POST["origen"],$_POST["destino"],$_POST["estado"],$_POST["mes"],$_POST["ano"]);
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision"];
                $sub_array[] = $row["sprioridad_abreviatura"];
                $sub_array[] = '<a href="#" onClick="buscarseguimiento(\''.trim($row["stipo_documento_codigo"]).'\',\''.trim($row["sguia_serie"]). '\',\''.trim($row["sguia_correlativo"]).'\');" id="" class="link text-primary"><strong>'.$row["sguia_serie"].'-'.$row["sguia_correlativo"].'</strong></a>';
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["stipo_transporte_descripcion"];
                $data[] = $sub_array;
            }
        
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        case 'ctrl_apr_web_mov_consulta_A01_guia':
            $datos=$servicio->mdl_apr_web_mov_consulta_A01_guia($_POST["pstipo_documento_codigo"],$_POST["psguia_serie"],$_POST["psguia_correlativo"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["stipo_documento_codigo"]  = trim($row['stipo_documento_codigo']);
                    $output["sguia_serie"]  = $row['sguia_serie'];
                    $output["sguia_correlativo"]  = $row['sguia_correlativo'];
                }
                echo json_encode($output);
            }      
        break;

        case 'ctrl_apr_web_mov_consulta_A01_guia_cabecera':
            $datos=$servicio->mdl_apr_web_mov_consulta_A01_guia_cabecera($_POST["pstipo_documento_codigo"],$_POST["psguia_serie"],$_POST["psguia_correlativo"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["sguia_hoja_ruta"]  = $row['sguia_hoja_ruta'];
                    $output["sguia_fecha_emision_texto"]  = $row['sguia_fecha_emision_texto'];
                    $output["stipo_servicio_codigo"]  = $row['stipo_servicio_codigo'];
                    $output["sguia_numero_completo"]  = $row['sguia_numero_completo'];
                    $output["sguia_estado_descripcion"]  = $row['sguia_estado_descripcion'];

                    $output["sgrupo_cliente_codigo"]  = $row['sgrupo_cliente_codigo'];
                    $output["sremite_cliente_codigo"]  = $row['sremite_cliente_codigo'];
                    $output["sremite_departamento_codigo"]  = $row['sremite_departamento_codigo'];
                    $output["sremite_provincia_codigo"]  = $row['sremite_provincia_codigo'];
                    $output["sremite_distrito_codigo"]  = $row['sremite_distrito_codigo'];
                    $output["sremite_atencion"]  = $row['sremite_atencion'];

                    $output["sremite_cliente_razon_social"]  = $row['sremite_cliente_razon_social'];
                    $output["sremite_cliente_direccion"]  = $row['sremite_cliente_direccion'];
                    $output["sguia_numero_reporte"]  = $row['sguia_numero_reporte'];
                    $output["stipo_documento_descripcion"]  = $row['stipo_documento_descripcion'];
                    $output["scodigo_aleatorio"]  = $row['scodigo_aleatorio'];

                    $output["sconsigna_empresa_descripcion"]  = $row['sconsigna_empresa_descripcion'];
                    $output["sdestino_empresa_direccion"]  = $row['sdestino_empresa_direccion'];
                    
                    $output["sruta_origen_descripcion"]  = $row['sruta_origen_descripcion'];
                    $output["sruta_destino_descripcion"]  = $row['sruta_destino_descripcion'];
                    $output["sruta_servicio_descripcion"]  = $row['sruta_servicio_descripcion'];

                    $output["sguia_confirma_fecha"]  = $row['sguia_confirma_fecha'];
                    $output["sguia_confirma_persona"]  = $row['sguia_confirma_persona'];
                    $output["sguia_confirma_sello"]  = $row['sguia_confirma_sello'];
                    $output["sguia_confirma_observacion"]  = $row['sguia_confirma_observacion'];
                }
                echo json_encode($output);
            }                  
        break;
        
        case 'ctrl_apr_web_mov_consulta_A01_guia_incidencia':
            $datos=$servicio->mdl_apr_web_mov_consulta_A01_guia_incidencia($_POST["pstipo_documento_codigo"],$_POST["psguia_serie"],$_POST["psguia_correlativo"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    ?>
                        <tr>
                            <td class="text-left"><?php echo $row['stipo_incidencia_descripcion'];?></td>
                            <td class="text-left"><?php echo $row['sguia_incidencia_fecha_texto'];?></td>
                            <td class="text-center"><?php echo $row['dguia_incidencia_hora_texto'];?></td>
                            <td class="text-left"><?php echo $row['sguia_incidencia_observacion'];?></td>
                        </tr>
                    <?php
                }
            }
        break;

        case 'ctrl_apr_web_mov_consulta_A01_guia_documento':
            $datos=$servicio->mdl_apr_web_mov_consulta_A01_guia_documento(
                $_POST["pstipo_documento_codigo"],
                $_POST["psguia_serie"],
                $_POST["psguia_correlativo"]
            );
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    ?>
                        <tr>
                            <td class="text-left"><?php echo $row['stipo_documento_descripcion'];?></td>
                            <td class="text-left"><?php echo $row['scliente_documento_numero'];?></td>
                            <td class="text-left"><?php echo $row['soficina_fecha_retorno_texto'];?></td>
                            <td class="text-left"><?php echo $row['scliente_fecha_entrega_texto'];?></td>
                            <td class="text-left"><?php echo $row['scliente_persona'];?></td>
                            <?php
                                if (empty($row['sguia_documento_ruta_web'])){
                                    ?>
                                        <td class="text-right">
                                            <a target="_blank" href="javascript()"></i></a>
                                        </td>
                                    <?php
                                }
                                else{
                                    ?>
                                        <td class="text-right">
                                            <a target="_blank" href="http://appintranet.fcltransport.pe/<?php echo $row['sguia_documento_ruta_web'];?>"></a>
                                        </td>
                                    <?php
                                }
                            ?>
                        </tr>
                    <?php
                }
            }
        break;

        case 'ctl_apr_web_usuario_actualizar_clave':
            $datos=$servicio->mdl_apr_web_usuario_actualizar_clave($_POST["correo"],$_POST["clave"]);
        break;

/*******************************************************************************/
/* INICIO --> PANTALLA DE INICIO ALDO */

        case 'ctrl_dashboard_resumen_01':
            $datos=$servicio->mdl_dashboard_resumen_01($_POST["psguia_fecha_recepcion_mes"],$_POST["psguia_fecha_recepcion_annio"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["nnumero_documentos"]  = $row['nnumero_documentos'];
                    $output["nnumero_transito"]  = $row['nnumero_transito'];
                    $output["nnumero_confirmados"]  = $row['nnumero_confirmados'];
                    $output["nnumero_retornados"]  = $row['nnumero_retornados'];
                }
                echo json_encode($output);
            }
        break;

        case "ctrl_dashboard_distribucion_documentos":
            $datos = $servicio->mdl_dashboard_distribucion_documentos($_POST["psguia_fecha_recepcion_mes"],$_POST["psguia_fecha_recepcion_annio"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["nnumero_documentos"];
                $sub_array[] = $row["nnumero_transito"];
                $sub_array[] = $row["nnumero_confirmados"];
                $sub_array[] = $row["nnumero_retornados"];
                $sub_array[] = $row["nnumero_facturados"];
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;        


/*******************************************************************************/
/* MOVIMIENTO --> REGISTRO DE DOCUMENTOS ALDO */

        case "registro_vista":
            $datos = $servicio->apr_web_mov_registro_vista();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_vencimiento_texto"];
                $sub_array[] = $row["sguia_numero_reporte"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn btn-outline-danger btn-icon btn-circle" onClick="eliminar(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash"></i></button>';
                
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "registro_vista_01":
            $datos = $servicio->apr_web_mov_registro_vista_01($_POST["pstipo_documento_codigo"],$_POST["psguia_serie"],$_POST["psguia_correlativo"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_vencimiento_texto"];
                $sub_array[] = $row["sguia_numero_reporte"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-danger btn-icon btn-circle" onClick="eliminar(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash"></i></button>';

                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "registro_vista_02":
            $datos = $servicio->apr_web_mov_registro_vista_02($_POST["pstipo_servicio_codigo"],$_POST["psruta_servicio_destino_codigo"],$_POST["psgrupo_cliente_codigo"],$_POST["psfecha_recepcion_inicial"],$_POST["psfecha_recepcion_final"],$_POST["psguia_hoja_ruta"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_vencimiento_texto"];
                $sub_array[] = $row["sguia_numero_reporte"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-danger btn-icon btn-circle" onClick="eliminar(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

/*******************************************************************************/
/* MOVIMIENTO --> CONFIRMACION DE DOCUMENTOS ALDO */

        case "confirma_vista":
            $datos = $servicio->apr_web_mov_confirma_vista();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_vencimiento_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_confirma(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Confirmar"><i class="fa fa-check"></i></button>';
                
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "confirma_vista_01":
            $datos = $servicio->apr_web_mov_confirma_vista_01($_POST["pstipo_documento_codigo"],$_POST["psguia_serie"],$_POST["psguia_correlativo"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_vencimiento_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_confirma(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Confirmar"><i class="fa fa-check"></i></button>';
                                

                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "confirma_vista_02":
            $datos = $servicio->apr_web_mov_confirma_vista_02($_POST["pstipo_servicio_codigo"],$_POST["psruta_servicio_destino_codigo"],$_POST["psgrupo_cliente_codigo"],$_POST["psfecha_recepcion_inicial"],$_POST["psfecha_recepcion_final"],$_POST["psguia_estado"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_vencimiento_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_confirma(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Confirmar"><i class="fa fa-check"></i></button>';
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "confirma_vista_03":
            $datos = $servicio->apr_web_mov_confirma_vista_03(
                $_POST["pstipo_documento_codigo"],
                $_POST["psdocumento_numero"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_vencimiento_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_confirma(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Confirmar"><i class="fa fa-check"></i></button>';

                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case 'ctrl_apr_web_mov_confirma_resumen':
            $datos=$servicio->mdl_apr_web_mov_confirma_resumen();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["ntotal_transito"]  = $row['ntotal_transito'];
                    $output["nurgente_transito"]  = $row['nurgente_transito'];
                    $output["nlicitacion_transito"]  = $row['nlicitacion_transito'];
                    $output["ntotal_vencidos"]  = $row['ntotal_vencidos'];
                }
                echo json_encode($output);
            }                  
        break;

        case "ctrl_apr_web_mov_confirma_resumen_01":
            $datos = $servicio->mdl_apr_web_mov_confirma_resumen_01();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_vencimiento_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_confirma(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Confirmar"><i class="fa fa-check"></i></button>';
                
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;
        
        case "ctrl_apr_web_mov_confirma_resumen_02":
            $datos = $servicio->mdl_apr_web_mov_confirma_resumen_02();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_vencimiento_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_confirma(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Confirmar"><i class="fa fa-check"></i></button>';
                
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "ctrl_apr_web_mov_confirma_resumen_03":
            $datos = $servicio->mdl_apr_web_mov_confirma_resumen_03();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_vencimiento_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_confirma(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Confirmar"><i class="fa fa-check"></i></button>';
                
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "ctrl_apr_web_mov_confirma_resumen_04":
            $datos = $servicio->mdl_apr_web_mov_confirma_resumen_04();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_vencimiento_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_confirma(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Confirmar"><i class="fa fa-check"></i></button>';
                
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "ctrl_apr_web_mov_confirma_resumen_05":
            $datos = $servicio->mdl_apr_web_mov_confirma_resumen_05();
            
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["nnumero_transito"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="lstconfirma_resumen_05_vista(/'.$row["stipo_servicio_codigo"].'/,/'.$row["sruta_origen_codigo"].'/,/'.$row["sruta_destino_codigo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>';
                $data[] = $sub_array;
            }

            
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "ctrl_apr_web_mov_confirma_resumen_05_vista":
            $datos = $servicio->mdl_apr_web_mov_confirma_resumen_05_vista($_POST["pstipo_servicio_codigo"],$_POST["psruta_origen_codigo"],$_POST["psruta_destino_codigo"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_vencimiento_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_confirma(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Confirmar"><i class="fa fa-check"></i></button>';
               
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;        

        case "ctrl_apr_web_mov_confirma_resumen_06":
            $datos = $servicio->mdl_apr_web_mov_confirma_resumen_06();
            
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["nnumero_transito"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="lstconfirma_resumen_06_vista(/'.$row["stipo_servicio_codigo"].'/,/'.$row["sruta_origen_codigo"].'/,/'.$row["sruta_destino_codigo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>';
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "ctrl_apr_web_mov_confirma_resumen_06_vista":
            $datos = $servicio->mdl_apr_web_mov_confirma_resumen_06_vista($_POST["pstipo_servicio_codigo"],$_POST["psruta_origen_codigo"],$_POST["psruta_destino_codigo"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_vencimiento_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_confirma(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Confirmar"><i class="fa fa-check"></i></button>';
                
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;    



/*******************************************************************************/
/* MOVIMIENTO --> RETORNO DE DOCUMENTOS */

        case "retorno_vista":
            $datos = $servicio->apr_web_mov_retorno_vista();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_retorno_limite_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_retorno(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Retornar"><i class="fa fa-check"></i></button>';
                
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "retorno_vista_01":
            $datos = $servicio->apr_web_mov_retorno_vista_01($_POST["pstipo_documento_codigo"],$_POST["psguia_serie"],$_POST["psguia_correlativo"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_retorno_limite_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_retorno(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Retornar"><i class="fa fa-check"></i></button>';

                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "retorno_vista_02":
            $datos = $servicio->apr_web_mov_retorno_vista_02($_POST["pstipo_servicio_codigo"],$_POST["psruta_servicio_destino_codigo"],$_POST["psgrupo_cliente_codigo"],$_POST["psfecha_recepcion_inicial"],$_POST["psfecha_recepcion_final"],$_POST["psguia_estado"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_retorno_limite_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_retorno(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Retornar"><i class="fa fa-check"></i></button>';
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "retorno_vista_03":
            $datos = $servicio->apr_web_mov_retorno_vista_03(
                $_POST["pstipo_documento_codigo"],
                $_POST["psdocumento_numero"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_retorno_limite_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_retorno(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Retornar"><i class="fa fa-check"></i></button>';

                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case 'ctrl_apr_web_mov_retorno_resumen':
            $datos=$servicio->mdl_apr_web_mov_retorno_resumen();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["ntotal_confirmados"]  = $row['ntotal_confirmados'];
                    $output["nurgente_confirmados"]  = $row['nurgente_confirmados'];
                    $output["nlicitacion_confirmados"]  = $row['nlicitacion_confirmados'];
                    $output["ntotal_vencidos"]  = $row['ntotal_vencidos'];
                }
                echo json_encode($output);
            }                  
        break;

        case "ctrl_apr_web_mov_retorno_resumen_01":
            $datos = $servicio->mdl_apr_web_mov_retorno_resumen_01();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_retorno_limite_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_retorno(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Retornar"><i class="fa fa-check"></i></button>';
               
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;
        
        case "ctrl_apr_web_mov_retorno_resumen_02":
            $datos = $servicio->mdl_apr_web_mov_retorno_resumen_02();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_retorno_limite_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_retorno(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Retornar"><i class="fa fa-check"></i></button>';
                
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "ctrl_apr_web_mov_retorno_resumen_03":
            $datos = $servicio->mdl_apr_web_mov_retorno_resumen_03();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_retorno_limite_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_retorno(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Retornar"><i class="fa fa-check"></i></button>';
                
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "ctrl_apr_web_mov_retorno_resumen_04":
            $datos = $servicio->mdl_apr_web_mov_retorno_resumen_04();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_retorno_limite_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_retorno(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Retornar"><i class="fa fa-check"></i></button>';
                
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "ctrl_apr_web_mov_retorno_resumen_05":
            $datos = $servicio->mdl_apr_web_mov_retorno_resumen_05();
            
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["nnumero_confirmaciones"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="lstretorno_resumen_05_vista(/'.$row["stipo_servicio_codigo"].'/,/'.$row["sruta_origen_codigo"].'/,/'.$row["sruta_destino_codigo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>';
                $data[] = $sub_array;
            }

            
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "ctrl_apr_web_mov_retorno_resumen_05_vista":
            $datos = $servicio->mdl_apr_web_mov_retorno_resumen_05_vista($_POST["pstipo_servicio_codigo"],$_POST["psruta_origen_codigo"],$_POST["psruta_destino_codigo"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                /* $sub_array[] = $row["sprioridad_abreviatura"]; */
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                /* $sub_array[] = $row["sgrupo_cliente_codigo"]; */
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = $row["sguia_fecha_retorno_limite_texto"];
                $sub_array[] = $row["nguia_dias_vencidos"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-warning btn-icon btn-circle" onClick="modal_retorno(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/,/'.$row["scodigo_aleatorio"].'/);" id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Retornar"><i class="fa fa-check"></i></button>';
                
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;        
        
/*******************************************************************************/
/* MOVIMIENTO --> CONSULTA COMPLETA DE DOCUMENTOS */

        case "consulta_A01_guia":
            $datos=$servicio->apr_web_mov_consulta_A01_guia($_POST["pstipo_documento_codigo"],$_POST["psguia_serie"],$_POST["psguia_correlativo"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["stipo_documento_codigo"]  = $row['stipo_documento_codigo'];
                    $output["sguia_serie"]  = $row['sguia_serie'];
                    $output["sguia_correlativo"]  = $row['sguia_correlativo'];
                }
                echo json_encode($output);
            }   
        break;

        case "consulta_A01_guia_cabecera":
            $datos=$servicio->apr_web_mov_consulta_A01_guia_cabecera($_POST["pstipo_documento_codigo"],$_POST["psguia_serie"],$_POST["psguia_correlativo"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["sguia_hoja_ruta"]  = $row['sguia_hoja_ruta'];
                    $output["sguia_fecha_emision_texto"]  = $row['sguia_fecha_emision_texto'];
                    $output["sguia_fecha_vencimiento_texto"]  = $row['sguia_fecha_vencimiento_texto'];
                    $output["sguia_fecha_retorno_limite_texto"]  = $row['sguia_fecha_retorno_limite_texto'];
                    $output["sprioridad_descripcion"]  = $row['sprioridad_descripcion'];
                    
                    $output["sgrupo_cliente_codigo"]  = $row['sgrupo_cliente_codigo'];
                    $output["sremite_cliente_codigo"]  = $row['sremite_cliente_codigo'];
                    $output["sremite_departamento_codigo"]  = $row['sremite_departamento_codigo'];
                    $output["sremite_provincia_codigo"]  = $row['sremite_provincia_codigo'];
                    $output["sremite_distrito_codigo"]  = $row['sremite_distrito_codigo'];
                    $output["sremite_atencion"]  = $row['sremite_atencion'];

                    $output["sguia_licitacion"]  = $row['sguia_licitacion'];
                    $output["sguia_exclusivo"]  = $row['sguia_exclusivo'];
                    $output["stipo_servicio_codigo"]  = $row['stipo_servicio_codigo'];
                    $output["sguia_numero_completo"]  = $row['sguia_numero_completo'];

                    $output["sguia_estado_descripcion"]  = $row['sguia_estado_descripcion'];
                    $output["sremite_cliente_razon_social"]  = $row['sremite_cliente_razon_social'];
                    $output["sremite_cliente_codigo"]  = $row['sremite_cliente_codigo'];
                    $output["sremite_cliente_direccion"]  = $row['sremite_cliente_direccion'];
                    $output["sguia_numero_reporte"]  = $row['sguia_numero_reporte'];

                    $output["scodigo_aleatorio"]  = $row['scodigo_aleatorio'];
                    $output["stipo_documento_descripcion"]  = $row['stipo_documento_descripcion'];
                    $output["sconsigna_empresa_descripcion"]  = $row['sconsigna_empresa_descripcion'];
                    $output["sdestino_empresa_direccion"]  = $row['sdestino_empresa_direccion'];

                    $output["sdestino_empresa_direccion"]  = $row['sdestino_empresa_direccion'];
                    $output["sruta_origen_descripcion"]  = $row['sruta_origen_descripcion'];
                    $output["sruta_destino_descripcion"]  = $row['sruta_destino_descripcion'];
                    $output["sruta_servicio_descripcion"]  = $row['sruta_servicio_descripcion'];

                    $output["sguia_confirma_fecha"]  = $row['sguia_confirma_fecha'];
                    $output["sguia_confirma_persona"]  = $row['sguia_confirma_persona'];
                    $output["sguia_confirma_sello"]  = $row['sguia_confirma_sello'];
                    $output["sguia_confirma_observacion"]  = $row['sguia_confirma_observacion'];
                }
                echo json_encode($output);
            }  
        break;

        case "consulta_A01_guia_retorno":
            $datos=$servicio->apr_web_mov_consulta_A01_guia_retorno($_POST["pstipo_documento_codigo"],$_POST["psguia_serie"],$_POST["psguia_correlativo"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    ?>
                        <tr>
                            <td class="text-left" width="10%"><?php echo $row['sguia_retorno_fecha_texto'];?></td>
                            <td class="text-left" width="10%"><?php echo $row['sguia_retorno_hora_texto'];?></td>
                            <td class="text-left" width="30%"><?php echo $row['sguia_numero_reporte'];?></td>
                            <td class="text-left" width="30%"><?php echo $row['sguia_retorno_observacion'];?></td>
                            <td class="text-right" width="5%"><button class="btn btn-danger btn-icon btn-circle" onClick="mretorno_eliminar(/<?php echo $row['scodigo_aleatorio'];?>/);"  id="<?php echo $row['scodigo_aleatorio'];?>" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash"></i></button></td>
                        </tr>
                    <?php
                }
            } 
        break;

        case "consulta_A01_guia_confirmacion":
            $datos=$servicio->apr_web_mov_consulta_A01_guia_confirmacion($_POST["pstipo_documento_codigo"],$_POST["psguia_serie"],$_POST["psguia_correlativo"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    ?>
                        <tr>
                            <td class="text-left" width="10%"><?php echo $row['sguia_confirma_fecha_texto'];?></td>
                            <td class="text-left" width="10%"><?php echo $row['sguia_confirma_hora_texto'];?></td>
                            <td class="text-left" width="30%"><?php echo $row['sguia_confirma_persona'];?></td>
                            <td class="text-left" width="10%"><?php echo $row['sguia_confirma_persona_documento'];?></td>
                            <td class="text-center" width="10%"><?php echo $row['sguia_confirma_veces_visita'];?></td>
                            <td class="text-left" width="30%"><?php echo $row['sguia_confirma_observacion'];?></td>
                            <td class="text-right" width="5%"><button class="btn btn-danger btn-icon btn-circle" onClick="mconfirmacion_eliminar(/<?php echo $row['scodigo_aleatorio'];?>/);"  id="<?php echo $row['scodigo_aleatorio'];?>" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash"></i></button></td>
                        </tr>
                    <?php
                }
            } 
        break;

        case 'ctrl_apr_web_mov_consulta_A01_guia_detalle':
            $datos=$servicio->mdl_apr_web_mov_consulta_A01_guia_detalle($_POST["pstipo_documento_codigo"],$_POST["psguia_serie"],$_POST["psguia_correlativo"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    ?>
                        <tr>
                            <td class="text-left"><?php echo $row['sproducto_codigo'];?></td>
                            <td class="text-left"><?php echo $row['sproducto_descripcion'];?></td>
                            <td class="text-center"><?php echo $row['nproducto_cantidad'];?></td>
                            <td class="text-center"><?php echo $row['sproducto_unidad'];?></td>
                            <td class="text-center"><?php echo $row['nproducto_peso'];?> Kg.</td>
                            <td class="text-center"><?php echo $row['nproducto_costo'];?></td>
                        </tr>
                    <?php
                }
            }
        break;

        case "consulta_A01_guia_detalle":
            $datos=$servicio->apr_web_mov_consulta_A01_guia_detalle($_POST["pstipo_documento_codigo"],$_POST["psguia_serie"],$_POST["psguia_correlativo"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    ?>
                        <tr>
                            <td class="text-left" width="10%"><?php echo $row['sproducto_codigo'];?></td>
                            <td class="text-left" width="40%"><?php echo $row['sproducto_descripcion'];?></td>
                            <td class="text-right" width="10%"><?php echo $row['nproducto_cantidad'];?></td>
                            <td class="text-center" width="10%"><?php echo $row['sproducto_unidad'];?></td>
                            <td class="text-right" width="10%"><?php echo $row['nproducto_peso'];?></td>
                            <td class="text-right" width="10%"><?php echo $row['nproducto_costo'];?></td>
                            <td class="text-right" width="5%"><button class="btn btn-primary btn-icon btn-circle" onClick="editardetalle(/<?php echo $row['scodigo_aleatorio'];?>/);"  id="<?php echo $row['scodigo_aleatorio'];?>" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt fa-fw"></i></button></td>
                            <td class="text-right" width="5%"><button class="btn btn-danger btn-icon btn-circle" onClick="eliminardetalle(/<?php echo $row['scodigo_aleatorio'];?>/);"  id="<?php echo $row['scodigo_aleatorio'];?>" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash"></i></button></td>
                        </tr>
                    <?php
                }
            } 
        break;

        case "consulta_A01_guia_documento":
            $datos=$servicio->apr_web_mov_consulta_A01_guia_documento($_POST["pstipo_documento_codigo"],$_POST["psguia_serie"],$_POST["psguia_correlativo"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    ?>
                        <tr>
                            <td class="text-left" width="5%"><?php echo $row['scliente_tipo_documento_codigo'];?></td>
                            <td class="text-left" width="10%"><?php echo $row['stipo_documento_descripcion'];?></td>
                            <td class="text-left" width="10%"><?php echo $row['scliente_documento_numero'];?></td>
                            <td class="text-left" width="10%"><?php echo $row['soficina_fecha_retorno_texto'];?></td>
                            <td class="text-left" width="10%"><?php echo $row['scliente_fecha_entrega_texto'];?></td>
                            <td class="text-left" width="20%"><?php echo $row['scliente_persona'];?></td>
                            <td class="text-left" width="20%"><a href="../<?php echo $row['sguia_documento_ruta_web'];?>" target="_blank"><?php echo $row['sguia_documento_ruta_web'];?></a></td>
                            <td class="text-right" width="5%"><button class="btn btn-danger btn-icon btn-circle" onClick="eliminardocumento(/<?php echo $row['scodigo_aleatorio'];?>/);"  id="<?php echo $row['scodigo_aleatorio'];?>" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash"></i></button></td>
                            <td class="text-left" width="5%"><button class="btn btn-success btn-icon btn-circle" onClick="documento_subir(/<?php echo $row['scodigo_aleatorio'];?>/);"  id="<?php echo $row['scodigo_aleatorio'];?>" data-toggle="tooltip" title="Subir"><i class="fas fa-cloud-upload-alt"></i></button></td>
                        </tr>
                    <?php
                }
            } 
        break;
 
        case "consulta_A01_guia_incidencia":
            $datos=$servicio->apr_web_mov_consulta_A01_guia_incidencia($_POST["pstipo_documento_codigo"],$_POST["psguia_serie"],$_POST["psguia_correlativo"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    ?>
                        <tr>
                            <td class="text-left" width="15%"><?php echo $row['stipo_incidencia_descripcion'];?></td>
                            <td class="text-left" width="10%"><?php echo $row['sguia_incidencia_fecha_texto'];?></td>
                            <td class="text-left" width="10%"><?php echo $row['sguia_incidencia_hora_texto'];?></td>
                            <td class="text-left" width="50%"><?php echo $row['sguia_incidencia_observacion'];?></td>
                            <td class="text-right" width="5%"><button class="btn btn-danger btn-icon btn-circle" onClick="mincidencia_eliminar(/<?php echo $row['scodigo_aleatorio'];?>/);"  id="<?php echo $row['scodigo_aleatorio'];?>" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash"></i></button></td>
                        </tr>
                    <?php
                }
            } 
        break;

        case "consulta_A01_guia_manifiesto":
            $datos=$servicio->apr_web_mov_consulta_A01_guia_manifiesto($_POST["pstipo_documento_codigo"],$_POST["psguia_serie"],$_POST["psguia_correlativo"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["sagente_codigo"]  = $row['sagente_codigo'];
                    $output["sagente_nombre"]  = $row['sagente_nombre'];
                    $output["stipo_servicio_codigo"]  = trim($row['stipo_servicio_codigo']);
                    $output["stipo_servicio_descripcion"]  = $row['stipo_servicio_descripcion'];

                    $output["sruta_servicio_codigo"]  = trim($row['sruta_servicio_codigo']);
                    $output["sruta_servicio_descripcion"]  = $row['sruta_servicio_descripcion'];
                    $output["smanifiesto_observacion"]  = $row['smanifiesto_observacion'];
                    $output["sproveedor_codigo"]  = $row['sproveedor_codigo'];

                    $output["sproveedor_razon_social"]  = $row['sproveedor_razon_social'];
                    $output["stipo_transporte_codigo"]  = $row['stipo_transporte_codigo'];
                    $output["stipo_transporte_descripcion"]  = $row['stipo_transporte_descripcion'];
                    $output["smanifiesto_fecha_salida_texto"]  = $row['smanifiesto_fecha_salida_texto'];

                    $output["Fecha"]  = date('d/m/Y',strtotime($row['Fecha']));

                    $output["nmanifiesto_dias_transito"]  = $row['nmanifiesto_dias_transito'];
                    $output["smanifiesto_despachador"]  = $row['smanifiesto_despachador'];
                    $output["smanifiesto_proveedor_documento"]  = $row['smanifiesto_proveedor_documento'];
                }
                echo json_encode($output);
            }  
        break;

        case "log_guia_delete":
            $servicio->apr_web_log_guia_delete($_POST["pstipo_documento_codigo"],$_POST["psguia_serie"],$_POST["psguia_correlativo"],$_POST["psauditoria_usuario"]); 
        break;

        case "guia_detalle_delete":
            $servicio->log_guia_detalle_delete($_POST["pscodigo_aleatorio"],$_POST["psauditoria_usuario"]); 
        break;

        case "guia_documentos_cliente_delete":
            $servicio->log_guia_documentos_cliente_delete($_POST["pscodigo_aleatorio"],$_POST["psauditoria_usuario"]); 
        break;

        case "ctrl_apr_web_log_guia_incidencia_delete":
            $servicio->mdl_apr_web_log_guia_incidencia_delete($_POST["pscodigo_aleatorio"],$_POST["psauditoria_usuario"]); 
        break;
        

        case "guia_detalle_insert":
            $servicio->log_guia_detalle_insert(
                $_POST["pstipo_documento_codigo"],
                $_POST["psguia_serie"],
                $_POST["psguia_correlativo"],
                $_POST["psguia_detalle_numero_item"],
                $_POST["psproducto_codigo"],
                $_POST["psproducto_descripcion"],
                $_POST["pnproducto_cantidad"],
                $_POST["pnproducto_peso"],
                $_POST["pnproducto_costo"],
                $_POST["scodigo_aleatorio"],
                $_POST["pssuperior_aleatorio"],
                $_POST["psauditoria_usuario"]
            ); 
        break;

        case "guia_documento_insert":
            $servicio->guia_documentos_cliente_insert(
                $_POST["pscliente_codigo"],
                $_POST["psguia_tipo_documento_codigo"],
                $_POST["psguia_serie"],
                $_POST["psguia_correlativo"],
                $_POST["pscliente_tipo_documento_codigo"],
                $_POST["pscliente_guia_numero"],
                $_POST["psguia_documento_ruta_local"],
                $_POST["psguia_documento_ruta_web"],
                $_POST["pscodigo_aleatorio"],
                $_POST["pssuperior_aleatorio"],
                $_POST["psauditoria_usuario"]
            ); 
        break;

        case "manifiesto_prov_update":
            $servicio->guia_manifiesto_prov_update(
                $_POST["pstipo_documento_codigo"],
                $_POST["psguia_serie"],
                $_POST["psguia_correlativo"],
                $_POST["psproveedor_codigo"],
                $_POST["pstipo_transporte_codigo"],
                $_POST["psmanifiesto_fecha_salida"],
                $_POST["pnmanifiesto_dias_transito"],
                $_POST["psmanifiesto_despachador"],
                $_POST["psmanifiesto_proveedor_documento"],
                $_POST["psauditoria_usuario"]
            ); 
        break;

        case "manifiesto_rpte_update":
            $servicio->guia_manifiesto_rpte_update(
                $_POST["pstipo_documento_codigo"],
                $_POST["psguia_serie"],
                $_POST["psguia_correlativo"],
                $_POST["psagente_codigo"]
            ); 
        break;

        case 'guia_insert_buffer':
            $datos=$servicio->apr_web_log_guia_insert_buffer();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["scodigo_aleatorio"]  = $row['scodigo_aleatorio'];
                }
                echo json_encode($output);
            }
        break;

        case 'manifiesto_insert_buffer':
            $datos=$servicio->apr_web_log_guia_manifiesto_insert_buffer($_POST["pssuperior_aleatorio"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["scodigo_aleatorio"]  = $row['scodigo_aleatorio'];
                }
                echo json_encode($output);
            }
        break;

        case "guia_detalle_insert_buffer":
            $datos=$servicio->apr_web_log_guia_detalle_insert_buffer(
                $_POST["pstipo_documento_codigo"],
                $_POST["psguia_serie"],
                $_POST["psguia_correlativo"],
                $_POST["psguia_detalle_numero_item"],
                $_POST["psproducto_codigo"],
                $_POST["psproducto_descripcion"],
                $_POST["pnproducto_cantidad"],
                $_POST["pnproducto_peso"],
                $_POST["pnproducto_costo"],
                $_POST["pscodigo_aleatorio"],
                $_POST["pssuperior_aleatorio"],
                $_POST["psauditoria_usuario"]
            );
            echo json_encode($datos);
        break;
        
        case "guia_documentos_cliente_insert_buffer":
            $datos = $servicio->apr_web_log_guia_documentos_cliente_insert_buffer(
                $_POST["psremite_cliente_codigo"],
                $_POST["psguia_tipo_documento_codigo"],
                $_POST["psguia_serie"],
                $_POST["psguia_correlativo"],
                $_POST["pscliente_tipo_documento_codigo"],
                $_POST["pscliente_guia_numero"],
                $_POST["psguia_documento_ruta_local"],
                $_POST["psguia_documento_ruta_web"],
                $_POST["pscodigo_aleatorio"],
                $_POST["pssuperior_aleatorio"],
                $_POST["psauditoria_usuario"]
            ); 

            echo json_encode($datos);

        break;

        case "guia_detalle_delete_buffer":
            $servicio->apr_web_log_guia_detalle_delete_buffer($_POST["pscodigo_aleatorio"],$_POST["psauditoria_usuario"]); 
        break;

        case "guia_documentos_cliente_delete_buffer":
            $servicio->apr_web_log_guia_documentos_cliente_delete_buffer($_POST["pscodigo_aleatorio"],$_POST["psauditoria_usuario"]); 
        break;

        case "guia_detalle_select_buffer":
            $datos = $servicio->apr_web_log_guia_detalle_select_buffer($_POST["pscodigo_aleatorio"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sproducto_descripcion"];
                $sub_array[] = $row["nproducto_cantidad"];
                $sub_array[] = $row["nproducto_peso"];
                $sub_array[] = $row["nproducto_costo"];
                $sub_array[] = $row["sproducto_unidad"];
                $sub_array[] = '<button class="btn btn-danger btn-icon btn-circle" onClick="eliminardetalle(/'.$row["scodigo_aleatorio"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "guia_documentos_cliente_select_buffer":
            $datos = $servicio->apr_web_log_guia_documentos_cliente_select_buffer($_POST["pscodigo_aleatorio"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["stipo_documento_descripcion"];
                $sub_array[] = $row["scliente_documento_numero"];
                $sub_array[] = '<button class="btn btn-danger btn-icon btn-circle" onClick="eliminardocumento(/'.$row["scodigo_aleatorio"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;
        
        /* igual para grabar confirmacion */
        case "guia_manifiesto_update_buffer":
            $datos= $servicio->apr_web_log_guia_manifiesto_update_buffer(
                $_POST["pstipo_documento_codigo"],
                $_POST["psguia_serie"],
                $_POST["psguia_correlativo"],
                $_POST["psagente_codigo"],
                $_POST["pstipo_servicio_codigo"],
                $_POST["psruta_servicio_codigo"],
                $_POST["psproveedor_codigo"],
                $_POST["pstipo_transporte_codigo"],
                $_POST["pdmanifiesto_fecha_salida"],
                $_POST["pnmanifiesto_dias_transito"],
                $_POST["psmanifiesto_despachador"],
                $_POST["psmanifiesto_proveedor_documento"],
                $_POST["pscodigo_aleatorio"],
                $_POST["pssuperior_aleatorio"],
                $_POST["psauditoria_usuario"]
            ); 

            echo json_encode($datos);
        break;

        case "guia_update_buffer":
            $datos = $servicio->apr_web_log_guia_update_buffer(
                $_POST["pstipo_documento_codigo"],
                $_POST["psguia_serie"],
                $_POST["psguia_correlativo"],
                $_POST["psguia_hoja_ruta"],
                $_POST["pdguia_fecha_recepcion"],
                $_POST["pdguia_fecha_vencimiento"],
                $_POST["pdguia_fecha_retorno_limite"],
                $_POST["psgrupo_cliente_codigo"],
                $_POST["psremite_cliente_codigo"],
                $_POST["psremite_cliente_direccion"],
                $_POST["psremite_distrito_codigo"],
                $_POST["psremite_provincia_codigo"],
                $_POST["psremite_departamento_codigo"],
                $_POST["psremite_atencion"],
                $_POST["psdestino_empresa_razon_social"],
                $_POST["psdestino_empresa_direccion"],
                $_POST["psdestino_distrito_codigo"],
                $_POST["psdestino_provincia_codigo"],
                $_POST["psdestino_departamento_codigo"],
                $_POST["psdestino_atencion"],
                $_POST["psdestino_almacen_descripcion"],
                $_POST["psprioridad_codigo"],
                $_POST["psguia_licitacion"],
                $_POST["psguia_exclusivo"],
                $_POST["psguia_observacion"],
                $_POST["pscodigo_aleatorio"],
                $_POST["pssession_id"],
                $_POST["psauditoria_usuario"]
            ); 

			foreach ($datos as $row) {
                $output["ssql_mensaje"] = $row["ssql_mensaje"];
                $output["ssql_mensaje_usuario"] = $row["ssql_mensaje_usuario"];
			}
			echo json_encode($output);

        break;

        case "ctrl_apr_web_log_guia_retorno_insert":
            $datos= $servicio->mdl_apr_web_log_guia_retorno_insert(
                                $_POST["pstipo_documento_codigo"],
                                $_POST["psguia_serie"],
                                $_POST["psguia_correlativo"],
                                $_POST["psguia_retorno_fecha"],
                                $_POST["psguia_numero_reporte"],
                                $_POST["psguia_retorno_observacion"],
                                $_POST["pscodigo_aleatorio"],
                                $_POST["pssuperior_aleatorio"],
                                $_POST["psauditoria_usuario"]
            ); 
            echo json_encode($datos);
        break;

        case "ctrl_apr_web_log_guia_confirma_insert":
            $datos= $servicio->mdl_apr_web_log_guia_confirma_insert(
                                $_POST["pstipo_documento_codigo"],
                                $_POST["psguia_serie"],
                                $_POST["psguia_correlativo"],
                                $_POST["psguia_confirma_persona"],
                                $_POST["psguia_confirma_persona_documento"],
                                $_POST["psguia_confirma_fecha"],
                                $_POST["psguia_confirma_veces_visita"],
                                $_POST["psguia_confirma_estado"],
                                $_POST["psguia_confirma_observacion"],
                                $_POST["pscodigo_aleatorio"],
                                $_POST["pssuperior_aleatorio"],
                                $_POST["psauditoria_usuario"]
            ); 
            echo json_encode($datos);
        break;

        case "ctrl_apr_web_log_guia_retorno_delete":
            $servicio->mdl_apr_web_log_guia_retorno_delete(
                $_POST["pscodigo_aleatorio"],
                $_POST["psauditoria_usuario"]
            ); 
        break;

        case "ctrl_apr_web_log_guia_confirma_delete":
            $servicio->mdl_apr_web_log_guia_confirma_delete(
                $_POST["pscodigo_aleatorio"],
                $_POST["psauditoria_usuario"]
            ); 
        break;

        case "ctrl_apr_web_log_guia_incidencia_insert":
            $datos= $servicio->mdl_apr_web_log_guia_incidencia_insert(
                                $_POST["pstipo_documento_codigo"],
                                $_POST["psguia_serie"],
                                $_POST["psguia_correlativo"],
                                $_POST["psguia_incidencia_fecha"],
                                $_POST["psguia_incidencia_tipo"],
                                $_POST["psguia_incidencia_observacion"],
                                $_POST["pscodigo_aleatorio"],
                                $_POST["pssuperior_aleatorio"],
                                $_POST["psauditoria_usuario"]
            ); 
            echo json_encode($datos);
        break;
        
        case "ctrl_apr_web_log_guia_incidencia_delete":
            $servicio->mdl_apr_web_log_guia_incidencia_delete(
                $_POST["pscodigo_aleatorio"],
                $_POST["psauditoria_usuario"]
            ); 
        break;
        
        case 'prioridad_select':
            $datos=$servicio->apr_web_prioridad_select();
            if(is_array($datos)==true and count($datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['sprioridad_codigo']."'>".ucwords($row['sprioridad_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;   


        case "ctrl_apr_web_mov_consulta_vista_01":
            $datos = $servicio->mdl_apr_web_mov_consulta_vista_01(
                                $_POST["pstipo_documento_codigo"],
                                $_POST["psguia_serie"],
                                $_POST["psguia_correlativo"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                $sub_array[] = $row["sprioridad_abreviatura"];
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                $sub_array[] = $row["sgrupo_cliente_codigo"];
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>';
                
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;


        case "ctrl_apr_web_mov_consulta_vista_02":
            $datos = $servicio->mdl_apr_web_mov_consulta_vista_02($_POST["pstipo_servicio_codigo"],$_POST["psruta_servicio_destino_codigo"],$_POST["psgrupo_cliente_codigo"],$_POST["psfecha_recepcion_inicial"],$_POST["psfecha_recepcion_final"],$_POST["psguia_estado"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                $sub_array[] = $row["sprioridad_abreviatura"];
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                $sub_array[] = $row["sgrupo_cliente_codigo"];
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>';
                                

                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

        case "ctrl_apr_web_mov_consulta_vista_03":
            $datos = $servicio->mdl_apr_web_mov_consulta_vista_03(
                $_POST["pstipo_documento_codigo"],
                $_POST["psdocumento_numero"]
            );
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                $sub_array[] = $row["sprioridad_abreviatura"];
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                $sub_array[] = $row["sgrupo_cliente_codigo"];
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["sguia_fecha_emision_texto"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/'.$row["stipo_documento_codigo"].'/,/'.$row["sguia_serie"].'/,/'.$row["sguia_correlativo"].'/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>';
                                
                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);
        break;

 
    }
?>
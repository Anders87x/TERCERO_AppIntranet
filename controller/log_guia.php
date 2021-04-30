<?php
    require_once("../config/conexion.php");
    require_once("../models/log_guia.php");
    $servicio = new svrlog_guia();
    $objservicio = new svrlog_guia();

    switch($_GET["op"]){

        case 'ctrl_editar_remitente':
			$objservicio->mdl_editar_remitente(
				$_POST["psgrupo_cliente_codigo_editar"],
				$_POST["psremite_cliente_codigo_editar"],
				$_POST["psremite_cliente_direccion_editar"],
				$_POST["psremite_departamento_codigo_editar"],
                $_POST["psremite_provincia_codigo_editar"],
                $_POST["psremite_distrito_codigo_editar"],
                $_POST["psremite_atencion_editar"],
				$_POST["pscodigo_aleatorio"],
				$_POST["psauditoria_usuario"]
			);
			break;

        case 'ctrl_editar_destinatario':
			$objservicio->mdl_editar_destinatario(
				$_POST["psdestino_empresa_razon_social_editar"],
				$_POST["psdestino_empresa_direccion_editar"],
				$_POST["psdestino_departamento_codigo_editar"],
				$_POST["psdestino_provincia_codigo_editar"],
                $_POST["psdestino_distrito_codigo_editar"],
                $_POST["psdestino_atencion_editar"],
				$_POST["pscodigo_aleatorio"],
				$_POST["psauditoria_usuario"]
			);
			break;

        case 'ctrl_editar_datos_basicos':
			$objservicio->mdl_editar_datos_basicos(
				$_POST["psguia_hoja_ruta_editar"],
				$_POST["pdguia_fecha_recepcion_editar"],
				$_POST["pdguia_fecha_vencimiento_editar"],
				$_POST["pdguia_fecha_retorno_limite_editar"],
                $_POST["psprioridad_codigo_editar"],
                $_POST["psguia_licitacion_editar"],
                $_POST["psguia_exclusivo_editar"],
				$_POST["pscodigo_aleatorio"],
				$_POST["psauditoria_usuario"]
			);
			break;

            case 'ctrl_obtener_registro':
            $datos = $servicio->mdl_obtener_registro($_POST["pscodigo_aleatorio"]);

            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["stipo_documento_codigo"]  = $row['stipo_documento_codigo'];
                    $output["sguia_serie"]  = $row['sguia_serie'];
                    $output["sguia_correlativo"]  = $row['sguia_correlativo'];
                    $output["sguia_numero_pedido"]  = $row['sguia_numero_pedido'];
                    $output["sguia_hoja_ruta"]  = $row['sguia_hoja_ruta'];
                    $output["satencion_codigo"]  = $row['satencion_codigo'];
                    $output["dguia_fecha_recepcion"]  = $row['dguia_fecha_recepcion'];
                    $output["dguia_fecha_vencimiento"]  = $row['dguia_fecha_vencimiento'];
                    $output["dguia_fecha_retorno_limite"]  = $row['dguia_fecha_retorno_limite'];
                    $output["dguia_fecha_recepcion_texto"]  = $row['dguia_fecha_recepcion_texto'];
                    $output["dguia_fecha_vencimiento_texto"]  = $row['dguia_fecha_vencimiento_texto'];
                    $output["dguia_fecha_retorno_limite_texto"]  = $row['dguia_fecha_retorno_limite_texto'];
                    $output["sgrupo_cliente_codigo"]  = $row['sgrupo_cliente_codigo'];
                    $output["sremite_cliente_codigo"]  = $row['sremite_cliente_codigo'];
                    $output["sremite_cliente_direccion"]  = $row['sremite_cliente_direccion'];
                    $output["sremite_distrito_codigo"]  = $row['sremite_distrito_codigo'];
                    $output["sremite_provincia_codigo"]  = $row['sremite_provincia_codigo'];
                    $output["sremite_departamento_codigo"]  = $row['sremite_departamento_codigo'];
                    $output["sremite_atencion"]  = $row['sremite_atencion'];
                    $output["stipo_servicio_codigo"]  = $row['stipo_servicio_codigo'];
                    $output["sdestino_empresa_razon_social"]  = $row['sdestino_empresa_razon_social'];
                    $output["sdestino_empresa_direccion"]  = $row['sdestino_empresa_direccion'];
                    $output["sdestino_distrito_codigo"]  = $row['sdestino_distrito_codigo'];
                    $output["sdestino_provincia_codigo"]  = $row['sdestino_provincia_codigo'];
                    $output["sdestino_departamento_codigo"]  = $row['sdestino_departamento_codigo'];
                    $output["sdestino_atencion"]  = $row['sdestino_atencion'];
                    $output["sdestino_almacen_descripcion"]  = $row['sdestino_almacen_descripcion'];
                    $output["sprioridad_codigo"]  = $row['sprioridad_codigo'];
                    $output["sguia_licitacion"]  = $row['sguia_licitacion'];
                    $output["sguia_exclusivo"]  = $row['sguia_exclusivo'];
                    $output["sguia_observacion"]  = $row['sguia_observacion'];
                    $output["sguia_numero_reporte"]  = $row['sguia_numero_reporte'];
                    $output["sguia_estado"]  = $row['sguia_estado'];
                }
                echo json_encode($output);
            }      
        break;

        case "ctrl_precio_vista_01":
			$obj_datos = $objservicio->mdl_precio_vista_01();
			$crs_data = array();

			foreach ($obj_datos as $row) {
				$sub_array = array();
				$sub_array[] = $row["sprioridad_abreviatura"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["nguia_costo_subtotal"];
                $sub_array[] = $row["nguia_costo_igv"];
                $sub_array[] = $row["nguia_costo_total"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="mgrilla_item_visualizar(/' .$row["scodigo_aleatorio"]. '/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Visualizar"><i class="fa fa-eye"></i></button>'; 
                $sub_array[] = '<button class="btn btn-outline-warning btn-icon btn-circle" onClick="mgrilla_item_precio(/' .$row["scodigo_aleatorio"]. '/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Precio"><i class="far fa-money-bill-alt"></i></button>'; 
                $sub_array[] = '<button class="btn btn-outline-danger btn-icon btn-circle" onClick="mgrilla_item_eliminar(/' .$row["scodigo_aleatorio"]. '/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash"></i></button>'; 

				$crs_data[] = $sub_array;
			}

			$results = array(
				"sEcho" => 1,
				"iTotalRecords" => count($crs_data),
				"iTotalDisplayRecords" => count($crs_data),
				"aaData" => $crs_data
			);
			echo json_encode($results);
        break;
        

        case 'ctrl_panel_cabecera':
            $obj_datos = $objservicio->mdl_panel_cabecera(
                $_POST["pscodigo_aleatorio"]
            );
            if(is_array($obj_datos)==true and count($obj_datos)>0){
                foreach($obj_datos as $row)
                {
                    $output["sremite_cliente_razon_social"]  = $row['sremite_cliente_razon_social'];
                    $output["sremite_cliente_direccion"]  = $row['sremite_cliente_direccion'];
                    $output["sruta_origen_descripcion"]  = $row['sruta_origen_descripcion'];
                    $output["sremite_cliente_codigo"]  = $row['sremite_cliente_codigo'];

                    $output["sconsigna_empresa_descripcion"]  = $row['sconsigna_empresa_descripcion'];
                    $output["sdestino_empresa_direccion"]  = $row['sdestino_empresa_direccion'];
                    $output["sruta_destino_descripcion"]  = $row['sruta_destino_descripcion'];

                    $output["sguia_numero_completo"]  = $row['sguia_numero_completo'];
                    $output["stipo_documento_descripcion"]  = $row['stipo_documento_descripcion'];
                    $output["scodigo_aleatorio"]  = $row['scodigo_aleatorio_signo'];

                    $output["sruta_servicio_descripcion"]  = $row['sruta_servicio_descripcion'];
                    $output["sguia_fecha_emision_texto"]  = $row['sguia_fecha_emision_texto'];
                    $output["sguia_fecha_vencimiento_texto"]  = $row['sguia_fecha_vencimiento_texto'];
                    $output["sguia_fecha_retorno_limite_texto"]  = $row['sguia_fecha_retorno_limite_texto'];
                    $output["sprioridad_descripcion"]  = $row['sprioridad_descripcion'];

                    $output["sguia_licitacion"]  = $row['sguia_licitacion'];
                    $output["sguia_exclusivo"]  = $row['sguia_exclusivo'];
                    $output["sguia_numero_reporte"]  = $row['sguia_numero_reporte'];
                    $output["sguia_estado_descripcion"]  = $row['sguia_estado_descripcion'];

                    $output["sguia_confirma_fecha"]  = $row['sguia_confirma_fecha'];
                    $output["sguia_confirma_persona"]  = $row['sguia_confirma_persona'];
                    $output["sguia_confirma_sello"]  = $row['sguia_confirma_sello'];
                    $output["sguia_confirma_observacion"]  = $row['sguia_confirma_observacion'];

                    $output["stipo_servicio_codigo"]  = $row['stipo_servicio_codigo'];

                }
                echo json_encode($output);
            }                  
        break;

        case 'buscar_duplicado':
            $obj_datos = $objservicio->mdl_buscar_duplicado(
                $_POST["pstipo_documento_codigo"],
                $_POST["psguia_serie"],
                $_POST["psguia_correlativo"]
            );
            
            if(is_array($obj_datos)==true and count($obj_datos)>0)
            {
                foreach($obj_datos as $row)
                {
                    $output["ssql_resultado"]  = $row['ssql_resultado'];
                    $output["ssql_mensaje"]  = $row['ssql_mensaje'];
                    $output["ssql_mensaje_usuario"]  = $row['ssql_mensaje_usuario'];
                    $output["scodigo_aleatorio"]  = $row['scodigo_aleatorio'];
                }
                echo json_encode($output);
            };

        break;

    }

?>
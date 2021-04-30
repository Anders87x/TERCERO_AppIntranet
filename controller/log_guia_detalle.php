<?php
	require_once("../config/conexion.php");
	require_once("../models/log_guia_detalle.php");
	$objservicio = new svrlog_guia_detalle();

	switch($_GET["caso"]){

		case "ctrl_obtener_vista_00":
			$obj_datos = $objservicio->mdl_obtener_vista_00();
			$crs_data = array();

			foreach ($obj_datos as $row) {
				$sub_array = array();
				$sub_array[] = $row["stipo_documento_codigo"];
				$sub_array[] = $row["sguia_serie"];
				$sub_array[] = $row["sguia_correlativo"];
				$sub_array[] = $row["sguia_detalle_numero_item"];
				$sub_array[] = $row["sproducto_codigo"];
				$sub_array[] = $row["sproducto_descripcion"];
				$sub_array[] = $row["nproducto_cantidad"];
				$sub_array[] = $row["nproducto_peso"];
				$sub_array[] = $row["nproducto_costo"];

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

		case "ctrl_agregar":
			$objservicio->mdl_agregar(
				$_POST["pstipo_documento_codigo"],
				$_POST["psguia_serie"],
				$_POST["psguia_correlativo"],
				$_POST["psguia_detalle_numero_item"],
				$_POST["psproducto_codigo"],
				$_POST["psproducto_descripcion"],
				$_POST["pnproducto_cantidad"],
				$_POST["pnproducto_peso"],
				$_POST["pnproducto_costo"],
				$_POST["psauditoria_usuario"]
			);
			break;

		case "ctrl_editar":
			$obj_datos = $objservicio->mdl_editar(
						$_POST["psproducto_codigo"],
						$_POST["psproducto_descripcion"],
						$_POST["pnproducto_cantidad"],
						$_POST["pnproducto_peso"],
						$_POST["pnproducto_costo"],
						$_POST["pscodigo_aleatorio"],
						$_POST["psauditoria_usuario"]
			);
			
			if(is_array($obj_datos)==true and count($obj_datos)>0)
			{
				foreach($obj_datos as $row)
				{
					$output["ssql_resultado"]  = $row['ssql_resultado'];
					$output["ssql_mensaje"]  = $row['ssql_mensaje'];
					$output["scodigo_aleatorio"]  = $row['scodigo_aleatorio'];
				}
				echo json_encode($output);
			};				
			break;
	
		case "ctrl_eliminar":
			$objservicio->mdl_eliminar(
				$_POST["pscodigo_aleatorio"],
				$_POST["psauditoria_usuario"]
			);
			break;

		case "ctrl_buscar":
			$obj_datos = $objservicio->mdl_buscar($_POST["pscodigo_aleatorio"]);

			if(is_array($obj_datos)==true and count($obj_datos)>0){
				foreach($obj_datos as $row)
				{
					$output["stipo_documento_codigo"] = $row["stipo_documento_codigo"];
					$output["sguia_serie"] = $row["sguia_serie"];
					$output["sguia_correlativo"] = $row["sguia_correlativo"];
					$output["sguia_detalle_numero_item"] = $row["sguia_detalle_numero_item"];
					$output["sproducto_codigo"] = $row["sproducto_codigo"];
					$output["sproducto_descripcion"] = $row["sproducto_descripcion"];
					$output["nproducto_cantidad"] = $row["nproducto_cantidad"];
					$output["nproducto_peso"] = $row["nproducto_peso"];
					$output["nproducto_costo"] = $row["nproducto_costo"];
					$output["scodigo_aleatorio"] = $row["scodigo_aleatorio"];
					$output["ssuperior_aleatorio"] = $row["ssuperior_aleatorio"];
					$output["sregistro_estado"] = $row["sregistro_estado"];
					$output["dregistro_fecha"] = $row["dregistro_fecha"];

					$output["sauditoria_usuario"] = $row["sauditoria_usuario"];
					$output["dauditoria_fecha"] = $row["dauditoria_fecha"];
					$output["sauditoria_operacion"] = $row["sauditoria_operacion"];
				}
				echo json_encode($output);
			}
			break;

		case "ctrl_buscar_dependencia":
			$obj_datos = $objservicio->mdl_buscar_dependencia($_POST["pscodigo_aleatorio"]);

			if(is_array($obj_datos)==true and count($obj_datos)>0){	
				foreach($obj_datos as $row)
				{
					$output["nnumero_registros"] = $row["nnumero_registros"];
				}
				echo json_encode($output);
			}
			break;
	}

?>

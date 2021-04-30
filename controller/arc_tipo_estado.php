<?php
	require_once("../config/conexion.php");
	require_once("../models/arc_tipo_estado.php");
	$objservicio = new svrarc_tipo_estado();

	switch($_GET["caso"]){

		case "ctrl_obtener_vista_00":
			$obj_datos = $objservicio->mdl_obtener_vista_00();
			$crs_data = array();

			foreach ($obj_datos as $row) {
				$sub_array = array();
				$sub_array[] = $row["stipo_estado_codigo"];
				$sub_array[] = $row["stipo_estado_descripcion"];
				$sub_array[] = $row["stipo_estado_abreviatura"];

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
				$_POST["pstipo_estado_codigo"],
				$_POST["pstipo_estado_descripcion"],
				$_POST["pstipo_estado_abreviatura"],
				$_POST["psauditoria_usuario"]
			);
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
					$output["stipo_estado_codigo"] = $row["stipo_estado_codigo"];
					$output["stipo_estado_descripcion"] = $row["stipo_estado_descripcion"];
					$output["stipo_estado_abreviatura"] = $row["stipo_estado_abreviatura"];
					$output["sregistro_estado"] = $row["sregistro_estado"];
					$output["scodigo_aleatorio"] = $row["scodigo_aleatorio"];

					$output["sauditoria_usuario"] = $row["sauditoria_usuario"];
					$output["dauditoria_fecha"] = $row["dauditoria_fecha"];
					$output["sauditoria_operacion"] = $row["sauditoria_operacion"];
				}
				echo json_encode($output);
			}
			break;

		case "ctrl_select":
			$obj_datos = $objservicio->mdl_select();
			
			if(is_array($obj_datos)==true and count($obj_datos)>0){
				$html= "<option value=''>SELECCIONE</option>";
				foreach($obj_datos as $row)
				{
					$html.= "<option value='".$row['stipo_estado_codigo']."'>".ucwords($row['stipo_estado_descripcion'])."</option>";
				}
				echo $html;      
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

<?php
	require_once("../config/conexion.php");
	require_once("../models/arc_producto.php");
	$objservicio = new svrarc_producto();

	switch($_GET["caso"]){

		case "ctrl_obtener_vista_00":
			$obj_datos = $objservicio->mdl_obtener_vista_00();
			$crs_data = array();

			foreach ($obj_datos as $row) {
				$sub_array = array();
				$sub_array[] = $row["sproducto_codigo"];
				$sub_array[] = $row["sproducto_descripcion"];
				$sub_array[] = $row["sproducto_abreviatura"];
				$sub_array[] = $row["sproducto_unidad"];
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

		case "ctrl_agregar":
			$objservicio->mdl_agregar(
				$_POST["psproducto_codigo"],
				$_POST["psproducto_descripcion"],
				$_POST["psproducto_abreviatura"],
				$_POST["psproducto_unidad"],
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
					$output["sproducto_codigo"] = $row["sproducto_codigo"];
					$output["sproducto_descripcion"] = $row["sproducto_descripcion"];
					$output["sproducto_abreviatura"] = $row["sproducto_abreviatura"];
					$output["sproducto_unidad"] = $row["sproducto_unidad"];
					$output["sregistro_estado"] = $row["sregistro_estado"];
					$output["scodigo_aleatorio"] = $row["scodigo_aleatorio"];

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

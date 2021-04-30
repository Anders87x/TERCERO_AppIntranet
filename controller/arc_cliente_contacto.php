<?php
	require_once("../config/conexion.php");
	require_once("../models/arc_cliente_contacto.php");
	$objservicio = new svrarc_cliente_contacto();

	switch($_GET["caso"]){

		case "ctrl_obtener_vista_00":
			$obj_datos = $objservicio->mdl_obtener_vista_00();
			$crs_data = array();

			foreach ($obj_datos as $row) {
				$sub_array = array();
				$sub_array[] = $row["scliente_razon_social"];
				$sub_array[] = $row["scliente_contacto_codigo"];
				$sub_array[] = $row["scliente_contacto_nombre"];
				$sub_array[] = $row["sarea_descripcion"];
				$sub_array[] = $row["scliente_contacto_celular_01"];
				$sub_array[] = $row["scliente_contacto_correo_electronico"];
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
				$_POST["pscliente_codigo"],
				$_POST["pscliente_contacto_codigo"],
				$_POST["pscliente_contacto_nombre"],
				$_POST["psarea_descripcion"],
				$_POST["pscargo_descripcion"],
				$_POST["pscontacto_central"],
				$_POST["pscliente_contacto_anexo"],
				$_POST["pscliente_contacto_celular_01"],
				$_POST["pscliente_contacto_celular_02"],
				$_POST["pscliente_contacto_correo_electronico"],
				$_POST["pscliente_contacto_usuario"],
				$_POST["pscliente_contacto_clave"],
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
					$output["scliente_codigo"] = $row["scliente_codigo"];
					$output["scliente_contacto_codigo"] = $row["scliente_contacto_codigo"];
					$output["scliente_contacto_nombre"] = $row["scliente_contacto_nombre"];
					$output["sarea_descripcion"] = $row["sarea_descripcion"];
					$output["scargo_descripcion"] = $row["scargo_descripcion"];
					$output["scontacto_central"] = $row["scontacto_central"];
					$output["scliente_contacto_anexo"] = $row["scliente_contacto_anexo"];
					$output["scliente_contacto_celular_01"] = $row["scliente_contacto_celular_01"];
					$output["scliente_contacto_celular_02"] = $row["scliente_contacto_celular_02"];
					$output["scliente_contacto_correo_electronico"] = $row["scliente_contacto_correo_electronico"];
					$output["scliente_contacto_usuario"] = $row["scliente_contacto_usuario"];
					$output["scliente_contacto_clave"] = $row["scliente_contacto_clave"];
					$output["scodigo_aleatorio"] = $row["scodigo_aleatorio"];
					$output["sregistro_estado"] = $row["sregistro_estado"];
					$output["dregistro_fecha"] = $row["dregistro_fecha"];

					$output["sauditoria_usuario"] = $row["sauditoria_usuario"];
					$output["dauditoria_fecha"] = $row["dauditoria_fecha"];
					$output["sauditoria_operacion"] = $row["sauditoria_operacion"];
				}
				echo json_encode($output);
			}
			break;

		case 'ctrl_select':
				$obj_datos = $objservicio->mdl_select();
				if(is_array($obj_datos)==true and count($obj_datos)>0){
					$html= "<option value=''>SELECCIONE</option>";
					foreach($obj_datos as $row)
					{
						$html.= "<option value='".$row['scliente_contacto_codigo']."'>".ucwords($row['scliente_contacto_nombre'])."</option>";
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

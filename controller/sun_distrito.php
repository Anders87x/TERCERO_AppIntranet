<?php
    require_once("../config/conexion.php");
    require_once("../models/sun_distrito.php");
    $objservicio = new svrsun_distrito();

    switch($_GET["caso"]){

        case 'ctrl_registro_obtener_datos_select':
            $obj_datos = $objservicio->mdl_registro_obtener_datos_select(
                $_POST["psprovincia_codigo"]
            );
            if(is_array($obj_datos)==true and count($obj_datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($obj_datos as $row)
                {
                    $html.= "<option value='".$row['sdistrito_codigo']."'>".ucwords($row['sdistrito_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;

        case "ctrl_select":
            $obj_datos = $objservicio->mdl_select(
                $_POST["psprovincia_codigo"]
            );
            if(is_array($obj_datos)==true and count($obj_datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($obj_datos as $row)
                {
                    $html.= "<option value='".$row['sdistrito_codigo']."'>".ucwords($row['sdistrito_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;
    }
?>



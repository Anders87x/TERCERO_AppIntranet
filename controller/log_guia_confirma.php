<?php
    require_once("../config/conexion.php");
    require_once("../models/log_guia_confirma.php");
    $objservicio = new svrlog_guia_confirma();

    switch($_GET["caso"]){

        case 'ctrl_panel_cabecera':
            $obj_datos = $objservicio->mdl_panel_cabecera(
                $_POST["pscodigo_aleatorio"]
            );
            if(is_array($obj_datos)==true and count($obj_datos)>0){
                foreach($obj_datos as $row)
                {
                    ?>
                        <tr>
                            <td class="text-left" width="10%"><?php echo $row['sguia_confirma_fecha_texto'];?></td>
                            <td class="text-left" width="10%"><?php echo $row['sguia_confirma_hora_texto'];?></td>
                            <td class="text-left" width="30%"><?php echo $row['sguia_confirma_persona'];?></td>
                            <td class="text-left" width="10%"><?php echo $row['sguia_confirma_persona_documento'];?></td>
                            <td class="text-center" width="10%"><?php echo $row['sguia_confirma_veces_visita'];?></td>
                            <td class="text-left" width="10%"><?php echo $row['sguia_confirma_estado_descripcion'];?></td>
                            <td class="text-left" width="30%"><?php echo $row['sguia_confirma_observacion'];?></td>
                        </tr>
                    <?php
                }
            }                  
        break;
        
    }

?>
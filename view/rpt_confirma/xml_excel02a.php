<?php
    require_once("../../config/conexion.php");
    require_once("../../models/rpt_confirma.php");
    $rptconfirma = new svrrpt_confirma();

    $psguia_numero_reporte = $_GET["psguia_numero_reporte"];

    $datos = $rptconfirma->mdl_rpt_confirma_02($psguia_numero_reporte);

    $cadena_xml = "
    <?xml version='1.0' encoding='ISO-8859-1'?>
        <?mso-application progid='Excel.Sheet'?>

        <Workbook xmlns='urn:schemas-microsoft-com:office:spreadsheet' 
            xmlns:o='urn:schemas-microsoft-com:office:office' 
            xmlns:x='urn:schemas-microsoft-com:office:excel' 
            xmlns:ss='urn:schemas-microsoft-com:office:spreadsheet' 
            xmlns:html='http://www.w3.org/TR/REC-html40'>

            <DocumentProperties xmlns='urn:schemas-microsoft-com:office:office'>
                <Author>APROEM-SISTEMAS</Author>
                <LastAuthor>APROEM-SISTEMAS</LastAuthor>
                <Created>2020-11-17T13:29:10Z</Created>
                <LastSaved></LastSaved>
                <Company>Grupo APROEM eirl</Company>
                <Version>12.00</Version>
            </DocumentProperties>

            <OfficeDocumentSettings xmlns='urn:schemas-microsoft-com:office:office'>
                <AllowPNG/>
            </OfficeDocumentSettings>

            <ExcelWorkbook xmlns='urn:schemas-microsoft-com:office:excel'>
                <WindowHeight>7755</WindowHeight>
                <WindowWidth>20490</WindowWidth>
                <WindowTopX>0</WindowTopX>
                <WindowTopY>0</WindowTopY>
                <ProtectStructure>False</ProtectStructure>
                <ProtectWindows>False</ProtectWindows>
            </ExcelWorkbook>

            <Styles>
                <Style ss:ID='_sty_rpt01'>
                    <Alignment ss:Horizontal='Left' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='14' ss:Color='#000000'/>
                </Style>

                <Style ss:ID='_sty_hea01'>
                    <Alignment ss:Horizontal='Center' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='22' ss:Color='#FFFFFF'/>
                    <Interior ss:Color='#1F4E78' ss:Pattern='Solid'/>
                </Style>

                <Style ss:ID='_sty_sub01'>
                    <Alignment ss:Horizontal='Center' ss:Vertical='Center' ss:WrapText='1'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#FFFFFF'/>
                    <Interior ss:Color='#1F4E78' ss:Pattern='Solid'/>
                </Style>

                <Style ss:ID='_sty_texWBR001'>
                    <Alignment ss:Horizontal='Right' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#000000'/>
                </Style>

                <Style ss:ID='_sty_texWBC001'>
                    <Alignment ss:Horizontal='Center' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#000000'/>
                </Style>

                <Style ss:ID='_sty_texWBL001'>
                    <Alignment ss:Horizontal='Left' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#000000'/>
                </Style>

                <Style ss:ID='_sty_texGBR001'>
                    <Alignment ss:Horizontal='Right' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#000000'/>
                    <Interior ss:Color='#A9D08E' ss:Pattern='Solid'/>
                </Style>

                <Style ss:ID='_sty_texGBC001'>
                    <Alignment ss:Horizontal='Center' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#000000'/>
                    <Interior ss:Color='#A9D08E' ss:Pattern='Solid'/>
                </Style>

                <Style ss:ID='_sty_texGBL001'>
                    <Alignment ss:Horizontal='Left' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#000000'/>
                    <Interior ss:Color='#A9D08E' ss:Pattern='Solid'/>
                </Style>

                <Style ss:ID='_sty_texYBR001'>
                    <Alignment ss:Horizontal='Right' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#000000'/>
                    <Interior ss:Color='#FFD966' ss:Pattern='Solid'/>
                </Style>

                <Style ss:ID='_sty_texYBC001'>
                    <Alignment ss:Horizontal='Center' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#000000'/>
                    <Interior ss:Color='#FFD966' ss:Pattern='Solid'/>
                </Style>

                <Style ss:ID='_sty_texYBL001'>
                    <Alignment ss:Horizontal='Left' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#000000'/>
                    <Interior ss:Color='#FFD966' ss:Pattern='Solid'/>
                </Style>

                <Style ss:ID='_sty_texRBR001'>
                    <Alignment ss:Horizontal='Right' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#FFFFFF'/>
                    <Interior ss:Color='#A62A2A' ss:Pattern='Solid'/>
                </Style>

                <Style ss:ID='_sty_texRBC001'>
                    <Alignment ss:Horizontal='Center' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#FFFFFF'/>
                    <Interior ss:Color='#A62A2A' ss:Pattern='Solid'/>
                </Style>

                <Style ss:ID='_sty_texRBL001'>
                    <Alignment ss:Horizontal='Left' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#FFFFFF'/>
                    <Interior ss:Color='#A62A2A' ss:Pattern='Solid'/>
                </Style>

                <Style ss:ID='_sty_heaWBL002'>
                    <Alignment ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='12' ss:Color='#FFFFFF'/>
                    <Interior ss:Color='#1F4E78' ss:Pattern='Solid'/>
                </Style>

                <Style ss:ID='_sty_heaWBL003'>
                    <Alignment ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='14' ss:Color='#FFFFFF'/>
                    <Interior ss:Color='#1F4E78' ss:Pattern='Solid'/>
                </Style>

                <Style ss:ID='_sty_numWBR001'>
                    <Alignment ss:Horizontal='Right' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#000000'/>
                    <Interior/>
                    <NumberFormat ss:Format='#,##0.00;-#,##0.00; ' />
                </Style>

                <Style ss:ID='_sty_numGBR001'>
                    <Alignment ss:Horizontal='Right' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#000000'/>
                    <Interior ss:Color='#A9D08E' ss:Pattern='Solid'/>
                    <NumberFormat ss:Format='#,##0.00;-#,##0.00; ' />
                </Style>

                <Style ss:ID='_sty_numYBR001'>
                    <Alignment ss:Horizontal='Right' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#000000'/>
                    <Interior ss:Color='#FFD966' ss:Pattern='Solid'/>
                    <NumberFormat ss:Format='#,##0.00;-#,##0.00; ' />
                </Style>

                <Style ss:ID='_sty_numRBR001'>
                    <Alignment ss:Horizontal='Right' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#FFFFFF'/>
                    <Interior ss:Color='#A62A2A' ss:Pattern='Solid'/>
                    <NumberFormat ss:Format='#,##0.00;-#,##0.00; ' />
                </Style>

                <Style ss:ID='_sty_squWBR001'>
                    <Alignment ss:Horizontal='Right' ss:Vertical='Center'/>
                    <Borders>
                        <Border ss:Position='Bottom' ss:LineStyle='Continuous' ss:Weight='1'/>
                        <Border ss:Position='Left' ss:LineStyle='Continuous' ss:Weight='1'/>
                        <Border ss:Position='Right' ss:LineStyle='Continuous' ss:Weight='1'/>
                        <Border ss:Position='Top' ss:LineStyle='Continuous' ss:Weight='1'/>
                    </Borders>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#000000'/>
                </Style>

                <Style ss:ID='_sty_squWBC001'>
                    <Alignment ss:Horizontal='Center' ss:Vertical='Center'/>
                    <Borders>
                        <Border ss:Position='Bottom' ss:LineStyle='Continuous' ss:Weight='1'/>
                        <Border ss:Position='Left' ss:LineStyle='Continuous' ss:Weight='1'/>
                        <Border ss:Position='Right' ss:LineStyle='Continuous' ss:Weight='1'/>
                        <Border ss:Position='Top' ss:LineStyle='Continuous' ss:Weight='1'/>
                    </Borders>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#000000'/>
                </Style>

                <Style ss:ID='_sty_squWBL001'>
                    <Alignment ss:Horizontal='Left' ss:Vertical='Center'/>
                    <Borders>
                        <Border ss:Position='Bottom' ss:LineStyle='Continuous' ss:Weight='1'/>
                        <Border ss:Position='Left' ss:LineStyle='Continuous' ss:Weight='1'/>
                        <Border ss:Position='Right' ss:LineStyle='Continuous' ss:Weight='1'/>
                        <Border ss:Position='Top' ss:LineStyle='Continuous' ss:Weight='1'/>
                    </Borders>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#000000'/>
                </Style>

                <Style ss:ID='_fmt_num001' ss:Name='Millares'> 
                    <NumberFormat ss:Format='_ * #,##0.00_ ;_ * \-#,##0.00_ ;_ * &quot;-&quot;??_ ;_ @_ '/>
                </Style>

                <Style ss:ID='_sty_nquWBR001' ss:Parent='_fmt_num001'> 
                    <Alignment ss:Horizontal='Right' ss:Vertical='Center'/>
                    <Borders>
                        <Border ss:Position='Bottom' ss:LineStyle='Continuous' ss:Weight='1'/>
                        <Border ss:Position='Left' ss:LineStyle='Continuous' ss:Weight='1'/>
                        <Border ss:Position='Right' ss:LineStyle='Continuous' ss:Weight='1'/>
                        <Border ss:Position='Top' ss:LineStyle='Continuous' ss:Weight='1'/>
                    </Borders>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='9' ss:Color='#000000'/>
                </Style>

                <Style ss:ID='_sty_texWBC002'>
                    <Alignment ss:Horizontal='Center' ss:Vertical='Center'/>
                    <Font ss:FontName='Segoe UI' x:Family='Swiss' ss:Size='14' ss:Color='#000000'/>
                </Style>

            </Styles>

            <Worksheet ss:Name='Hoja 1'>
                <Names>
                    <NamedRange ss:Name='Print_Titles' ss:RefersTo='=Hoja 1!R1:R4'/>
                </Names>

                <Table x:FullColumns='1' x:FullRows='1' ss:DefaultRowHeight='15'>
                    <Column ss:Index='01' ss:AutoFitWidth='0' ss:Width='70.00'/>
                    <Column ss:Index='02' ss:AutoFitWidth='0' ss:Width='70.00'/>
                    <Column ss:Index='03' ss:AutoFitWidth='0' ss:Width='90.00'/>
                    <Column ss:Index='04' ss:AutoFitWidth='0' ss:Width='70.00'/>
                    <Column ss:Index='05' ss:AutoFitWidth='0' ss:Width='120.00'/>
                    <Column ss:Index='06' ss:AutoFitWidth='0' ss:Width='120.00'/>
                    <Column ss:Index='07' ss:AutoFitWidth='0' ss:Width='200.00'/>
                    <Column ss:Index='08' ss:AutoFitWidth='0' ss:Width='90.00'/>
                    <Column ss:Index='09' ss:AutoFitWidth='0' ss:Width='50.00'/>
                    <Column ss:Index='10' ss:AutoFitWidth='0' ss:Width='150.00'/>
                    <Column ss:Index='11' ss:AutoFitWidth='0' ss:Width='60.00'/>
                    <Column ss:Index='12' ss:AutoFitWidth='0' ss:Width='60.00'/>
                    <Column ss:Index='13' ss:AutoFitWidth='0' ss:Width='120.00'/>
                    <Column ss:Index='14' ss:AutoFitWidth='0' ss:Width='180.00'/>
                    <Column ss:Index='15' ss:AutoFitWidth='0' ss:Width='180.00'/>

                    <Row ss:AutoFitHeight='0' ss:Height='20.00'>
                        <Cell ss:StyleID='_sty_rpt01'><Data ss:Type='String'>REPORTE CONFIRMACIONES DE DOCUMENTOS</Data><NamedCell ss:Name='Print_Titles'/></Cell>
                    </Row>
                    <Row ss:AutoFitHeight='0' ss:Height='15.00'>
                        <Cell ss:StyleID='_sty_texWBL001'><Data ss:Type='String'>Rango de fechas: </Data><NamedCell ss:Name='Print_Titles'/></Cell>
                    </Row>
                    <Row ss:AutoFitHeight='0' ss:Height='15.00'>
                        <Cell ss:StyleID='_sty_texWBL001'><Data ss:Type='String'> </Data><NamedCell ss:Name='Print_Titles'/></Cell>
                    </Row>

                    <Row ss:AutoFitHeight='0' ss:Height='28.00'>
                        <Cell ss:StyleID='_sty_sub01'><Data ss:Type='String'>TIPO</Data></Cell>
                        <Cell ss:StyleID='_sty_sub01'><Data ss:Type='String'>DOCUMENTO</Data></Cell>
                        <Cell ss:StyleID='_sty_sub01'><Data ss:Type='String'>ESTADO</Data></Cell>
                        <Cell ss:StyleID='_sty_sub01'><Data ss:Type='String'>FECHA RECEPCION</Data></Cell>
                        <Cell ss:StyleID='_sty_sub01'><Data ss:Type='String'>ORIGEN</Data></Cell>
                        <Cell ss:StyleID='_sty_sub01'><Data ss:Type='String'>DESTINO</Data></Cell>
                        <Cell ss:StyleID='_sty_sub01'><Data ss:Type='String'>CONSIGNATARIO</Data></Cell>
                        <Cell ss:StyleID='_sty_sub01'><Data ss:Type='String'>DOCUMENTO DEL CLIENTE</Data></Cell>
                        <Cell ss:StyleID='_sty_sub01'><Data ss:Type='String'>UNIDAD</Data></Cell>
                        <Cell ss:StyleID='_sty_sub01'><Data ss:Type='String'>PRODUCTO</Data></Cell>
                        <Cell ss:StyleID='_sty_sub01'><Data ss:Type='String'>CANT.</Data></Cell>
                        <Cell ss:StyleID='_sty_sub01'><Data ss:Type='String'>PESO</Data></Cell>
                        <Cell ss:StyleID='_sty_sub01'><Data ss:Type='String'>FECHA DE ENTREGA</Data></Cell>
                        <Cell ss:StyleID='_sty_sub01'><Data ss:Type='String'>PERSONA DE CONFIRMA</Data></Cell>
                        <Cell ss:StyleID='_sty_sub01'><Data ss:Type='String'>OBSERVACION DE CONFIRMA</Data></Cell>
                    </Row>
                    ";
                    foreach ($datos as $row) {
                    $cadena_xml.="
                    <Row ss:AutoFitHeight='0' ss:Height='15.00'>
                        <Cell ss:StyleID='_sty_squWBL001'><Data ss:Type='String'>".$row['stipo_documento_codigo']."</Data></Cell>
                        <Cell ss:StyleID='_sty_squWBL001'><Data ss:Type='String'>".$row['sguia_numero_completo']."</Data></Cell>
                        <Cell ss:StyleID='_sty_squWBC001'><Data ss:Type='String'>".$row['sguia_estado_descripcion']."</Data></Cell>
                        <Cell ss:StyleID='_sty_squWBC001'><Data ss:Type='String'>".$row['sguia_fecha_recepcion_texto']."</Data></Cell>
                        <Cell ss:StyleID='_sty_squWBL001'><Data ss:Type='String'>".$row['sruta_origen_descripcion']."</Data></Cell>
                        <Cell ss:StyleID='_sty_squWBL001'><Data ss:Type='String'>".$row['sruta_destino_descripcion']."</Data></Cell>
                        <Cell ss:StyleID='_sty_squWBL001'><Data ss:Type='String'>".$row['sdestino_empresa_razon_social']."</Data></Cell>
                        <Cell ss:StyleID='_sty_squWBL001'><Data ss:Type='String'>".$row['scliente_guia_numero_completo']."</Data></Cell>
                        <Cell ss:StyleID='_sty_squWBC001'><Data ss:Type='String'>".$row['sproducto_unidad']."</Data></Cell>
                        <Cell ss:StyleID='_sty_squWBL001'><Data ss:Type='String'>".$row['sproducto_descripcion']."</Data></Cell>
                        <Cell ss:StyleID='_sty_nquWBR001'><Data ss:Type='Number'>".$row['nproducto_cantidad']."</Data></Cell>
                        <Cell ss:StyleID='_sty_nquWBR001'><Data ss:Type='Number'>".$row['nproducto_peso']."</Data></Cell>
                        <Cell ss:StyleID='_sty_squWBC001'><Data ss:Type='String'>".$row['sguia_confirma_fecha_texto']."</Data></Cell>
                        <Cell ss:StyleID='_sty_squWBL001'><Data ss:Type='String'>".$row['sguia_confirma_persona']."</Data></Cell>
                        <Cell ss:StyleID='_sty_squWBL001'><Data ss:Type='String'>".$row['sguia_confirma_observacion']."</Data></Cell>
                    </Row>
                    ";
                    }
                    $cadena_xml.="
                    <Row ss:AutoFitHeight='0' ss:Height='15.00'>
                        <Cell ss:StyleID='_sty_texWBR001'><Data ss:Type='String'></Data></Cell>
                    </Row>
                    <Row ss:AutoFitHeight='0' ss:Height='15.00'>
                        <Cell ss:StyleID='_sty_texWBR001'><Data ss:Type='String'></Data></Cell>
                    </Row>
                    <Row ss:AutoFitHeight='0' ss:Height='15.00'>
                        <Cell ss:StyleID='_sty_texWBR001'><Data ss:Type='String'></Data></Cell>
                    </Row>
                    <Row ss:AutoFitHeight='0' ss:Height='15.00'>
                        <Cell ss:StyleID='_sty_texWBR001'><Data ss:Type='String'></Data></Cell>
                    </Row>
                </Table>

                <WorksheetOptions xmlns='urn:schemas-microsoft-com:office:excel'>
                    <PageSetup>
                        <Layout x:Orientation='Landscape'/>
                        <Header x:Margin='0.50' x:Data='&amp;Z&amp;DPagina: &amp;P/&amp;#&#10;Fecha: &amp;F&#10;Hora: &amp;H'/>
                        <Footer x:Margin='0.50'/>
                        <PageMargins x:Bottom='0.98' x:Left='0.75' x:Right='0.75' x:Top='0.98'/>
                    </PageSetup>

                    <Unsynced/>
                    <FitToPage/>

                    <Print>
                        <FitHeight>0</FitHeight>
                        <ValidPrinterInfo/>
                        <PaperSizeIndex>9</PaperSizeIndex>
                        <Scale>73</Scale>
                        <HorizontalResolution>-3</HorizontalResolution>
                        <VerticalResolution>0</VerticalResolution>
                    </Print>

                    <Zoom>90</Zoom>

                    <ProtectObjects>False</ProtectObjects>
                    <ProtectScenarios>False</ProtectScenarios>
                </WorksheetOptions>

            </Worksheet>

        </Workbook>
    ";
    header('Content-Disposition: attachment; filename="ArchivoXML.xml"');

    echo $cadena_xml;

?>
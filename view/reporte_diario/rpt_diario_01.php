<?php

    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;

    $spreadsheet = new Spreadsheet();

    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Hola')
        ->setCellValue('B2', 'Mundo!')
        ;

    $writer = IOFactory::createWriter($spreadsheet, 'Xls');
    $writer->save('salida.xls');

?>
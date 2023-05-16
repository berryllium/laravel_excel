<?php

namespace App\Actions;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelAction
{
    public function create(array $data)
    {
        $spreadsheet = new Spreadsheet();
        $file = '/tmp/result_' . rand(0, 100000) . '.xlsx';
        $tab = 0;
        foreach ($data as $title => $cells) {
            $sheet = $spreadsheet->getSheet($tab)->setTitle($title);
            foreach ($cells as $cell => $value) {
                $sheet->setCellValue($cell, $value);
            }
            $tab++;
        }
        (new Xlsx($spreadsheet))->save($file);
        return $file;
    }
}

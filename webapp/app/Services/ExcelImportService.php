<?php
namespace App\Services;

use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Applicant;
use Illuminate\Support\Facades\Storage;

class ExcelImportService
{
    public function importApplicants($filePath)
    {
        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true);

        // Skip header row
        foreach (array_slice($rows, 1) as $row) {
             Applicant::create([
                'region'           => $row['B'],
                'province'         => $row['C'],
                'city'             => $row['D'],
                'last_name'        => $row['E'],
                'first_name'       => $row['F'],
                'middle_name'      => $row['G'] ?? null,
                'sex'              => $row['H'],
                'age'              => (int) $row['I'],
                'marital_status'   => $row['J'],
                'course'           => $row['K'] ?? null,
                'position_applied' => $row['L'],
            ]);
        }
    }
}

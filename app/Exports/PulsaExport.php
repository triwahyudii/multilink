<?php

namespace App\Exports;

use App\Models\Pulsa;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PulsaExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pulsa::select('provider', 'nomor_handphone', 'pulsa')->get();
    }

    public function headings(): array
    {
        return ["PROVIDER", "NOMOR HANDPHONE", "NOMINAL"];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A1:C1' => [
                'font' => ['bold' => true],
            ],
        ];
    }
}

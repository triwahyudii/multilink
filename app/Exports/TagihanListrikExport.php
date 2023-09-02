<?php

namespace App\Exports;

use App\Models\TagihanListrik;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TagihanListrikExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TagihanListrik::select('nomor_id', 'created_at')->get();
    }

    public function headings(): array
    {
        return ["ID PELANGGAN", "TANGGAL & WAKTU"];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A1:B1' => [
                'font' => ['bold' => true],
            ],
        ];
    }
}

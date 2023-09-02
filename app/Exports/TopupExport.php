<?php

namespace App\Exports;

use App\Models\Topup;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TopupExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Topup::select('nama', 'nomor_id', 'jumlah', 'created_at')->get();
    }

    public function headings(): array
    {
        return ["GAME", "NOMOR ID", "JUMLAH", "TANGGAL & WAKTU"];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A1:D1' => [
                'font' => ['bold' => true],
            ],
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\BayarCicilan;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BayarCicilanExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BayarCicilan::select('bank', 'nama', 'nomor_tagihan', 'jumlah', 'created_at')->get();
    }

    public function headings(): array
    {
        return ["BANK", "NAMA", "NOMOR TAGIHAN", "JUMLAH", "TANGGAL & WAKTU"];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A1:E1' => [
                'font' => ['bold' => true],
            ],
        ];
    }
}

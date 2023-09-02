<?php

namespace App\Exports;

use App\Models\BayarCicilanLeasing;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BayarCicilanLeasingExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BayarCicilanLeasing::select('leasing', 'nama', 'nomor_tagihan', 'jumlah', 'created_at')->get();
    }

    public function headings(): array
    {
        return ["LEASING", "NAMA", "NOMOR TAGIHAN", "JUMLAH", "TANGGAL & WAKTU"];
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

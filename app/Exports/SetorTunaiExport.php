<?php

namespace App\Exports;

use App\Models\SetorTunai;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SetorTunaiExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SetorTunai::select('bank', 'nama', 'nomor_rekening', 'jumlah', 'created_at')->get();
    }

    public function headings(): array
    {
        return ["BANK", "NAMA", "NOMOR REKENING", "JUMLAH", "TANGGAL & WAKTU"];
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

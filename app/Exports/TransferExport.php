<?php

namespace App\Exports;

use App\Models\Transfer;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class TransferExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transfer::select('bank', 'nama', 'nomor_rekening', 'jumlah', 'nama_penerima', 'nomor_rekening_penerima', 'created_at')->get();
    }

    public function headings(): array
    {
        return ["BANK", "PENGIRIM", "NOMOR REKENING", "JUMLAH", "PENERIMA", "NOMOR REKENING PENERIMA", "TANGGAL & WAKTU"];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A1:G1' => [
                'font' => ['bold' => true],
            ],
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\Asuransi;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AsuransiExport implements FromCollection,  WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Asuransi::select(
            'ktp',
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'status_pernikahan',
            'handphone',
            'email',
            'negara',
            'kelas',
            'alamat',
            'kode_pos',
            'kk',
            'status_keluarga',
            'jumlah_anak',
            'nomor_rekening',
            'pemilik_rekening',
            'created_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            "KTP",
            "NAMA LENGKAP",
            "JENIS KELAMIN",
            "TEMPAT LAHIR",
            "TANGGAL LAHIR",
            "STATUS PERNIKAHAN",
            "TELPON",
            "EMAIL",
            "NEGARA",
            "KELAS",
            "ALAMAT",
            "KODE POS",
            "NOMOR KK",
            "STATUS KELUARGA",
            "JUMLAH ANAK",
            "NOMOR REKENING",
            "PEMILIK REKENING",
            "TANGGAL & WAKTU"
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A1:R1' => [
                'font' => ['bold' => true],
            ],
        ];
    }
}

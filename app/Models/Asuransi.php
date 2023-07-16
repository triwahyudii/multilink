<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asuransi extends Model
{
    use HasFactory;

    protected $table = 'asuransis';
    protected $fillable = [
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
        'pemilik_rekening'
    ];
}

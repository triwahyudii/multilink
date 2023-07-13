<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayarCicilanLeasing extends Model
{
    use HasFactory;

    protected $table = 'bayar_cicilan_leasings';
    protected $fillable = [
        'leasing',
        'nomor_tagihan',
        'nama',
        'jumlah',
    ];
}

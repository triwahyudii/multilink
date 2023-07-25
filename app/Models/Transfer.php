<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $table = "transfers";
    protected $fillable = [
        'bank',
        'nama',
        'nomor_rekening',
        'jumlah',
        'nama_penerima',
        'nomor_rekening_penerima'
    ];
}

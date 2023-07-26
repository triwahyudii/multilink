<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetorTunai extends Model
{
    use HasFactory;

    protected $table = 'setor_tunais';
    protected $fillable = [
        'bank',
        'nama',
        'nomor_rekening',
        'jumlah'
    ];
}

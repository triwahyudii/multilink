<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
    use HasFactory;

    protected $table = 'topups';
    protected $fillable = [
        'nama',
        'nomor_id',
        'jumlah'
    ];
}

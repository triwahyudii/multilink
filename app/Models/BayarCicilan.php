<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayarCicilan extends Model
{
    use HasFactory;

    protected $table = 'bayar_cicilans';
    protected $fillable = [
        'nama',

    ];
}

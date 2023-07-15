<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagihanListrik extends Model
{
    use HasFactory;

    protected $table = 'tagihan_listriks';
    protected $fillable = [
        'nomor_id'
    ];
}

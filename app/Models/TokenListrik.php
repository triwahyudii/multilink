<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenListrik extends Model
{
    use HasFactory;

    protected $table = 'token_listriks';
    protected $fillable = [
        'nomor_id',
        'nominal'
    ];
}

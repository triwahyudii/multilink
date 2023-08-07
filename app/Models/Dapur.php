<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dapur extends Model
{
    use HasFactory;

    protected $table = 'dapurs';
    protected $fillable = [
        'nama',
        'harga',
        'deskripsi',
        'image',
        'status'
    ];
}

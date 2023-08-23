<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Pulsa extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'pulsas';
    protected $fillable = [
        'provider',
        'nomor_handphone',
        'pulsa',
    ];

    public $sortable = [
        'provider',
        'nomor_handphone',
        'pulsa',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class BayarCicilan extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'bayar_cicilans';
    protected $fillable = [
        'bank',
        'nomor_tagihan',
        'nama',
        'jumlah',
    ];

    public $sortable = [
        'bank',
        'nomor_tagihan',
        'nama',
        'jumlah',
    ];
}

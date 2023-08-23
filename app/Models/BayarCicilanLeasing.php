<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class BayarCicilanLeasing extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'bayar_cicilan_leasings';
    protected $fillable = [
        'leasing',
        'nomor_tagihan',
        'nama',
        'jumlah',
    ];

    public $sortable = [
        'leasing',
        'nomor_tagihan',
        'nama',
        'jumlah',
    ];
}

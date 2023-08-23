<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Transfer extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = "transfers";
    protected $fillable = [
        'bank',
        'nama',
        'nomor_rekening',
        'jumlah',
        'nama_penerima',
        'nomor_rekening_penerima'
    ];

    public $sortable = [
        'bank',
        'nama',
        'nomor_rekening',
        'jumlah',
        'nama_penerima',
        'nomor_rekening_penerima'
    ];
}

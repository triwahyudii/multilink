<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Topup extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'topups';
    protected $fillable = [
        'nama',
        'nomor_id',
        'jumlah'
    ];

    public $sortable = [
        'nama',
        'nomor_id',
        'jumlah'
    ];
}

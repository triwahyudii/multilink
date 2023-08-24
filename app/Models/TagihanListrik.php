<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class TagihanListrik extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'tagihan_listriks';
    protected $fillable = [
        'nomor_id'
    ];

    public $sortable = [
        'nomor_id'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class TokenListrik extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'token_listriks';
    protected $fillable = [
        'nomor_id',
        'nominal'
    ];

    public $sortable = [
        'nomor_id',
        'nominal'
    ];
}

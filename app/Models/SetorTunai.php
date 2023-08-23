<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class SetorTunai extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'setor_tunais';
    protected $fillable = [
        'bank',
        'nama',
        'nomor_rekening',
        'jumlah'
    ]; 

    public $sortable = [
        'bank',
        'nama',
        'nomor_rekening',
        'jumlah'
    ];
}

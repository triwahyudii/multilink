<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Kyslik\ColumnSortable\Sortable;

class Sayur extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'sayurs';
    protected $fillable = [
        'nama',
        'harga',
        'deskripsi',
        'image',
        'status',
    ];

    public $sortable = [
         'nama',
        'harga',
        'deskripsi',
        'image',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            if ($model->isDirty('image') && ($model->getOriginal('image') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('image'));
            }
        });
    }
}

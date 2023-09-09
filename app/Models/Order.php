<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
    ];
    // protected $guarded = [];

    // public function dapurProducts()
    // {
    //     return $this->belongsToMany(Dapur::class, 'order_dapur')
    //         ->withPivot('quantity') 
    //         ->withTimestamps();
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

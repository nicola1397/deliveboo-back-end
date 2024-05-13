<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'address',
        'date_time',
        'price',
    ];

    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'dish_order')->withPivot('quantity');
    }
}

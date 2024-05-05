<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'restaurant_id',
        'availability',
        'image',
        'price',
        'slug',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function getAbstract($n_chars = 100)
    {
        return (strlen($this->description) > $n_chars) ? substr($this->description, 0, $n_chars) . "..." : $this->description;
    }
}

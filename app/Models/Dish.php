<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'restaurant_id',
        'availability',
        'image',
        'price',
        'slug',
    ];

    /* Realation between the dishes & their restaurant */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    /* Cut the dish description in the table list */
    public function getAbstract($n_chars = 100)
    {
        return (strlen($this->description) > $n_chars) ? substr($this->description, 0, $n_chars) . "..." : $this->description;
    }

    // Todo: relazione per gli ordini
}

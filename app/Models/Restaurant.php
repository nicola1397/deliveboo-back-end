<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'p_iva',
        'image',
        'address',
    ];

    /* Realation between any restaurant & its user */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* Realation between any restaurant & its dishes */
    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    /* Realation between the restaurants & their types */
    public function types()
    {
        return $this->belongsToMany(Type::class);
    }


}

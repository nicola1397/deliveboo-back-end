<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'color', 'image'];

    /* Realation between the types & the related restaurants */
    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }
}

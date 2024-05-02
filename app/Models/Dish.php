<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function getAbstract($n_chars = 25)
    {
        return (strlen($this->description) > $n_chars) ? substr($this->description, 0, $n_chars). "..." : $this->description;
    }
}

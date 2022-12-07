<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Nac extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function Listas()
    {
        return $this->hasMany(Lista::class);
    }


}

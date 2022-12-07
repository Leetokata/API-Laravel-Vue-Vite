<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;
    public $timestamps = false;


    public function Nac()
    {
        return $this->belongsTo(Nac::class);
    }

    public function Expertise()
    {
        return $this->belongsTo(Expertise::class);
    }

    public function Cultural_right()
    {
        return $this->belongsTo(Cultural_right::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $fillable = [
        'odp',
        'odr',
        'pdp',
        'probable',
        'positif',
        'meninggal',
        'sembuh',
    ];

   
}

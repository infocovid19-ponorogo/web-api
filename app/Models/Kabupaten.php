<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $fillable = [
        'nama',
        'latitude',
        'longitude',
        'odp',
        'pdp',
        'confirmed'
    ];
}

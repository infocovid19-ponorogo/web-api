<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $fillable = [
        'nama',
        'longitude',
        'latitude',
        'odp',
        'odr',
        'pdp',
        'probable',
        'positif',
        'meninggal',
        'sembuh',
    ];

    /**
     * @return mixed
     */
    public function getFilenameAttribute()
    {
        $storage = app('firebase.storage');
        
        return $this->attributes['filename'] ? $storage->getBucket()->object($this->attributes['filename'])->signedUrl(\Carbon\Carbon::now()->addMinute(10)) : '';
    }
}

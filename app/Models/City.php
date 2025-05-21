<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
        'iso2',
        'active',
        'province_id',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}

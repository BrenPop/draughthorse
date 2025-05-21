<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'common_name', 
        'official_name', 
        'region', 
        'sub_region', 
        'cca2', 
        'ccn3', 
        'cca3', 
        'cioc', 
        'active'
    ];

    public function provinces()
    {
        return $this->hasMany(Province::class);
    }
}

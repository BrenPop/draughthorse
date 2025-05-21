<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarType extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
}

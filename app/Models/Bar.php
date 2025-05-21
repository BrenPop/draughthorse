<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    protected $fillable = [
        'bar_name',
        'description',
        'profile_image',
        'cover_image',
        'address_line_one',
        'address_line_two',
        'address_line_three',
        'city',
        'province',
        'country',
        'postal_code',
        'bar_type_id',
    ];

    public function barType()
    {
        return $this->belongsTo(BarType::class);
    }


}

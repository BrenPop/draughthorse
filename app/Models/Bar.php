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
        'city_id',
        'province_id',
        'country_id',
        'postal_code',
        'bar_type_id',
        'user_id',
    ];

    public function barType()
    {
        return $this->belongsTo(BarType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}

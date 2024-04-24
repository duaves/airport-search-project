<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'city_name_ru',
        'city_name_en',
        'airport_name_ru',
        'airport_name_en',
        'country',
        'latitude',
        'longitude',
        'timezone',
    ];
}

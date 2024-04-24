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

    //поиско по уникальному коду аэропорта
    public static function searchByCode($query)
    {
        return self::where('code', $query)->get();
    }
    //поиско по названию города
    public static function searchByCity($query)
    {
        return self::where('city_name_ru', 'like', "%$query%")
                   ->orWhere('city_name_en', 'like', "%$query%")
                   ->get();
    }
    //поиско по названию аэропорта
    public static function searchByAirport($query)
    {
        return self::where('airport_name_ru', 'like', "%$query%")
                   ->orWhere('airport_name_en', 'like', "%$query%")
                   ->get();
    }
}

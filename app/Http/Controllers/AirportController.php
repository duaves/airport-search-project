<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AirportController extends Controller
{
    // Метод для поиска по названию аэропорта
    public function searchByAirport(Request $request)
    {
        $query = $request->input('query');

        // Генерируем уникальный ключ для кэширования
        $cacheKey = 'search_by_airport_' . md5($query);

        // Получаем данные из кэша
        $airports = Cache::remember($cacheKey, 9999999999, function () use ($query) {
            return Airport::searchByAirport($query);
        });

        return response()->json($airports);
    }

    // Метод для поиска по коду аэропорта
    public function searchByCode(Request $request)
    {
        $query = $request->input('query');

        // Генерируем уникальный ключ для кэширования
        $cacheKey = 'search_by_code_' . md5($query);

        // Получаем данные из кэша
        $airports = Cache::remember($cacheKey, 9999999999, function () use ($query) {
            return Airport::searchByCode($query);
        });

        return response()->json($airports);
    }

    // Метод для поиска по названию города
    public function searchByCity(Request $request)
    {
        $query = $request->input('query');

        // Генерируем уникальный ключ для кэширования
        $cacheKey = 'search_by_city_' . md5($query);

        // Получаем данные из кэша
        $airports = Cache::remember($cacheKey, 9999999999, function () use ($query) {
            return Airport::searchByCity($query);
        });

        return response()->json($airports);
    }
}

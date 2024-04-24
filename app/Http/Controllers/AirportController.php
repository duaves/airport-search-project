<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * 
 * @OA\Info(
 *      title="Airport API",
 *      version="1.0.0",
 *      description="API documentation for Airport search service",
 *      @OA\Contact(
 *          email="support@example.com",
 *          name="Support Team"
 *      )
 * )
 * 
 * @OA\Schema(
 *     schema="Airport",
 *     title="Airport",
 *     description="Airport data",
 *     @OA\Property(
 *         property="code",
 *         type="string",
 *         description="The airport code"
 *     ),
 *     @OA\Property(
 *         property="city_name_ru",
 *         type="string",
 *         description="The city name in Russian"
 *     ),
 *     @OA\Property(
 *         property="city_name_en",
 *         type="string",
 *         description="The city name in English"
 *     ),
 *     @OA\Property(
 *         property="airport_name_ru",
 *         type="string",
 *         description="The airport name in Russian"
 *     ),
 *     @OA\Property(
 *         property="airport_name_en",
 *         type="string",
 *         description="The airport name in English"
 *     ),
 *     @OA\Property(
 *         property="country",
 *         type="string",
 *         description="The country code"
 *     ),
 *     @OA\Property(
 *         property="latitude",
 *         type="number",
 *         format="float",
 *         description="The latitude coordinate of the airport"
 *     ),
 *     @OA\Property(
 *         property="longitude",
 *         type="number",
 *         format="float",
 *         description="The longitude coordinate of the airport"
 *     ),
 *     @OA\Property(
 *         property="timezone",
 *         type="string",
 *         description="The timezone of the airport"
 *     ),
 * )
 * 
 * @OA\Get(
 *     path="/api/airports/searchByCode",
 *     tags={"Code"},
 *     summary="Search by code",
 *     description="Returns a list of airports that match the provided code",
 *     @OA\Parameter(
 *         name="query",
 *         in="query",
 *         description="Search query",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *      @OA\Response(
 *      response=200,
 *      description="Successful operation",
 *          @OA\JsonContent(
 *              type="array",
 *              @OA\Items(ref="#/components/schemas/Airport")
 *          )
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="No cities found"
 *      )
 * )
 * 
 * 
 * @OA\Get(
 *     path="/api/airports/searchByCity",
 *     tags={"Cities"},
 *     summary="Search cities by name",
 *     description="Returns a list of cities that match the provided query",
 *     @OA\Parameter(
 *         name="query",
 *         in="query",
 *         description="Search query",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *      @OA\Response(
 *      response=200,
 *      description="Successful operation",
 *          @OA\JsonContent(
 *              type="array",
 *              @OA\Items(ref="#/components/schemas/Airport")
 *          )
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="No airports found"
 *      )
 * )
 * 
 * @OA\Get(
 *     path="/api/airports/searchByAirport",
 *     tags={"Airports"},
 *     summary="Search airports by name",
 *     description="Returns a list of airports that match the provided query",
 *     @OA\Parameter(
 *         name="query",
 *         in="query",
 *         description="Search query",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *      @OA\Response(
 *      response=200,
 *      description="Successful operation",
 *          @OA\JsonContent(
 *              type="array",
 *              @OA\Items(ref="#/components/schemas/Airport")
 *          )
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="No airports found"
 *      )
 * )
 * 
 * 
 */



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

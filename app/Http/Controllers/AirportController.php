<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    //метод для поиска по названию Аэропорта
    public function searchByAirport(Request $request)
    {
        $query = $request->input('query');

        
        $airports = Airport::searchByAirport($query);

        return response()->json($airports);
    }
    //метод для поиска по коду Аэропорта
    public function searchByCode(Request $request)
    {
        $query = $request->input('query');

        $airports = Airport::searchByCode($query);

        return response()->json($airports);
    }
    //метод для поиска по названию Города
    public function searchByCity(Request $request)
    {
        $query = $request->input('query');

        $airports = Airport::searchByCity($query);

        return response()->json($airports);
    }
}

<?php

namespace Tests\Feature;


use Tests\TestCase;

class AirportControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSearchByCodeCaching()
    {
        // Очищаем кэш перед выполнением теста
        \Illuminate\Support\Facades\Cache::flush();

        // Отправляем GET запрос на api/airports/searchByCode с параметром query=AAL
        $response = $this->get('api/airports/searchByCode?query=AAL');

        // Проверяем, что ответ имеет статус 200 (Успешный запрос)
        $response->assertStatus(200);

        // Проверяем, что в кэше есть запись с ключом 'search_by_code_AAL'
        $this->assertTrue(\Illuminate\Support\Facades\Cache::has('search_by_code_'.md5('AAL')));
    }

    public function testSearchByAirportCaching()
    {
        // Очищаем кэш перед выполнением теста
        \Illuminate\Support\Facades\Cache::flush();

        // Отправляем GET запрос на api/airports/searchByAirport с параметром query=Merzbrueck
        $response = $this->get('api/airports/searchByAirport?query=Merzbrueck');

        // Проверяем, что ответ имеет статус 200 (Успешный запрос)
        $response->assertStatus(200);

        // Проверяем, что в кэше есть запись с ключом 'search_by_airport_Merzbrueck'
        $this->assertTrue(\Illuminate\Support\Facades\Cache::has('search_by_airport_'.md5('Merzbrueck')));
    }

    public function testSearchByCityCaching()
    {
        // Очищаем кэш перед выполнением теста
        \Illuminate\Support\Facades\Cache::flush();

        // Отправляем GET запрос на api/airports/searchByCity с параметром query=Владивосток
        $response = $this->get('api/airports/searchByCity?query=Владивосток');

        // Проверяем, что ответ имеет статус 200 (Успешный запрос)
        $response->assertStatus(200);

        // Проверяем, что в кэше есть запись с ключом 'search_by_city_Владивосток'
        $this->assertTrue(\Illuminate\Support\Facades\Cache::has('search_by_city_'.md5('Владивосток')));
    }
}

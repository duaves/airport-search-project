<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Airport;

class ImportAirports extends Command
{
    protected $signature = 'import:airports';
    protected $description = 'Import airports data from JSON file';

    public function handle()
    {
        $jsonFile = storage_path('app/airports.json');
        $data = json_decode(file_get_contents($jsonFile), true);

        foreach ($data as $code => $airportData) {
            // Проверяем наличие ключей 'lat' и 'lng' в массиве $airportData
            if (isset($airportData['lat']) && isset($airportData['lng'])) {
                // Проверяем, что значение для поля 'country' не равно NULL
                if (isset($airportData['country']) && $airportData['country'] !== null) {
                    Airport::updateOrCreate(
                        ['code' => $code],
                        [
                            'city_name_ru' => $airportData['cityName']['ru'] ?? null,
                            'city_name_en' => $airportData['cityName']['en'] ?? null,
                            'airport_name_ru' => $airportData['airportName']['ru'] ?? null,
                            'airport_name_en' => $airportData['airportName']['en'] ?? null,
                            'country' => $airportData['country'],
                            'latitude' => $airportData['lat'],
                            'longitude' => $airportData['lng'],
                            'timezone' => $airportData['timezone'],
                        ]
                    );
                } else {
                    echo "Warning: Missing country data for airport with code {$code}.\n";
                }
            } else {
                echo "Warning: Missing latitude or longitude data for airport with code {$code}.\n";
            }
        }
        

        $this->info('Import completed successfully.');
    }
}

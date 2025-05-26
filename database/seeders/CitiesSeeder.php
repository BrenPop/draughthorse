<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $citiesArray = Storage::disk('local')->json('json/seed-data/SouthAfricanCities.json');

        $data = [];
        foreach (array_chunk($citiesArray, 1000) as $citiesChunk) {
            $data = [];
            foreach ($citiesChunk as $city) {

                // get Province where name is like $city["ProvinceName"]
                $province = Province::where('name', 'like', '%' . $city['ProvinceName'] . '%')->first();

                if (!$province)
                    continue;

                $data[] = [
                    'name' => $city['AccentCity'],
                    'longitude' => $city['Longitude'],
                    'latitude' => $city['Latitude'],
                    'province_id' => $province->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            City::insert($data);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // get storage file in json/seed_data/cities-list.json
        // and insert into cities table

        // $jsonString = file_get_contents(base_path('public/json/seed-data/cities-list.json'));

        // // $jsonString = file_get_contents(base_path('/json/seed_data/cities-list.json'));

        // $citiesArray = json_decode($jsonString, true);

        $citiesArray = Storage::disk('local')->json('json/seed-data/cities-list.json'); // json('storage\app\public\json\seed-data\cities-list.json');

        $data = [];
        foreach ($citiesArray as $city) {

            $province = \App\Models\Province::where('name', $city['admin_name'])->first();

            if (!$province)
                continue;

            $data[] = [
                'name' => $city['city'],
                'iso2' => $city['iso2'],
                'province_id' => $province->id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        City::Insert($data);
    }
}

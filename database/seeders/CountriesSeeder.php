<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cachedCountries = Cache::get('countries');

        if ($cachedCountries) {
            $countries = $cachedCountries;
        } else {
            $response = Http::get('https://restcountries.com/v3.1/all');

            $countries = $response->json();

            Cache::put('countries', $countries, Carbon::now()->addWeek());
        }

        $data = [];
        foreach ($countries as $country) {
            $data[] = [
                'common_name' => $country['name']['common'] ?? null,
                'official_name' => $country['name']['official'] ?? null,
                'region' => $country['region'] ?? null,
                'sub_region' => $country['subregion'] ?? null,
                'cca2' => $country['cca2'] ?? null,
                'ccn3' => $country['ccn3'] ?? null,
                'cca3' => $country['cca3'] ?? null,
                'cioc' => $country['cioc'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Country::insert($data);

        // Update South Africa to be active
        Country::where('common_name', 'South Africa')->update(['active' => true]);
    }
}

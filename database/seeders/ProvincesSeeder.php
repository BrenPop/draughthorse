<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countryId = DB::table('countries')->where('cca2', 'ZA')->first()->id;

        $provinces = [
            ['name' => 'KwaZulu-Natal', 'code' => 'KZN', 'country_id' => $countryId, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Eastern Cape', 'code' => 'EC', 'country_id' => $countryId, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Free State', 'code' => 'FS', 'country_id' => $countryId, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gauteng', 'code' => 'GP', 'country_id' => $countryId, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Limpopo', 'code' => 'LP', 'country_id' => $countryId, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mpumalanga', 'code' => 'MP', 'country_id' => $countryId, 'createdd_at' => now(), 'updated_at' => now()],
            ['name' => 'North West', 'code' => 'NW', 'country_id' => $countryId, 'create_at' => now(), 'updated_at' => now()],
            ['name' => 'Northern Cape', 'code' => 'NC', 'country_id' => $countryId, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Western Cape', 'code' => 'WC', 'country_id' => $countryId, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('provinces')->insert($provinces);
    }
}

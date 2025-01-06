<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = file_get_contents(resource_path('files/countries/countries.json'));
        $countries = json_decode($countries, true)['countries'];
        Country::insert($countries);

        $states = file_get_contents(resource_path('files/countries/states.json'));
        $states = json_decode($states, true)['states'];
        State::insert($states);

        $cities = file_get_contents(resource_path('files/countries/cities.json'));
        $cities = json_decode($cities, true)['cities'];
        collect($cities)
            ->chunk(500)
            ->each(function ($city) {
                City::insert($city->toArray());
            });
    }
}

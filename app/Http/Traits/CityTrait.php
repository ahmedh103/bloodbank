<?php

namespace App\Http\Traits;

use App\Models\City;
use App\Models\Governorate;

trait CityTrait
{

    private function getCityByGovernorate()
    {
        return Governorate::get(['id','name']);
    }
    private function getCities()
    {
        return City::get(['id','name']);
    }
}
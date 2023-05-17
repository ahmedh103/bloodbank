<?php

namespace App\Http\Traits;

use App\Models\BloodType;

trait BloodTypeTrait
{

    private function getBloodTypes()
    {
        return BloodType::get(['id','name']);
    }
}
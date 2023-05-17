<?php

namespace App\Http\Traits;

use App\Models\BloodType;
use App\Models\Governorate;

trait RegisterTrait
{

public function getGovernorate()
{

    return  Governorate::get();

}

public function getBloodTypes()
{

    return  BloodType::get();

}


}
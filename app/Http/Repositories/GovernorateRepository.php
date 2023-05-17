<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\GovernorateInterface;
use App\Http\Traits\apiResponseTrait;
use App\Models\Governorate;

class GovernorateRepository implements GovernorateInterface{
    private $governorateModel;
    use apiResponseTrait;

    public function   __construct(Governorate $governorate)
    {
        $this->governorateModel = $governorate;
    }

    public function getGovernorate()
    {
        $governorate =  $this->governorateModel::get();
        return $this->apiResponse(1,'success',$governorate);
    }

}
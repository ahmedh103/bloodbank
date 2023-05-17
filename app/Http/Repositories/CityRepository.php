<?php namespace App\Http\Repositories;

use App\Http\Interfaces\CityInterface;

use App\Http\Traits\apiResponseTrait;
use App\Models\City;


class CityRepository implements CityInterface {
    private $cityModel;
    use apiResponseTrait;

    public function __construct(City $city) {

        $this->cityModel=$city;

    }

    public function getCity($request) {

        $city=$this->cityModel::where(function($query) use($request) {
                if($request->has('governorate_id')) 
                {
                    $query->where('governorate_id', $request->governorate_id);
                }


            }

        )->get();

        return $this->apiResponse(1, 'success', $city);
    }

}

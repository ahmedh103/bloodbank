<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\CityInterface;
use App\Http\Requests\City\StoreCityRequest;
use App\Http\Requests\City\updateCityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private $cityInterface;

    public function __construct(CityInterface $cityInterface)
    {
        $this->cityInterface = $cityInterface;
    }

    public function index()
    {
        return $this->cityInterface->index();
    }

    public function create()
    {
        return $this->cityInterface->create();   
    }

    public function store(StoreCityRequest $request)
    {
     return $this->cityInterface->store($request);
    }

    public function edite(City  $city)
    {
     return $this->cityInterface->edite($city);
    }
    public function update(updateCityRequest $request , City $city)
    {
    return $this->cityInterface->update($request,$city);
    }

    public function delete( City $city)
    {
    return $this->cityInterface->delete($city);
    }

    public function restore()
    {
    return $this->cityInterface->restore();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\CityInterface;

use Illuminate\Http\Request;

class CityController extends Controller
{
    private $cityInterface;

    public function __construct(CityInterface $city)
    {
        $this->cityInterface = $city;
    }
    
    public function getCity(Request $request)
    {
        return $this->cityInterface->getCity($request);
    }
}

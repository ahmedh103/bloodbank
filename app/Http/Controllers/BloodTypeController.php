<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\BloodTypeInterface;
use Illuminate\Http\Request;

class BloodTypeController extends Controller
{
    
    private $bloodTypeInterface;

    public function __construct(BloodTypeInterface $blood)
    {
        $this->bloodTypeInterface = $blood;
    }

    public function getBloodTypes(Request $request)
    {
        return $this->bloodTypeInterface->getBloodType($request);
    }

}

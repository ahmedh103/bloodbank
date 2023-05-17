<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\GovernorateInterface;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    private $governorateInterface;
    public function __construct(GovernorateInterface $governorate)
    {
        $this->governorateInterface = $governorate;
    }
    public function getGovernorate()
    {
        return $this->governorateInterface->getGovernorate();
    }
    
}

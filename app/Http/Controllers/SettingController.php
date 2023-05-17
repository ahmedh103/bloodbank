<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\SettingInterface;
use App\Http\Requests\Setting\StoreSettingRequest;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $settingInterface;

    public function __construct(SettingInterface $setting)
    {
        $this->settingInterface = $setting;

    }

    public function getSetting()
    {
        return $this->settingInterface->getSetting();
    }

    
}

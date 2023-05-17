<?php

namespace App\Http\Repositories;


use App\Http\Interfaces\SettingInterface;
use App\Http\Traits\apiResponseTrait;
use App\Models\Governorate;
use App\Models\Setting;
use GuzzleHttp\Promise\Create;

class SettingRepository implements SettingInterface{
        private $SettingModel;
        use apiResponseTrait;

       public function   __construct(Setting $setting)
        {

                $this->SettingModel = $setting;

        }

        public function getSetting()
        {
        $setting = Setting::get()->first();
        return $this->apiResponse(1,'success',$setting);
        }
   

}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\SettingInterface;
use App\Http\Requests\Setting\updateSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $settingInterface;

    public function __construct(SettingInterface $settingInterface)
    {
        $this->settingInterface = $settingInterface;
    }

    public function index()
    {
    return    $this->settingInterface->index();
    }

    public function edite(Setting  $setting)
    {
        return $this->settingInterface->edite($setting);
    }

    public function update(updateSettingRequest $request , Setting $setting)
    {
        return $this->settingInterface->update($request,$setting);
    }


}

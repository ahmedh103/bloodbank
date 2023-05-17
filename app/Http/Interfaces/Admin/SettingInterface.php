<?php namespace App\Http\Interfaces\Admin;

interface SettingInterface {

    public function index();
  
    public function edite($setting);
    public function update($request, $setting);

}

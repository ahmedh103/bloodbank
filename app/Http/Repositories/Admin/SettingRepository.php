<?php namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\SettingInterface;
use App\Models\Setting;
use RealRashid\SweetAlert\Facades\Alert;

class SettingRepository implements SettingInterface {

    private $settingModel;

    public function __construct(Setting $setting) {
        $this->settingModel=$setting;
    }

    public function index() 
    {
        $settings=$this->settingModel::paginate(2);
        return view('Admin.pages.setting.index', compact('settings'));
    }


   

    public function edite($setting)
    {
        $this->settingModel::get();
        return view('Admin.pages.setting.edit',compact('setting'));
    }

    public function update($request, $setting)
    {
    $setting->update([
        'about_app'=>$request->about_app,
        'phone'=>$request->phone,
        'email'=>$request->email,
        'fb_link'=>$request->fb_link,
        'tw_link'=>$request->tw_link,
        'insta_link'=>$request->insta_link,
      
    ]);
    toast('setting updated successfully','success');

    return redirect(route('setting.index'));
    }



}

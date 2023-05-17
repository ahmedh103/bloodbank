<?php namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\CityInterface;
use App\Http\Traits\CityTrait;
use App\Models\City;


class CityRepository implements CityInterface {
use CityTrait;
    private $cityModel;

    public function __construct(City $city) {
        $this->cityModel=$city;
    }

    public function index() {
        $cities=$this->cityModel::with('governorate')->get([
        'id',
        'name',
        'governorate_id'
                ]);
        return view('Admin.pages.city.index', compact('cities'));

    }

    public function create() {
        $governorates = $this->getCityByGovernorate();
        return view('Admin.pages.city.create',compact('governorates'));
    }

    public function store($request) {

      $this->cityModel::create([
            'name'=> $request->name,
            'governorate_id'=> $request->governorate_id
        ]);
        toast('City Added Successfully', 'success');
        return redirect(route('city.index'));

    }

    public function edite($city)
    {
        $governorates = $this->getCityByGovernorate();
        return view('Admin.pages.city.edit',compact('city','governorates'));
    }

public function update($request, $city)
{
    $city->update([
        'name'=>$request->name,
        'governorate_id'=> $request->governorate_id
    ]);
    toast('governorate updated successfully','success');
    return redirect(route('city.index'));
}

public function delete($city)
{
    $city->delete();
    toast('Governorate Deleted Successfully', 'success');
    return back();
}
public function restore()
{
     City::onlyTrashed()->restore();
     return back();
}
}

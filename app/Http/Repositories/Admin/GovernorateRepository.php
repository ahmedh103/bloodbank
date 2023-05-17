<?php namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\GovernorateInterface;
use App\Models\Governorate;
use RealRashid\SweetAlert\Facades\Alert;

class GovernorateRepository implements GovernorateInterface {

    private $governorateModel;

    public function __construct(Governorate $governorate)
    {
        $this->governorateModel=$governorate;
    }

    public function index()
    {
        $governorates=$this->governorateModel::paginate(2);
        return view('Admin.pages.governorate.index', compact('governorates'));
    }

    public function create()
    {
        return view('Admin.pages.governorate.create');
    }

    public function store($request)
    {
        $this->governorateModel::create([

            'name'=> $request->name
        ]);
        toast('Governorate Added Successfully', 'success');
        return redirect(route('governorate.index'));
    }

    public function edite($governorate)
    {  
        $this->governorateModel::get(['name']);
        return view('Admin.pages.governorate.edit',compact('governorate'));
    }

public function update($request, $governorate)
{
    $governorate->update([
        'name'=>$request->name
        
    ]);
    toast('governorate updated successfully','success');
    return redirect(route('governorate.index'));
}

public function delete($governorate)
{
    $governorate->delete();
    toast('Governorate Deleted Successfully', 'success');
    return back();
}

}

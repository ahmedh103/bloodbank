<?php namespace App\Http\Repositories\Admin;


use App\Http\Interfaces\Admin\UserInterface;
use App\Http\Traits\PermissionTrait;
use App\Models\User;

class UserRepository implements UserInterface {
use PermissionTrait;
    private $userModel;

    public function __construct(User $user) {
        $this->userModel=$user;
    }

    public function index() {
     
        $users =$this->userModel::with('roles')->paginate(10);
        return view('Admin.pages.users.index', compact('users'));

    }

    public function create() 
    {
    $roles =$this->getRoles();
    return view('Admin.pages.users.create',compact('roles'));
    }

    public function store($request) 
    {
    $request->merge(['password'=>bcrypt($request->password)]);
    $record =   $this->userModel::create($request->except('roles_list'));
    $record->roles()->attach($request->roles_list);
    toast('user Added Successfully', 'success');
    return redirect(route('user.index'));

    }

    public function edite($user)
    {
        $roles =$this->getRoles();
        return view('Admin.pages.users.edit',compact('user','roles'));
    }

    public function update($request, $user)
    { 
    $request->merge(['password'=>bcrypt($request->password)]);
    $record =  $user->update($request->except('roles_list'));
    $user->roles()->sync($request->roles_list);
    toast('user updated successfully','success');
    return back();
    }

    public function delete($user)
    {
    $user->delete();
    return response()->json([
        'success' => 'Record deleted successfully!'
    ]);
    }

}

<?php namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\RoleInterface;
use App\Http\Traits\PermissionTrait;
use App\Models\Role;

class RoleRepository implements RoleInterface {
use PermissionTrait;
    private $roleModel;

    public function __construct(Role $role) {
        $this->roleModel=$role;
    }


    public function index() {

        return $this->roleModel::paginate(10);
      

    }

    public function create() 
    {
        return  $this->getPermission();
    }

    public function store($request) {
     $record =   $this->roleModel::create($request->all());
     $record->permissions()->attach($request->permission_list);
    
   

    }

    public function edite($role)
    {
        return $this->getPermission();
    }

    public function update($request, $role)
    {
    $record =  $role->update([
        'name'=> $request->name,
      
            'permission_list'=> $request->permission_list
    ]);
    $role->permissions()->sync($request->permission_list);
    
    }

    public function delete($role)
    {
    $role->delete();
    }

}

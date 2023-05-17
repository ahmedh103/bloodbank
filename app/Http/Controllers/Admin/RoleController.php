<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\RoleInterface;
use App\Http\Requests\Role\saveRoleRequest;
use App\Http\Requests\Role\updateRoleRequest;
use App\Http\Traits\PermissionTrait;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller {
    use PermissionTrait;
    private $roleInterface;

    public function __construct(RoleInterface $roleInterface) {
        $this->roleInterface=$roleInterface;
    }

    public function index() {
      $roles =  $this->roleInterface->index();
       return  view('Admin.pages.roles.index', compact('roles'));
    }

    public function create() {
        // get roles db/repo
        $perm = $this->roleInterface->create();
        
        // return view routing
        return view('Admin.pages.roles.create', compact('perm'));
      
    }

    public function store(saveRoleRequest $request) {

        $this->roleInterface->store($request);

        toast('Role Added Successfully', 'success');
        return redirect(route('role.index'));
    }

    public function edite(Role $role) {

        $perm =  $this->roleInterface->edite($role);
        
        return view('Admin.pages.roles.edit',compact('role','perm'));

    }


    public function update(updateRoleRequest $request, Role $role) {
         $this->roleInterface->update($request, $role);
        toast('Role updated successfully','success');
    return back();
    }

    public function delete(Role $role) {
        
         $this->roleInterface->delete($role);
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

}

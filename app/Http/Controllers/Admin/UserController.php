<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\UserInterface;
use App\Http\Requests\User\saveUserRequest;
use App\Http\Requests\User\updateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function index()
    {
    return  $this->userInterface->index();
    }

    public function create()
    {
    return  $this->userInterface->create();
    }

    public function store(saveUserRequest $request)
    {
     return $this->userInterface->store($request);
    }

    public function edite(User  $user)
    {
     return $this->userInterface->edite($user);
    }

    public function update(updateUserRequest $request , User $user)
    {
     return $this->userInterface->update($request,$user);
    }

    public function delete( User $user)
    {
     return $this->userInterface->delete($user);
    }

}
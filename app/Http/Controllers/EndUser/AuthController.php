<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\AuthInterface;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    private $authInterface;

    public function __construct(AuthInterface $authInterface)
     {
       $this->authInterface = $authInterface;
     }
    public function index()
    {
        
        return view('EndUser.pages.Login.login');
    }
     

    public function login(LoginRequest $request)
    {
    
        return  $this->authInterface->login($request);

    }

    public function logout()
    {

         $this->authInterface->logout();
         return  redirect(route('enduser.login.page'));


    }
}

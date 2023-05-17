<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\RegisterInterface;
use App\Http\Requests\Auth\saveRegisterRequest;
use App\Http\Traits\RegisterTrait;

class RegisterController extends Controller
{
     use RegisterTrait;
     private $registerInterface;

    public function __construct(RegisterInterface $registerInterface)
     {
       $this->registerInterface = $registerInterface;
     }

    public function index()
    {
        $governorates = $this->getGovernorate();
        
        $bloodTypes = $this->getBloodTypes();
        return view('EndUser.pages.Register.register',compact('governorates','bloodTypes'));

    }

    public function register(saveRegisterRequest $request)
    {
         $this->registerInterface->register($request);
         toast('Client Created Successfully', 'success');
       
         return view('EndUser.home');

     }
}

<?php namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\RegisterInterface;
use App\Http\Traits\RegisterTrait;
use App\Models\Client;


class RegisterRepository implements RegisterInterface {
    use RegisterTrait;
    private $clientModel;

    public function __construct(Client $register) 
    {
        $this->clientModel=$register;
    }

    public function index()
    {
   
     $this->getGovernorate();
     
    //  $this->getBloodTypes();

    }

    public function register($request)
     {

        $request->merge(['password'=>bcrypt($request->password)]);
       $this->clientModel::create($request->all());
       
        
        
     }


     
    }
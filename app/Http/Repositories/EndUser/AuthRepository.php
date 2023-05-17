<?php namespace App\Http\Repositories\EndUser;
use App\Http\Interfaces\EndUser\AuthInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthInterface {


    public function index()
     {
        
     }

     public function login($request)
     {
       
        $credentials = $request->only(['phone', 'password']);
       //dd(auth('enduser')->attempt($credentials));
        if (auth('enduser')->attempt($credentials)) {

            return redirect(route('home'));
                       
        }

        return back();
     
    }


    public function logout()
    {
        \session()->flush();
        
        Auth::logout();
        


    }
}
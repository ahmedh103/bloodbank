<?php namespace App\Http\Repositories;

use App\Http\Interfaces\ClientInterface;
use App\Http\Traits\apiResponseTrait;
use App\Mail\ResetPassword;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ClientRepository implements ClientInterface {
    use apiResponseTrait;

    private $clientModel;

    public function __construct(Client $register) 
    {
        $this->clientModel=$register;
    }

    public function register($request) {
        // $valdiator=validator()->make($request->all(), [ 'phone'=>'required',
        //     'email'=>'required|email|unique:clients,email',
        //     'name'=>'required',
        //     'city_id'=>'required|exists:cities,id',
        //     'password'=>'required|confirmed|min:6',
        //     'blood_type_id'=>'required|exists:blood_types,id',
        //     'd_o_b'=>'required',
        //     'last_donation_date'=>'required'
        //     ]);

        // if($valdiator->fails()) {

        //     return $this->apiResponse(0, $valdiator->errors()->first(), $valdiator->errors());

        // }

        $request->merge(['password'=>bcrypt($request->password)]);
        $client=$this->clientModel::create($request->all());
        $client->api_token=Str::random(60);
        $client->save();
        return $this->apiResponse(1, 'تم الاضافة بنجاح', [ 'api_token'=>$client->api_token,
            'client'=>$client]);
    }

    public function login($request) 
    {
        // $valdiator=validator()->make($request->all(),
        //  [ 
        //     'phone'=>'required',
        //     'password'=>'required|min:6',

        //     ]);

        // if($valdiator->fails()) {

        //     return $this->apiResponse(0, $valdiator->errors()->first(), $valdiator->errors());

        // }

        $client=$this->clientModel::where('phone', $request->phone)->first();

        if($client) {
            if(Hash::check($request->password, $client->password)) {
                return $this->apiResponse(1, 'تم تسجيل الدخول بنجاح', [ 'api_token'=>$client->api_token,
                    'client'=>$client]);

            }

            else {
                return $this->apiResponse(0, 'لايوجد  حساب مرتبط بهذا الرقم');
            }
        }

        else {
            return $this->apiResponse(0, 'لايوجد  حساب مرتبط بهذا الرقم');
        }

    }

    public function getClientById($request) {
        return $request->user();
    }

    public function updateProfileUser($request) {
        $user=$request->user();
        $valdiateData=$request->validated(); 
        $user->update($valdiateData);
        $user=$user->refresh();
        $success['user']=$user;
        return $this->apiResponse(1, 'تم التعديل بنجاح', $user);
    }

    public function resetPassword($request) {
        $user=$this->clientModel::where('phone', $request->phone)->first();

        if($user) {

            $code=rand(1111, 9999);
            $update=$user->update(['pin_code'=>$code]);

        
            if($update) {
                Mail::to($user->email) ->send(new ResetPassword($code));
                return $this->apiResponse(1, 'برجاء فحص هاتفك', ['pin_code_for_test'=>$code,
                    // 'mail_fails' => Mail::failures(),
                    'email'=>$user->email]);
            }

            else {
                return $this->apiResponse(0, 'حدث خطأ');
            }
        }

        else {
            return $this->apiResponse(0, 'لا يوجد حساب');
        }
    }
    public function logout() {
        if(auth('api')->user()) 
        {
            $user=auth('api')->user();

            $user->api_token=null;

            $user->save;

            
            return $this->apiResponse(1, 'logged out');
        }
        else {
            return $this->apiResponse(0, 'logged out failled');
        }
    }
    public function password($request) {
        $user=$this->clientModel::where('pin_code', $request->pin_code)->where('pin_code', '!=', 0)->where('phone', $request->phone)->first();
        if($user) {
            $user->password=bcrypt($request->password);
            $user->pin_code=null;
            if($user->save()) {
                return $this->apiResponse(1, 'تم تغير كلمة المرور بنجاح');
            }
            else {
                return $this->apiResponse(0, 'حدث خطأ , حاول مرة اخري');

            }
        }

        else {
            return $this->apiResponse(0, 'هذا الكود غير صالح');
        }
    }

    public function postFavourite($request) {

        $toggle=$request->user()->posts()->toggle($request->post_id);

        return $this->apiResponse(1, 'success', $toggle);
    }
    public function myFavourite($request) {
        $posts=$request->user()->posts()->latest()->paginate(20);
        return $this->apiResponse(1, 'Loaded.....', $posts);
    }


}

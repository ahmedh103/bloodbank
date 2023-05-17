<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\PostInterface;
use App\Http\Interfaces\TokenInterface;
use App\Http\Traits\apiResponseTrait;


use App\Models\Token;

class TokenRepository implements TokenInterface{
    private $tokenModel;
use apiResponseTrait;

    public function   __construct(Token $token)
    {
     $this->tokenModel = $token;
    }
    public function registerToken($request)
    {
       $this->tokenModel::where('token',$request->token)->delete();
       $request->user()->tokens()->create($request->all());
        return $this->apiResponse(1,'تم التسجيل بنجاح');
    }


    public function removeToken($request)
    {
        $this->tokenModel::where('token',$request->token)->delete();
        return $this->apiResponse(1,'تم الحذف بنجاح');
    }
}
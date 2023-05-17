<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\TokenInterface;
use App\Http\Requests\RegisterToken\removeTokenRequest;
use App\Http\Requests\RegisterToken\saveregisterTokenRequest;
use Illuminate\Http\Request;

class TokenController extends Controller
{

    private $tokenInterface;

    public function __construct(TokenInterface $token)
    {
        $this->tokenInterface = $token;
    }
    public function registerToken(saveregisterTokenRequest $request)
    {
        return $this->tokenInterface->registerToken($request);
    }

    public function removeToken(removeTokenRequest $request)
    {
        return $this->tokenInterface->removeToken($request);
    }
}

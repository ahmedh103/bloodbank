<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ClientInterface;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\NewPasswordRequest;
use App\Http\Requests\Auth\saveRegisterRequest;
use App\Http\Requests\Auth\UpdateProfileRequest;
use App\Http\Requests\Post\postFavouriteRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }
    public function register(saveRegisterRequest $request)
    {
        return $this->client->register($request);
    } 
    public function login(LoginRequest $request)
    {
        return $this->client->login($request);
    }
    public function profileUser(Request $request)
    {
    return $this->client->getClientById($request);
    }
    public function updateProfileUser(UpdateProfileRequest $request)
    {
    return $this->client->updateProfileUser($request);
    }
    public function  resetPassword(Request $request)
    {
    return $this->client->resetPassword($request);
    }
    public function  logout()
    {
    return $this->client->logout();
    }
    public function password(NewPasswordRequest $request)
    {
    return $this->client->password($request);
    }
    public function postFavourite(postFavouriteRequest $request)
    {
         return $this->client->postFavourite($request);
    }
    public function myFavourite(Request $request)
    {
        return $this->client->myFavourite($request);
    }

   
}

<?php



namespace App\Http\Interfaces;
interface ClientInterface{

    public function register($request);

    public function login($request);

    public function getClientById($request);
    
    public function updateProfileUser($request);
    
    public function resetPassword($request);
    
    public function logout(); 

    public function password($request);
    
    public function postFavourite($request);
    
    public function myFavourite($request);

   
}
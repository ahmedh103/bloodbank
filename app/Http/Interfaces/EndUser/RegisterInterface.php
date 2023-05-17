<?php



namespace App\Http\Interfaces\EndUser;


interface RegisterInterface
{

    public function index();
    public function register($request);

}
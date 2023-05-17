<?php



namespace App\Http\Interfaces;
interface TokenInterface{



 public function registerToken($request);
 public function removeToken($request);
}
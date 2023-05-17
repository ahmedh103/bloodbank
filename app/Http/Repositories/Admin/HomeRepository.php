<?php namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\HomeInterface;

class HomeRepository implements HomeInterface {


    public function index()
     {
        return view('Admin.home');
     }





}

<?php namespace App\Http\Interfaces\Admin;

interface UserInterface {

    public function index();
    public function create();
    public function store($request);
    public function edite($user);
    public function update($request, $user);
    public function delete($user);
    
}

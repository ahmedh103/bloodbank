<?php namespace App\Http\Interfaces\Admin;

interface GovernorateInterface {

    public function index();
    public function create();
    public function store($request);
    public function edite($governorate);
    public function update($request, $governorate);
    public function delete($governorate);
}

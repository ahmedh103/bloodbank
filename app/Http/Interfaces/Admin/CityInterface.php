<?php namespace App\Http\Interfaces\Admin;

interface CityInterface {

    public function index();
    public function create();
    public function store($request);
    public function edite($city);
    public function update($request, $city);
    public function delete($city);
    public function restore();
}

<?php namespace App\Http\Interfaces\Admin;

interface CategoryInterface {

    public function index();
    public function create();
    public function store($request);
    public function edite($category);
    public function update($request, $category);
    public function delete($category);
    
}

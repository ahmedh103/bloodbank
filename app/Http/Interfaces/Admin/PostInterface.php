<?php namespace App\Http\Interfaces\Admin;

interface PostInterface {

    public function index();
    public function create();
    public function store($request);
    public function edite($post);
    public function update($request, $post);
    public function delete($post);
    
}

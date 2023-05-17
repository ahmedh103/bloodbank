<?php namespace App\Http\Interfaces\Admin;

interface ClientInterface {

    public function index();

    public function approve($client);
    public function reject($client);
    public function delete($client);
    public function makeAllStatusActive();
    
}

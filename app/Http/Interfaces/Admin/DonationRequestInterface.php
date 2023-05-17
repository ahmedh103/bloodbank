<?php namespace App\Http\Interfaces\Admin;

interface DonationRequestInterface {

    public function index($dataTable);
  

    public function show($donation);
    
    public function delete($donation);
    
}

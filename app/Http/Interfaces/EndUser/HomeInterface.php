<?php



namespace App\Http\Interfaces\EndUser;
interface HomeInterface
{
public function index();
public function getDonationById($donation);
public function search($request);
public function getAllDonations();
}


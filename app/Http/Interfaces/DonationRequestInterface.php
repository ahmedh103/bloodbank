<?php



namespace App\Http\Interfaces;
interface DonationRequestInterface{

public function saveDonationRequest($request);

public function getAllDonationRequests();

public function getDonationRequestById($id);

}
<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\DonationRequestInterface;
use App\Http\Requests\DonationRequest\saveDonationRequest;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{
    private $donationInterface;

    public function __construct(DonationRequestInterface $donation)
    {
        $this->donationInterface = $donation;
    }
    public function saveDonationRequest(saveDonationRequest $request)
    {
        return $this->donationInterface->saveDonationRequest($request);
    }
    public function getAllDonationRequests()
    {
        return $this->donationInterface->getAllDonationRequests();
    }
    public function getDonationRequestById( $id)
    {
        return $this->donationInterface->getDonationRequestById($id);
    }
}

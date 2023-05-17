<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\HomeInterface;
use App\Http\Traits\PostTrait;
use App\Models\DonationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  private $homeInterface;

  public function __construct(HomeInterface $homeInterface)
  {
    $this->homeInterface =$homeInterface;
  }


    public function index()
    {

           return $this->homeInterface->index();

    }

    public function  getDonationById(DonationRequest $donation){

            return $this->homeInterface->getDonationById($donation);

    }
    public function search(Request $request)
    {
 
      return  $this->homeInterface->search($request);

    }

    public function getAllDonations(){

      return $this->homeInterface->getAllDonations();

    }
}

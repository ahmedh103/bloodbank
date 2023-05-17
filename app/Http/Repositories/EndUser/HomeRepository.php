<?php namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\HomeInterface;
use App\Http\Traits\BloodTypeTrait;
use App\Http\Traits\CityTrait;
use App\Http\Traits\PostTrait;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class HomeRepository implements HomeInterface {

use PostTrait,CityTrait,BloodTypeTrait;
    public function index()
     {
        $posts = $this->getPosts();
         $donation_requests = DonationRequest::with(['city','bloodType'])->get();   
        $blood_types = $this->getBloodTypes();
        $cities = $this->getCities();

        return view('EndUser.home',compact('posts','donation_requests','blood_types','cities'));
     }

     public function getDonationById($donation)
     {
        return view('EndUser.pages.DonationRequest.donationrequest',compact('donation'));
     }

     public function search($request){
       $posts = $this->getPosts();
       $blood_types = $this->getBloodTypes();
       $cities = $this->getCities();
         $donation_requests = DonationRequest::query()
        ->where('blood_type_id', "{$request->blood_type_id}") 
        ->orWhere('city_id',  "{$request->city_id}") 
        ->get();
    
        return view('EndUser.home',compact('posts','donation_requests','blood_types','cities'));
     }


     public function getAllDonations(){

      $donation_requests = DonationRequest::with(['city','bloodType'])->paginate(4);   
      return view('EndUser.pages.DonationRequest.alldonationrequest',compact('donation_requests'));
     }
    }
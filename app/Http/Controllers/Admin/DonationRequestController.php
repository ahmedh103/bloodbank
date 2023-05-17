<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DonationRequestDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\DonationRequestInterface;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{
    private $donationInterface;
  public  function __construct(DonationRequestInterface $donationInterface)
  {
   $this->donationInterface = $donationInterface;
    
  }  
        
    
    
    public function  index(DonationRequestDataTable $dataTable){
      return  $this->donationInterface->index($dataTable);
       
    }

    public function  delete(DonationRequest $donation){
        $this->donationInterface->delete($donation);
        toast('Donation Delete' , 'success');
        return back();
    }

}

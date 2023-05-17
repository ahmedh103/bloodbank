<?php namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\DonationRequestInterface;
use App\Http\Traits\PermissionTrait;
use App\Models\DonationRequest;
use App\Models\Role;

class DonationRequestRepository implements DonationRequestInterface {

    private $donationModel;

    public function __construct(DonationRequest $donationModel) {
        $this->donationModel=$donationModel;
    }


    public function index($dataTable) {

       // return $dataTable->render('Admin.pages.Donation_Request.index');
    return     $dataTable->render('Admin.pages.Donation_Request.index');

    }


   

    public function show($donation)
    {
      
    }

    

    public function delete($donation)
    {
    $donation->delete();
    

    }

}

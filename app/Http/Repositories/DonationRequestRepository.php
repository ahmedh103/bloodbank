<?php namespace App\Http\Repositories;


use App\Http\Interfaces\DonationRequestInterface;
use App\Http\Traits\apiResponseTrait;

use App\Models\DonationRequest;
use App\Models\Token;

use function App\Http\Helpers\notifyByFirebase;

class DonationRequestRepository implements DonationRequestInterface {
    private $donationModel;
    use apiResponseTrait;

    public function __construct(DonationRequest $donation) 
    {
        $this->donationModel=$donation;
    }

    public function saveDonationRequest($request) 
    {
        $donationRequest=$request->user()->donationRequests()->create($request->all());
        $clientsId=$donationRequest->city->governorate->clients()->whereHas('bloodtypes'
            ,function($q) use ($request) {
                $q->where('blood_types.id', $request->blood_type_id);
            }
        )->pluck('clients.id')->toArray();

        if (count($clientsId)) {
            $notification=$donationRequest->notifications()->create([ 'title'=> 'يوجد حالة تبرع قريبة منك  ',
                'content'=> $donationRequest->bloodType -> name . 'محتاج متبرع لفصيلة',
                ]);
            $notification->clients()->attach($clientsId);

            $tokens=Token::whereIn('client_id', $clientsId)->where('token', '!=', null)->pluck('token')->toArray();
            if(count($tokens)) {

                $title=$notification->title;
                $body=$notification->content;
                $data=[ 
                  'donation_request_id'=>$donationRequest->id,
                      ];
                $send = notifyByFirebase($title, $body, $tokens, $data);

            }
        }

        $this->apiResponse(1, 'success', $donationRequest);
    }

    public function getAllDonationRequests()
    {
        $getDonations = $this->donationModel::with('city')->paginate(10);
        return $this->apiResponse(1,'success',$getDonations);
    }
    public function getDonationRequestById($donationrequest)
    {
        $getById = $this->donationModel::find($donationrequest);
        return $this->apiResponse(1,'success',$getById);
    }



}

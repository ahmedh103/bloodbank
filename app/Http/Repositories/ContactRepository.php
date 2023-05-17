<?php

namespace App\Http\Repositories;


use App\Http\Interfaces\ContactInterface;
use App\Http\Traits\apiResponseTrait;
use App\Models\Contact;

class ContactRepository implements ContactInterface{
    private $contactModel;
use apiResponseTrait;

    public function   __construct(Contact $contact)
        {
             $this->contactModel = $contact;
        }
    public function saveContact($request)
        {
            $contact =  $this->contactModel::create($request->all());
            return $this->apiResponse(1,'success',$contact);
        }

}
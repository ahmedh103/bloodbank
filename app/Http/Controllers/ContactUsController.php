<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ContactInterface;
use App\Http\Requests\Contact\saveContactRequest;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    
    private $contactInterface;
    public function __construct(ContactInterface $contact)
    {
        $this->contactInterface = $contact;
    }

    public function saveContacts(saveContactRequest $request)
    {
    return $this->contactInterface->saveContact($request);
    }

}

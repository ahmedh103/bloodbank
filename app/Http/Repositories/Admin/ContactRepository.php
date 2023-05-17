<?php namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\ContactInterface;
use App\Models\Contact;

class ContactRepository implements ContactInterface {
    private $contactModel;

    public function __construct(Contact $contact) {
        $this->contactModel=$contact;
    }

    public function index()
    {
        $contacts =$this->contactModel::paginate(10);   
        return view('Admin.pages.contact.index',compact('contacts'));

    }

    public function delete($contact)
    {
    $contact->delete();
    return response()->json([
        'success' => 'Record deleted successfully!'
    ]);
    }

}

<?php namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\ClientInterface;
use App\Jobs\ActiveClientStatusJob;
use App\Models\Client;

class ClientRepository implements ClientInterface {
    private $clientModel;

    public function __construct(Client $client) {
        $this->clientModel=$client;
    }

    public function index()
    {
        $clients =$this->clientModel::with('bloodType')->paginate(10);   
        return view('Admin.pages.client.index',compact('clients'));

    } 

    public function delete($client)
    {
    $client->delete();
    return response()->json([
    'success' => 'Record deleted successfully!'
    ]);
    }



    public function approve($client)
    {
    $client->update(["status" => 1]);
    toast('Message Approved Successfully', 'success');
    return redirect(route("client.index"));
    }


    public function reject($client)
    {
    $client->update(["status" => 0]);
    toast('Message Rejected Successfully', 'success');
    return redirect(route("client.index"));
    }

    public function makeAllStatusActive()
    {

        $client_ids = Client::where('status',0)->pluck('id');
        ActiveClientStatusJob::dispatch($client_ids);
        toast(' تم  التحميل بنجاح', 'success');
        return redirect(route("client.index"));
    }
}
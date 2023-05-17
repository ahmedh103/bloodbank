<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\ClientInterface;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $clientInterface;

   
    public function __construct(ClientInterface $clientInterface)
    {
        $this->clientInterface = $clientInterface;
    }

    public function index()
    {
        return $this->clientInterface->index();
    }

    public function delete( Client $client)
    {
        return $this->clientInterface->delete($client);
    }

    public function approve(Client $client)
    {
        return $this->clientInterface->approve($client);
    }
    
    public function reject(Client $client)
    {
        return $this->clientInterface->reject($client);
    }
    public function makeAllStatusActive()
    {
        return $this->clientInterface->makeAllStatusActive();
    }
}

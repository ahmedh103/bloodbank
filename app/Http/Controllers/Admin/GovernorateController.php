<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\GovernorateInterface;
use App\Http\Requests\Governorate\StoreGovernorateRequest;
use App\Models\Governorate;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    private $governorateInterface;
    public function __construct(GovernorateInterface $governorateInterface)
    {
        $this->governorateInterface = $governorateInterface;
    }

    public function index()
    {
    return  $this->governorateInterface->index();
    }

    public function create()
    {
        return  $this->governorateInterface->create();
    }

    public function store(StoreGovernorateRequest $request)
    {
     return $this->governorateInterface->store($request);
    }

    public function edite(Governorate  $governorate)
    {
      return $this->governorateInterface->edite($governorate);
    }

    public function update(StoreGovernorateRequest $request , Governorate $governorate)
    {
      return $this->governorateInterface->update($request,$governorate);
    }
    
    public function delete( Governorate $governorate)
    {
      return $this->governorateInterface->delete($governorate);
    }
}

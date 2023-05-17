<?php namespace App\Http\Repositories;

use App\Http\Interfaces\BloodTypeInterface;
use App\Http\Interfaces\PostInterface;
use App\Http\Traits\apiResponseTrait;
use App\Models\BloodType;
use App\Models\Post;

class BloodTypeRepository implements BloodTypeInterface {
    private $bloodTypeInterface;
    use apiResponseTrait;

    public function __construct(BloodType $bloodType) {

        $this->bloodTypeInterface=$bloodType;

    }

    public function getBloodType($request) {

        $bloodtypes=$this->bloodTypeInterface::get();
        return $this->apiResponse(1, 'success', $bloodtypes);


    }







}

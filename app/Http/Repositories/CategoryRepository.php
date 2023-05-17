<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\CategoryInterface;
use App\Http\Interfaces\GovernorateInterface;
use App\Http\Traits\apiResponseTrait;
use App\Models\Category;
use App\Models\Governorate;

class CategoryRepository implements CategoryInterface{
    private $categoryModel;
use apiResponseTrait;

    public function   __construct(Category $category)
        {
             $this->categoryModel = $category;
        }
    public function getCategory()
    {
    $category =  $this->categoryModel::get();
    return $this->apiResponse(1,'success',$category);
    }

}
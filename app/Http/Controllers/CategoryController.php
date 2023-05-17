<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\CategoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryInterface;

    public function __construct(CategoryInterface $category)
    {
        $this->categoryInterface = $category;
    }

    public function getCategory()
    {
        return $this->categoryInterface->getCategory();
    }
}

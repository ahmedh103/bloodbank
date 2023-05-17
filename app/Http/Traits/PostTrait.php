<?php

namespace App\Http\Traits;

use App\Models\Category;
use App\Models\Governorate;
use App\Models\Post;

trait PostTrait
{

    private function getPostByCategory()
    {
        return Category::get(['id','name']);
    }
    
    private function getPosts()
    {
        return Post::get();
    }

}
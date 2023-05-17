<?php

namespace App\Http\Traits;

use App\Models\Category;
use Illuminate\Support\Facades\Redis;

trait CategoryRadisTrait
{

    private function  setCategoryInRedis():bool
    {

   $redis =  Redis::connection();
   $catigories =  Category::get();
   $redis->set('categories',$catigories);
   return true;
    }

    private function getCategoryFromRedis()
    {
        $redis = Redis::connection();
        $data = $redis->get('(categories)');
        $getAllcategories =  Category::get();
        return empty($data) ?  $getAllcategories :$data;
    }
    
}
<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\PostInterface;
use App\Http\Requests\Post\postFavouriteRequest;
use App\Http\Traits\apiResponseTrait;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use apiResponseTrait;
    private $postInterface;

    public function __construct(PostInterface $postInterface)
     {
       $this->postInterface = $postInterface;
     }
    public function  postFavorite(postFavouriteRequest $request)
    {
    $toggle = $this->postInterface->postFavorite($request);

    return $this->apiResponse(1,'scuess',$toggle);

    }
}

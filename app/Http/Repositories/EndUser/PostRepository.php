<?php namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\PostInterface;
use App\Http\Interfaces\EndUser\RegisterInterface;
use App\Http\Traits\RegisterTrait;
use App\Models\Client;
use App\Models\Post;

class PostRepository implements PostInterface {
    
    private $postModel;

    public function __construct(Post $postModel) 
    {
        $this->postModel=$postModel;
    }
    public function postFavorite($request)
    {
        $request->user()->posts()->toggle($request->post_id);
    }
}
<?php namespace App\Http\Repositories;

use App\Http\Interfaces\PostInterface;
use App\Http\Traits\apiResponseTrait;

use App\Models\Post;

class PostRepository implements PostInterface {
    private $postInterface;
    use apiResponseTrait;

    public function __construct(Post $post) 
    {
        $this->postInterface=$post;
    }

    public function getPost() 
    {
        $post=$this->postInterface::with('category')->paginate(10);
        return $this->apiResponse(1, 'success', $post);
    }


    public function getPostById($post)
    {
         $getPostById = $this->postInterface::with('category')->find($post);
        return $this->apiResponse(1, 'success', $getPostById);
    }
}
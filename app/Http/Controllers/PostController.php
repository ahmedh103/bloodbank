<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\PostInterface;
use App\Http\Requests\Post\postFavouriteRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private $postInterface;

    public function __construct(PostInterface $post)
    {
        $this->postInterface = $post;
    }

    public function getPost()
    {
        return $this->postInterface->getPost();
    }

    public function getPostById(Post $post)
    {
        return $this->postInterface->getPostById($post);
    }
    
}

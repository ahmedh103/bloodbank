<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\PostInterface;
use App\Http\Requests\Post\savePostRequest;
use App\Http\Requests\Post\updatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postInterface;

    public function __construct(PostInterface $postInterface)
    {
        $this->postInterface = $postInterface;
    }

    public function index(){
    return    $this->postInterface->index();
    }

    public function create()
    {
        return    $this->postInterface->create();
    }

    public function store(savePostRequest $request)
    {
     return $this->postInterface->store($request);
    }

     public function edite(Post  $post)
    {
      return $this->postInterface->edite($post);
    }

    public function update(updatePostRequest $request , Post $post)
    {
      return $this->postInterface->update($request,$post);
    }
    
    public function delete( Post $post)
    {
      return $this->postInterface->delete($post);
     }

       
}

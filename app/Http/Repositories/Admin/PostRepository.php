<?php namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\CityInterface;
use App\Http\Interfaces\Admin\PostInterface;
use App\Http\Traits\CityTrait;
use App\Http\Traits\ImageTrait;
use App\Http\Traits\PostTrait;
use App\Models\City;
use App\Models\Post;

class PostRepository implements PostInterface {
use PostTrait,ImageTrait;
    private $postModel;

    public function __construct(Post $post) {
        $this->postModel=$post;
    }
    public function index() {
        $posts =$this->postModel::with('category')->get([ 
        'id',
        'title',
        'image',
        'category_id'
                ]);
        return view('Admin.pages.posts.index', compact('posts'));
    }

    public function create() 
    {
        $categories = $this->getPostByCategory();
        return view('Admin.pages.posts.create',compact('categories'));
    }

    public function store($request) 
    {
        $postImage = $this->uploadImage($request->image, $this->postModel::PATH);
        $this->postModel::create([
            'title'=> $request->title,
            'image'=> $postImage,
            'category_id'=> $request->category_id
        ]);
        toast('Post Added Successfully', 'success');
        return redirect(route('post.index'));

    }

    public function edite($post)
    {
        $categories = $this->getPostByCategory();
        return view('Admin.pages.posts.edit',compact('post','categories'));
    }

public function update($request, $post)
{
    if ($request->image) {
        $postImage = $this->uploadImage($request->image, $this->postModel::PATH, $post->getRawOriginal('image'));
    }
    $post->update([
        'title'=> $request->title,
        'image'=> $postImage ?? $post->getRawOriginal('image'),
        'category_id'=> $request->category_id
    ]);
    toast('Post updated successfully','success');
    return redirect(route('post.index'));
}

public function delete($post)
{
    $post->delete();
    toast('Post Deleted Successfully', 'success');
    return back();
}

}

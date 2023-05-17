<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\CategoryInterface;
use App\Http\Requests\Category\storeCategoryRequest;
use App\Http\Requests\Category\updateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }

    public function index()
    {

      $categories =  $this->categoryInterface->index();
      return view('Admin.pages.category.index', compact('categories'));
    }

    public function create()
    {
          $this->categoryInterface->create();
        return view('Admin.pages.category.create');
    }

    public function store(storeCategoryRequest $request)
    {
         $this->categoryInterface->store($request);
        toast('Category Added Successfully', 'success');
        return redirect(route('category.index'));

    }

    public function edite(Category  $category)
    {

        $this->categoryInterface->edite($category);
        return view('Admin.pages.category.edit', compact('category'));
    }

    public function update(updateCategoryRequest $request , Category $category)
    {
         $this->categoryInterface->update($request,$category);
        toast('Category updated successfully', 'success');
        return redirect(route('category.index'));
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id); // abort(404)
        //dd($category);
      $this->categoryInterface->delete($category);
      toast('Category Deleted Successfully', 'success');
      return back();
    }

      
}

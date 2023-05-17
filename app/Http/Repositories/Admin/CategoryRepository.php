<?php namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\CategoryInterface;
use App\Http\Traits\CategoryRadisTrait;
use App\Models\Category;



class CategoryRepository implements CategoryInterface {
    use CategoryRadisTrait;
    private $categoryModel;

    public function __construct(Category $category) {
        $this->categoryModel=$category;
    }

    public function index() 
    {
      return $this->getCategoryFromRedis();
      
    }

    public function create()
    {
       
    }

    public function store($request) {

        $this->categoryModel::create([ 
            'name'=> $request->name,
                ]);

        $this->setCategoryInRedis();
        toast('Category Added Successfully', 'success');
        return redirect(route('category.index'));

    }

    public function edite($category) {
        
    }

    public function update($request, $category) {
        $category->update([ 'name'=>$request->name,
            ]);
        $this->setCategoryInRedis();
       
    }

    public function delete($category) {
        
        $category->delete();
        $this->setCategoryInRedis();
 
    }

}

<?php

namespace App\Repositories;

use App\Category;
use App\Traits\uploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\CategoryContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class CategoryRepository extends BaseRepository implements CategoryContract{
    use uploadAble; 

    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listCategories(string $order = 'id', string $sort = 'desc', array $column = ['*'])
    {
        return $this->all($column, $order, $sort);
    }

    public function findCategoryById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        }catch(ModelNotFoundException $e){
            throw new ModelNotFoundException($e);
        }
    }

    public function createCategory(array $params)
    {
        try{
            $collection = collect($params);
            $image = null;

            if($collection->has('image') && ($params['image'] instanceof UploadedFile)){
                $image = $this->uploadOne($params['image'], 'categories');
            }

            $featured = $collection->has('featured') ? 1 : 0;
            $menu = $collection->has('menu') ? 1 : 0;

            $merge = $collection->merge(compact('menu', 'image', 'featured'));

            $category = new Category($merge->all());
            $category->save();

            return $category;
        }catch(QueryException $exception){
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateCategory(array $params)
    {
        $category = $this->findCategoryById($params['id']);

        $collection = collect($params)->except('_token');

        if($collection->has('image') && ($params['image'] instanceof UploadedFile)){
            if($category->image != null){
                $this->deleteOne($category->image);
            }

            $image = $this->uploadOne($params['image'], 'categories');
        }

        $featured = $collection->has('featured') ? 1 : 0;
        $menu = $collection->has('menu') ? 1 : 0;

        $merge = $collection->merge('menu', 'image', 'featured');

        $category->update($merge->all());
        return $category;
    }

    public function deleteCategory($id)
    {
        $category = $this->findCategoryById($id);

        if($category->image != null){
            $this->deleteOne($category->image);
        }

        $category->delete();

        return $category;
    }

    public function treeList()
    {
        return Category::orderByRaw('-name ASC')
            ->get()
            ->nest()
            ->listsFlattened('name');
    }

    public function findBySlug($slug)
    {
        return Category::with('products')
            ->where('slug', $slug)
            ->where('menu', 1)
            ->first();
    }
}
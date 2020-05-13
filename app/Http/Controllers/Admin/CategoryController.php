<?php

namespace App\Http\Controllers\Admin;


// use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\CategoryContract;
use App\Category;

class CategoryController extends BaseController
{
    protected $categoryRepository;

    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'ini category ya';
        $categories = $this->categoryRepository->listCategories();

        $this->setPageTitle('Categories', 'List of all categories');
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = $this->categoryRepository->listCategories('id', 'asc');
        $categories = $this->categoryRepository->treeList();

        $this->setPageTitle('Categories', 'Create Category');
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:255',
            'parent_id' => 'required|not_in:0',
            'image' => 'mimes:png,jpg,jpeg|max:1000'
        ]);

        $params = $request->except('_token');

        $category = $this->categoryRepository->createCategory($params);

        if(!$category){
            return $this->responseRedirectBack('Error occured while creating category.', 'error', true, true);
        }

        return $this->responRedirect('admin.categories.index', 'category added successfully', 'success', false, false);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $targetCategory = $this->categoryRepository->findCategoryById($id);
        // $categories = $this->categoryRepository->listCategories();
        $categories = $this->categoryRepository->treeList();

        $this->setPageTitle('Categories', 'Edit Category : ' . $targetCategory->name);
        return view('admin.categories.edit', compact('categories', 'targetCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:255',
            'parent_id' => 'required|not_in:0',
            'image' => 'mimes:png,jpg,jpeg|max:1000'
        ]);

        $params = $request->except('_token');

        $category = $this->categoryRepository->updateCategory($params);

        if(!$category){
            return $this->responseRedirectBack('Error occured while creating category.', 'error', true, true);
        }

        return $this->responRedirect('admin.categories.index', 'category added successfully', 'success', false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->deleteCategory($id);

        if(!$category){
            return $this->responseRedirectBack('error Occured while deleting category.', 'error', true, true);
        }

        return $this->responRedirect('admin.categories.index', 'category deleted successfully', 'success', false, false);
    }
}

<?php

namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;

// form validasi via formrequest
use App\Http\Requests\StoreProductFormRequest;

class ProductController extends BaseController
{
    protected $brandRepository;
    protected $categoryRepository;
    protected $productRepository;

    public function __construct(
        BrandContract $brandRepository,
        CategoryContract $categoryRepository,
        ProductContract $productRepository
    )
    {
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->listProducts();

        $this->setPageTitle('Products', 'Product Lists');
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        $this->setPageTitle('Products', 'Crete Product');
        return view('admin.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductFormRequest $request)
    {
        // dd($request->all());
        $params = $request->except('_token');
        $product = $this->productRepository->createProduct($params);

        if(!$product){
            return $this->responseRedirectBack('Error occured while creating product', 'error', true, true);
        }

        return $this->responRedirect('admin.products.index', 'Product added successfully', 'success', false, false);
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
        $product = $this->productRepository->findProductById($id);
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        $this->setPageTitle('Products', 'Edit Product');
        return view('admin.products.edit', compact('categories', 'brands', 'product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductFormRequest $request)
    {
        // dd($request->all());
        $params = $request->except('_token');

        $product = $this->productRepository->updateProduct($params);

        if(!$product){
            return $this->responseRedirectBack('Error occured while updating product', 'error', true, true);
        }

        return $this->responRedirect('admin.products.index', 'Product updated successfully', 'success', false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

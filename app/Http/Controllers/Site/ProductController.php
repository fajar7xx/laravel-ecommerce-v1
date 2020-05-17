<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Contracts\AttributeContract;
use Cart;

class ProductController extends Controller
{
    protected $productRepository;
    protected $attributeRepository;

    public function __construct(
        ProductContract $productRepository,
        AttributeContract $attributeContract
    )
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeContract;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = $this->productRepository->findProductBySlug($slug);
        $attributes = $this->attributeRepository->listAllAttributes();

        // dd($product);
        return view('site.pages.product', compact(
            'product',
            'attributes'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function addToCart(Request $request)
    {
        // dd($request->all());
        $product = $this->productRepository->findProductById($request->input('productId'));
        $options = $request->except(
            '_token',
            'productId',
            'price',
            'qty'
        );
        if(!$product->images){
            $productImage = $product->images->first()->full;
        }else{
            $productImage = null;
        }

        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options, $productImage);

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }
}

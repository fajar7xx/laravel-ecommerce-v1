<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\AttributeContract;

class AttributeController extends BaseController
{
    protected $attributeRepository;

    public function __construct(AttributeContract $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = $this->attributeRepository->listAllAttributes();
        $this->setPageTitle('Attributes', 'List of all attributes');

        return view('admin.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Attributes', 'Create Attribute');
        return view('admin.attributes.create');
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
            'code' => 'required',
            'name' => 'required',
            'frontend_type' => 'required'
        ]);

        $params = $request->except('_token');

        $attributes = $this->attributeRepository->createAttribute($params);

        if(!$attributes){
            return $this->responseRedirectBack('error occured while creating attributes.', 'error', true, true);
        }

        return $this->responRedirect('admin.attributes.index', 'attribute added succesfully.', 'success', false, false);
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
        $attribute = $this->attributeRepository->findAttributeById($id);

        $this->setPageTitle('Attributes', 'Edit Attribute: ' . $attribute->name);
        return view('admin.attributes.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'frontend_type' => 'required'
        ]);

        $params = $request->except('_token');

        $attribute
         = $this->attributeRepository->updateAttribute($params);

         if(!$attribute){
             return $this->responseRedirectBack('Error occured while updating attribute.', 'error', true, true);
         }

         return $this->responRedirect('admin.attributes.index','Attribute updated successfully', 'success', false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = $this->attributeRepository->deleteAttribute($id);

        if(!$attribute){
            return $this->responseRedirectBack('Error occured while deleting attribute.', 'error', true, true);
        }

        return $this->responRedirect('admin.attributes.index','Attribute deleted successfully', 'success', false, false);

    }
}

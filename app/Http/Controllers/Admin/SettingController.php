<?php

namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
use App\Setting;
use App\Traits\uploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\BaseController;

class SettingController extends BaseController
{
    use uploadAble;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'ini setting nya';
        $this->setPageTitle('Settings', 'Manage Settings');
        return view('admin.settings.index'); 
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
        //
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
        // dumping semua request nya
        // dd($request->all());
        if($request->has('site_logo') && ($request->file('site_logo') instanceof UploadedFile)){
            if(config('setings.site_logo') != null){
                $this->deleteOne(config('settings.site_logo'));
            }

            $logo = $this->uploadOne($request->file('site_logo'), 'img');
            Setting::set('site_logo', $logo);
        }elseif($request->has('site_favicon') && ($request->file('site_favicon') instanceof UploadedFile)){
            if(config('settings.site_favicon') != null){
                $this->deleteOne(config('settings.site_favicon'));
            }

            $favicon = $this->uploadOne($request->file('site_favicon'), 'img');
            Setting::set('site_favicon', $favicon);
        }else{
            $keys = $request->except('_token');

            foreach($keys as $key => $value){
                Setting::set($key, $value);
            }

            return $this->responseRedirectBack('Settings Update Succesfully.', 'success');
        }
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

<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Validator;
use Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Store;

class StoreController extends Controller 
{
    public function profile() 
    {
        $recordtoedit = Store::where('id', Auth::id())->first();
        return view('store.account.edit',compact('recordtoedit'));
    }

    public function profileUpdate(Request $request)
    {
        $recordtoupdate = Store::where('id', Auth::id())->first();

        $recordtoupdate->username=$request->username;
        $recordtoupdate->email=$request->email;
        if(isset($request->password)){
            $recordtoupdate->password=bcrypt($request->password);
        }
        $recordtoupdate->store_name=$request->store_name;
        if(isset($request->logo)) {
            $recordtoupdate->logo=$recordtoupdate->setLogoAttribute($request->logo);
        }
        if(isset($request->cover_image)) {
            $recordtoupdate->cover_image=$recordtoupdate->setCoverAttribute($request->cover_image);
        }
        $recordtoupdate->web_url=$request->web_url;
        $recordtoupdate->phone=$request->phone;
        $recordtoupdate->description=$request->description;

        $recordtoupdate->save();

        \Brian2694\Toastr\Facades\Toastr::success('لقد تم تهيئة الحساب بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('store.dashboard.index');
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
}

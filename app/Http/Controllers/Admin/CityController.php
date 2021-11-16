<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\Country;
use Brian2694\Toastr\Facades\Toastr;

class CityController extends Controller
{
    public function index()
    {
        $records = City::orderBy('created_at')->get();
        return view('admin.city.index',compact('records'));
    }

    public function create()
    {
        $countries = Country::all();

        $recordtoecreate = 0;
        return view('admin.city.create',compact('recordtoecreate','countries'));
    }

    public function store(Request $request)
    {
        $recordtostore = new City();

        $recordtostore->name=$request->name;
        $recordtostore->country_id=$request->country_id;
       
        $recordtostore->save();
        \Brian2694\Toastr\Facades\Toastr::success('لقد تم حفظ المستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.city.index');
    }

    public function show($id)
    {
        $record=City::findOrFail($id);
        return view('admin.city.show',compact('record'));
    }

    public function edit($id)
    {
        $countries = Country::all();

        $recordtoedit = City::where('id',$id)->first();
        return view('admin.city.edit',compact('recordtoedit','countries'));
    }

    public function update(Request $request, $id)
    {
        $recordtoupdate=City::where('id',$id)->first();

        $recordtoupdate->name=$request->name;
        $recordtoupdate->country_id=$request->country_id;

        $recordtoupdate->save();
        
        \Brian2694\Toastr\Facades\Toastr::success('لقد تم تعديل المستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.city.index');
    }

    public function destroy($id)
    {
        City::where('id',$id)->delete();
        \Brian2694\Toastr\Facades\Toastr::error('تم حذف مستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.city.index');

    }

}

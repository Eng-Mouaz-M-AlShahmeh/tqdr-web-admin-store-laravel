<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use Brian2694\Toastr\Facades\Toastr;

class CountryController extends Controller
{
    public function index()
    {
        $records = Country::orderBy('created_at')->get();
        return view('admin.country.index',compact('records'));
    }

    public function create()
    {
        $recordtoecreate = 0;
        return view('admin.country.create',compact('recordtoecreate'));
    }

    public function store(Request $request)
    {
        $recordtostore = new Country();

        $recordtostore->name=$request->name;
        $recordtostore->phone_code=$request->phone_code;
        $recordtostore->iso_2code=$request->iso_2code;
        $recordtostore->iso_3code=$request->iso_3code;
        if(isset($request->flag)){
            $recordtostore->flag=$recordtostore->setImageAttribute($request->flag);
        }
       
        $recordtostore->save();

        \Brian2694\Toastr\Facades\Toastr::success('لقد تم حفظ المستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.country.index');
    }

    public function show($id)
    {
        $record=Country::findOrFail($id);
        return view('admin.country.show',compact('record'));
    }

    public function edit($id)
    {
        $recordtoedit = Country::where('id',$id)->first();
        return view('admin.country.edit',compact('recordtoedit'));
    }

    public function update(Request $request, $id)
    {
        $recordtoupdate=Country::where('id',$id)->first();

        $recordtoupdate->name=$request->name;
        $recordtoupdate->phone_code=$request->phone_code;
        $recordtoupdate->iso_2code=$request->iso_2code;
        $recordtoupdate->iso_3code=$request->iso_3code;
        if(isset($request->flag)){
            $recordtoupdate->flag=$recordtoupdate->setImageAttribute($request->flag);
        }

        $recordtoupdate->save();
        
        \Brian2694\Toastr\Facades\Toastr::success('لقد تم تعديل المستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.country.index');
    }

    public function destroy($id)
    {
        Country::where('id',$id)->delete();
        \Brian2694\Toastr\Facades\Toastr::error('تم حذف مستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.country.index');

    }


}

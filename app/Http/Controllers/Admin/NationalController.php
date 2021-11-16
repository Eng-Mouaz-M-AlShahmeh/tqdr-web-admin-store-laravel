<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\National;
use Brian2694\Toastr\Facades\Toastr;

class NationalController extends Controller
{
    public function index()
    {
        $records = National::orderBy('created_at')->get();
        return view('admin.national.index',compact('records'));
    }

    public function create()
    {
        $recordtoecreate = 0;
        return view('admin.national.create',compact('recordtoecreate'));
    }

    public function store(Request $request)
    {
        $recordtostore = new National();

        $recordtostore->national_number=$request->national_number;
        if(isset($request->front_image)){
            $recordtostore->front_image=$request->front_image;
        }
        if(isset($request->back_image)){
            $recordtostore->back_image=$request->back_image;
        }
       
        $recordtostore->save();

        \Brian2694\Toastr\Facades\Toastr::success('لقد تم حفظ المستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.national.index');
    }

    public function show($id)
    {
        $record = National::findOrFail($id);
        return view('admin.national.show',compact('record'));
    }

    public function edit($id)
    {
        $recordtoedit = National::where('id',$id)->first();
        return view('admin.national.edit',compact('recordtoedit'));
    }

    public function update(Request $request, $id)
    {
        $recordtoupdate = National::where('id',$id)->first();

        $recordtoupdate->national_number=$request->national_number;
        if(isset($request->front_image)){
            $recordtoupdate->front_image=$request->front_image;
        }
        if(isset($request->back_image)){
            $recordtoupdate->back_image=$request->back_image;
        }

        $recordtoupdate->save();
        
        \Brian2694\Toastr\Facades\Toastr::success('لقد تم تعديل المستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.national.index');
    }

    public function destroy($id)
    {
        National::where('id',$id)->delete();
        \Brian2694\Toastr\Facades\Toastr::error('تم حذف مستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.national.index');
    }
}

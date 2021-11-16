<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\SocialLinks;
use Brian2694\Toastr\Facades\Toastr;

class SocialLinksController extends Controller
{
    public function index()
    {
        $records = SocialLinks::orderBy('created_at')->get();
        return view('admin.sociallinks.index',compact('records'));
    }

    public function create()
    {
        $recordtoecreate = 0;
        return view('admin.sociallinks.create',compact('recordtoecreate'));
    }

    public function store(Request $request)
    {
        $recordtostore = new SocialLinks();

        $recordtostore->facebook=$request->facebook;
        $recordtostore->twitter=$request->twitter;
        $recordtostore->instagram=$request->instagram;
        $recordtostore->linkedin=$request->linkedin;
        $recordtostore->youtube=$request->youtube;
       
        $recordtostore->save();

        \Brian2694\Toastr\Facades\Toastr::success('لقد تم حفظ المستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.sociallinks.index');
    }

    public function show($id)
    {
        $record=SocialLinks::findOrFail($id);
        return view('admin.sociallinks.show',compact('record'));
    }

    public function edit($id)
    {
        $recordtoedit = SocialLinks::where('id',$id)->first();
        return view('admin.sociallinks.edit',compact('recordtoedit'));
    }

    public function update(Request $request, $id)
    {
        $recordtoupdate=SocialLinks::where('id',$id)->first();

        $recordtoupdate->facebook=$request->facebook;
        $recordtoupdate->twitter=$request->twitter;
        $recordtoupdate->instagram=$request->instagram;
        $recordtoupdate->linkedin=$request->linkedin;
        $recordtoupdate->youtube=$request->youtube;

        $recordtoupdate->save();
        
        \Brian2694\Toastr\Facades\Toastr::success('لقد تم تعديل المستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.sociallinks.index');
    }

    public function destroy($id)
    {
        SocialLinks::where('id',$id)->delete();
        \Brian2694\Toastr\Facades\Toastr::error('تم حذف مستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.sociallinks.index');
    }
}

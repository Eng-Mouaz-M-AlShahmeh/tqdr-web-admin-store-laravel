<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\CommercialRegister;
use Brian2694\Toastr\Facades\Toastr;

class CommercialRegisterController extends Controller
{
    public function index()
    {
        $records = CommercialRegister::orderBy('created_at')->get();
        return view('admin.cr.index',compact('records'));
    }

    public function create()
    {
        $recordtoecreate = 0;
        return view('admin.cr.create',compact('recordtoecreate'));
    }

    public function store(Request $request)
    {
        $recordtostore = new CommercialRegister();

        $recordtostore->commercial_name=$request->commercial_name;
        $recordtostore->commercial_number=$request->commercial_number;
        $recordtostore->commercial_type=$request->commercial_type;
        $recordtostore->unified_number_of_facility=$request->unified_number_of_facility;
        $recordtostore->facility_type=$request->facility_type;
        $recordtostore->cr_state=$request->cr_state;
        $recordtostore->authorized_entity_for_activity=$request->authorized_entity_for_activity;
        $recordtostore->activity=$request->activity;
        $recordtostore->netaqat_cirtificate=$request->netaqat_cirtificate;
        $recordtostore->zaqat_certificate=$request->zaqat_certificate;
        $recordtostore->chamber_of_commerce_subscription=$request->chamber_of_commerce_subscription;
        $recordtostore->municipal_license=$request->municipal_license;
        $recordtostore->expired_at=$request->expired_at;
       
        $recordtostore->save();

        \Brian2694\Toastr\Facades\Toastr::success('لقد تم حفظ المستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.cr.index');
    }

    public function show($id)
    {
        $record=CommercialRegister::findOrFail($id);
        return view('admin.cr.show',compact('record'));
    }

    public function edit($id)
    {
        $recordtoedit = CommercialRegister::where('id',$id)->first();
        return view('admin.cr.edit',compact('recordtoedit'));
    }

    public function update(Request $request, $id)
    {
        $recordtoupdate=CommercialRegister::where('id',$id)->first();

        $recordtoupdate->commercial_name=$request->commercial_name;
        $recordtoupdate->commercial_number=$request->commercial_number;
        $recordtoupdate->commercial_type=$request->commercial_type;
        $recordtoupdate->unified_number_of_facility=$request->unified_number_of_facility;
        $recordtoupdate->facility_type=$request->facility_type;
        $recordtoupdate->cr_state=$request->cr_state;
        $recordtoupdate->authorized_entity_for_activity=$request->authorized_entity_for_activity;
        $recordtoupdate->activity=$request->activity;
        $recordtoupdate->netaqat_cirtificate=$request->netaqat_cirtificate;
        $recordtoupdate->zaqat_certificate=$request->zaqat_certificate;
        $recordtoupdate->chamber_of_commerce_subscription=$request->chamber_of_commerce_subscription;
        $recordtoupdate->municipal_license=$request->municipal_license;
        $recordtoupdate->expired_at=$request->expired_at;

        $recordtoupdate->save();
        
        \Brian2694\Toastr\Facades\Toastr::success('لقد تم تعديل المستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.cr.index');
    }

    public function destroy($id)
    {
        CommercialRegister::where('id',$id)->delete();
        \Brian2694\Toastr\Facades\Toastr::error('تم حذف مستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.cr.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use Brian2694\Toastr\Facades\Toastr;

class CustomerController extends Controller
{

    public function index()
    {
        $records = Customer::orderBy('created_at')->get();
        return view('admin.customer.index',compact('records'));
    }

    public function create()
    {
        $recordtoecreate = 0;
        return view('admin.customer.create',compact('recordtoecreate'));
    }

    public function store(Request $request)
    {
        $recordtostore = new Customer();
        $recordtostore->username=$request->username;
        $recordtostore->first_name=$request->first_name;
        $recordtostore->last_name=$request->last_name;
        $recordtostore->phone=$request->phone;
        $recordtostore->email=$request->email;
        if(isset($request->avatar)){
            $recordtostore->avatar=$request->avatar;
        }
        if($recordtostore->password!=$request->password){
            $recordtostore->password=bcrypt($request->password);
        }
        $recordtostore->save();
        \Brian2694\Toastr\Facades\Toastr::success('لقد تم حفظ المستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.customer.index');
    }

    public function show($id)
    {
        $record=Customer::findOrFail($id);
        return view('admin.customer.show',compact('record'));
    }

    public function edit($id)
    {
        $recordtoedit = Customer::where('id',$id)->first();
        return view('admin.customer.edit',compact('recordtoedit'));
    }

    public function update(Request $request, $id)
    {
        $recordtoupdate=Customer::where('id',$id)->first();
        $recordtoupdate->username=$request->username;
        $recordtoupdate->first_name=$request->first_name;
        $recordtoupdate->last_name=$request->last_name;
        $recordtoupdate->phone=$request->phone;
        $recordtoupdate->email=$request->email;
        if(isset($request->avatar)){
            $recordtoupdate->avatar=$recordtoupdate->setImageAttribute($request->avatar);
        }
        if(isset($request->password)){
            if($recordtoupdate->password!=$request->password){
            $recordtoupdate->password=bcrypt($request->password);
        }
        }
        $recordtoupdate->save();
        \Brian2694\Toastr\Facades\Toastr::success('لقد تم تعديل المستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.customer.index');
    }

    public function destroy($id)
    {
        Customer::where('id',$id)->delete();
        \Brian2694\Toastr\Facades\Toastr::error('تم حذف مستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.customer.index');

    }
}

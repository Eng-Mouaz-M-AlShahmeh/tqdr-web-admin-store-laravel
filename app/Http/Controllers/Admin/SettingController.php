<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{ 
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
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $recordtoedit = Setting::where('id',$id)->first();
        return view('admin.setting.edit',compact('recordtoedit'));
    }

    public function update(Request $request, $id)
    {
        // // Validate data
        // $data = $request->only('title');
        // $validator = Validator::make($data, [
        //     'title' => 'required|string',
        // ]);
        // // Send failed response if request is not valid
        // if ($validator->fails()) {
        //     \Brian2694\Toastr\Facades\Toastr::error(''.$validator->messages().'','',["positionClass" => "toast-top-right"]);
        //     return redirect()->back();
        // }

        $recordtoupdate=Setting::where('id',$id)->first();

        $recordtoupdate->title=$request->title;
        $recordtoupdate->main_dsc=$request->main_dsc;
        $recordtoupdate->admin_email=$request->admin_email;
        $recordtoupdate->header_email=$request->header_email;
        $recordtoupdate->smtp_host=$request->smtp_host;
        $recordtoupdate->smtp_port=$request->smtp_port;
        $recordtoupdate->email_encription=$request->email_encription;
        $recordtoupdate->smtp_user=$request->smtp_user;
        $recordtoupdate->smtp_pass=$request->smtp_pass;
        $recordtoupdate->api_key=$request->api_key;
        $recordtoupdate->about=$request->about;
        $recordtoupdate->privacy=$request->privacy;
        $recordtoupdate->terms=$request->terms;
        $recordtoupdate->admin_phone=$request->admin_phone;
        $recordtoupdate->admin_periods=$request->admin_periods;
        $recordtoupdate->admin_copyright=$request->admin_copyright;
        $recordtoupdate->admin_twitter=$request->admin_twitter;
        $recordtoupdate->admin_facebook=$request->admin_facebook;
        $recordtoupdate->admin_google_plus=$request->admin_google_plus;
        if(isset($request->tqdr_logo)){
            $recordtoupdate->tqdr_logo=$recordtoupdate->setImageAttribute($request->tqdr_logo);
        }
        // $recordtoupdate->tqdr_logo=$request->tqdr_logo;

        $recordtoupdate->save();
        
        \Brian2694\Toastr\Facades\Toastr::success('لقد تم تعديل الإعدادات بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->back();
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

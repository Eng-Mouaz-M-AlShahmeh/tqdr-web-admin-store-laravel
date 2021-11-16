<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;
use App\Models\City;
use App\Models\Country;
use App\Models\Nighborhood;
use App\Models\Store;
use Brian2694\Toastr\Facades\Toastr;

class AddressController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $cities = City::all();
        $nighborhoods = Nighborhood::all();
        $stores = Store::all();

        $records = Address::orderBy('created_at')->get();
        return view('admin.address.index',compact('records','countries','cities','nighborhoods','stores'));
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $nighborhoods = Nighborhood::all();
        $stores = Store::all();

        $recordtoecreate = 0;
        return view('admin.address.create',compact('recordtoecreate','countries','cities','nighborhoods','stores'));
    }

    public function store(Request $request)
    {
        $recordtostore = new Address();

        $recordtostore->building_number=$request->building_number;
        $recordtostore->street_name=$request->street_name;
        $recordtostore->postal_code=$request->postal_code;
        $recordtostore->longitude=$request->longitude;
        $recordtostore->latitude=$request->latitude;
        $recordtostore->zoom=$request->zoom;
        $recordtostore->country_id=$request->country_id;
        $recordtostore->city_id=$request->city_id;
        $recordtostore->nighborhood_id=$request->nighborhood_id;
        $recordtostore->store_id=$request->store_id;
       
        $recordtostore->save();

        \Brian2694\Toastr\Facades\Toastr::success('لقد تم حفظ المستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.address.index');
    }

    public function show($id)
    {
        $countries = Country::all();
        $cities = City::all();
        $nighborhoods = Nighborhood::all();
        $stores = Store::all();

        $record=Address::findOrFail($id);
        return view('admin.address.show',compact('record','countries','cities','nighborhoods','stores'));
    }

    public function edit($id)
    {
        $countries = Country::all();
        $cities = City::all();
        $nighborhoods = Nighborhood::all();
        $stores = Store::all();

        $recordtoedit = Address::where('id',$id)->first();
        return view('admin.address.edit',compact('recordtoedit','countries','cities','nighborhoods','stores'));
    }

    public function update(Request $request, $id)
    {
        $recordtoupdate=Address::where('id',$id)->first();

        $recordtoupdate->building_number=$request->building_number;
        $recordtoupdate->street_name=$request->street_name;
        $recordtoupdate->postal_code=$request->postal_code;
        $recordtoupdate->longitude=$request->longitude;
        $recordtoupdate->latitude=$request->latitude;
        $recordtoupdate->zoom=$request->zoom;
        $recordtoupdate->country_id=$request->country_id;
        $recordtoupdate->city_id=$request->city_id;
        $recordtoupdate->nighborhood_id=$request->nighborhood_id;
        $recordtoupdate->store_id=$request->store_id;

        $recordtoupdate->save();
        
        \Brian2694\Toastr\Facades\Toastr::success('لقد تم تعديل المستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.address.index');
    }

    public function destroy($id)
    {
        Address::where('id',$id)->delete();
        \Brian2694\Toastr\Facades\Toastr::error('تم حذف مستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.address.index');
    }
}

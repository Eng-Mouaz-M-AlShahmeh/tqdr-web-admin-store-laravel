<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\InvoiceOrder;

use App\Models\Invoice;
use App\Models\Store;
use App\Models\Customer;

use Brian2694\Toastr\Facades\Toastr; 

class InvoiceOrderController extends Controller
{
    public function index()
    {
        $records = InvoiceOrder::orderBy('created_at')->get();
        return view('admin.invoiceorder.index',compact('records'));
    }

    public function create()
    {
        $invoices = Invoice::all();
        $stores = Store::all();
        $customers = Customer::all();

        $recordtoecreate = 0;
        return view('admin.invoiceorder.create',compact('recordtoecreate','invoices','stores','customers'));
    }

    public function store(Request $request)
    {
        $recordtostore = new InvoiceOrder();

        $recordtostore->customer_phone=$request->customer_phone;
        $recordtostore->invoice_id=$request->invoice_id;
        $recordtostore->store_id=$request->store_id;
       
        $recordtostore->save();

        \Brian2694\Toastr\Facades\Toastr::success('لقد تم حفظ المستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.invoiceorder.index');
    }

    public function show($id)
    {
        $record=InvoiceOrder::findOrFail($id);
        return view('admin.invoiceorder.show',compact('record'));
    }

    public function edit($id)
    {
        $invoices = Invoice::all();
        $stores = Store::all();
        $customers = Customer::all();

        $recordtoedit = InvoiceOrder::where('id',$id)->first();
        return view('admin.invoiceorder.edit',compact('recordtoedit','invoices','stores','customers'));
    }

    public function update(Request $request, $id)
    {
        $recordtoupdate=InvoiceOrder::where('id',$id)->first();

        $recordtoupdate->customer_phone=$request->customer_phone;
        $recordtoupdate->invoice_id=$request->invoice_id;
        $recordtoupdate->store_id=$request->store_id;

        $recordtoupdate->save();
        
        \Brian2694\Toastr\Facades\Toastr::success('لقد تم تعديل المستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.invoiceorder.index');
    }

    public function destroy($id)
    {
        InvoiceOrder::where('id',$id)->delete();
        \Brian2694\Toastr\Facades\Toastr::error('تم حذف مستند بنجاح!','',["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.invoiceorder.index');
    }


}

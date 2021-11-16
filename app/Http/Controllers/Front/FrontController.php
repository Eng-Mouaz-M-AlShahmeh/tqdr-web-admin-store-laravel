<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Validator;
use Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use Session;
use App\Models\InvoiceOrder;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\Store;

class FrontController extends Controller 
{

    public function pay(Request $request)
    {
        // $this->validate($request, [
        //     'phone'         => 'required',
        //     'amount'        => 'required',
        //     'store'         => 'required',
        //     'order_number'  => 'required',
        // ]);

        // dd($request->store);

        if($request->phone === null) {
            Session::forget('errorpay');
            $errorpayval = 'رقم الجوال مطلوب!';
            Session::put('errorpay', $errorpayval);
            return redirect()->back();
        }

        if($request->amount === null) {
            Session::forget('errorpay');
            $errorpayval = 'المبلغ مطلوب!';
            Session::put('errorpay', $errorpayval);
            return redirect()->back();
        }

        if($request->store === null) {
            Session::forget('errorpay');
            $errorpayval = 'اختيار الشريك (المتجر) مطلوب!';
            Session::put('errorpay', $errorpayval);
            return redirect()->back();
        }

        if($request->order_number === null) {
            Session::forget('errorpay');
            $errorpayval = 'رقم الإيصال مطلوب!';
            Session::put('errorpay', $errorpayval);
            return redirect()->back();
        }

        if($request->amount > 500) {
            Session::forget('errorpay');
            $errorpayval = 'عذراً مبلغ الطلب لا يمكن أن يكون أكثر من 500 ريال للعملية الواحدة';
            Session::put('errorpay', $errorpayval);
            // \Brian2694\Toastr\Facades\Toastr::error( 'عذراً مبلغ الطلب لا يمكن أن يكون أكثر من 500 ريال للعملية الواحدة!','',["positionClass" => "toast-top-right"] );
            return redirect()->back();
        }

        foreach(\App\Models\Invoice::all() as $invoice) {
            if($invoice->id == $request->order_number) {
                if($invoice->is_paid == 1) {
                    Session::forget('errorpay');
                    $errorpayval = 'عذراً لم يعد هذا الإيصال صالح لإجراء العملية';
                    Session::put('errorpay', $errorpayval);
                    // \Brian2694\Toastr\Facades\Toastr::error( 'عذراً لم يعد هذا الإيصال صالح لإجراء العملية!','',["positionClass" => "toast-top-right"] );
                    return redirect()->back();
                } else { 
                    if($request->amount > $invoice->amount && $request->amount > $invoice->remaining_amount) {
                        Session::forget('errorpay');
                        $errorpayval = 'عذراً المبلغ الموجود في الإيصال غير كافٍ لعملية الدفع!';
                        Session::put('errorpay', $errorpayval);
                        return redirect()->back();
                    } else if($invoice->remaining_amount > 0 && $request->amount <= $invoice->remaining_amount) {
                        // update remaining_amount
                        $recordtoupdate=Invoice::where('id',$invoice->id)->first();
                        if($recordtoupdate->remaining_amount - $request->amount == 0) {
                            $recordtoupdate->is_paid = 1;
                            $recordtoupdate->status = 0;
                        }
                        $recordtoupdate->remaining_amount=$recordtoupdate->remaining_amount - $request->amount;
                        $recordtoupdate->save();
                        // update remaining_amount end
                        // save customer phone
                        if(Customer::where('phone', $request->phone)->exists() === false) {
                            $recordtostore1 = new Customer();
                            $recordtostore1->phone=$request->phone;
                            $recordtostore1->save();
                        }
                        // save customer phone end
                        // save invoice order
                        $recordtostore = new InvoiceOrder();
                        $recordtostore->amount=$request->amount;   
                        $recordtostore->customer_phone=$request->phone;
                        $recordtostore->store_id=$request->store;
                        $recordtostore->invoice_id=$request->order_number;
                        $recordtostore->save();
                        // save invoice order end
                        Session::forget('errorpay');
                        // العملية ناجحة
                        // إرسال إيميلات ورسائل جوال
                        return redirect()->route( 'front.paysuccess' , $recordtostore->id);
                    } else if($invoice->remaining_amount == 0 && $request->amount <= $invoice->amount) {
                        // update remaining_amount
                        $recordtoupdate=Invoice::where('id',$invoice->id)->first();
                        if($recordtoupdate->amount - $request->amount == 0) {
                            $recordtoupdate->is_paid = 1;
                            $recordtoupdate->status = 0;
                        } else if($recordtoupdate->amount - $request->amount > 0) {
                            $recordtoupdate->remaining_amount=$recordtoupdate->amount - $request->amount;
                            $recordtoupdate->is_paid = 0;
                        }
                        $recordtoupdate->save();
                        // update remaining_amount end
                        // save customer phone
                        if(Customer::where('phone', $request->phone)->exists() === false) {
                            $recordtostore1 = new Customer();
                            $recordtostore1->phone=$request->phone;
                            $recordtostore1->save();
                        }
                        // save customer phone end
                        // save invoice order
                        $recordtostore = new InvoiceOrder();
                        $recordtostore->amount=$request->amount;   
                        $recordtostore->customer_phone=$request->phone;
                        $recordtostore->store_id=$request->store;
                        $recordtostore->invoice_id=$request->order_number;
                        $recordtostore->save();
                        // save invoice order end
                        Session::forget('errorpay');
                        // العملية ناجحة
                        // إرسال إيميلات ورسائل جوال
                        return redirect()->route( 'front.paysuccess' , $recordtostore->id);
                    } else {
                        Session::forget('errorpay');
                        $errorpayval = 'عذراً المبلغ الموجود في الإيصال غير كافٍ لعملية الدفع!';
                        Session::put('errorpay', $errorpayval);
                        return redirect()->back();
                    }
                    
                } 
            } else {
                // Session::forget('errorpay');
                // // \Brian2694\Toastr\Facades\Toastr::error( 'عذراً لم يتم العثور على رقم الإيصال!','',["positionClass" => "toast-top-right"] );
                // return redirect()->back();
            }
        }

        Session::forget('errorpay');
        $errorpayval = 'عذراً لم يتم العثور على رقم الإيصال';
        Session::put('errorpay', $errorpayval);
        return redirect()->back();
    }

    function paysuccess($id)
    {
        $invoiceorder = InvoiceOrder::where('id',$id)->first();
        return view('front.successpayment',compact('invoiceorder'));
    }

    function storepay($id)
    {
        $store = Store::where('id',$id)->first();
        // $invoiceorder = InvoiceOrder::where('id',$id)->first();
        return view('front.storepay',compact('store'));
    }

    function adminLogin()
    {
        return view('admin.account.login');
    }

    function adminCheckLogin(Request $request)
    {
        
        $this->validate($request, [
            'email'           => 'required|email',
            'password'        => 'required|alphaNum|min:6',
        ]);

        $user_data = array(
            'email'           => $request->get('email'),
            'password'       => $request->get('password'),
        );


        // if( Auth::attempt($user_data) ) {
        //     switch(Auth::user()->admType) {
        //         case(1):
        //             return redirect()->route( 'adminSuccessLogin' );
        //             break;
        //         case(2):            
        //             return redirect()->route( 'storeSuccessLogin' ); 
        //             break;
        //         default:
        //             return null;
        //     }
        // } else {
        //     \Brian2694\Toastr\Facades\Toastr::error( 'الايميل أو كلمة المرور لا تتطابق مع السجلات!','',["positionClass" => "toast-top-right"] );
        //     return redirect()->back();
        // }
        

        if( Auth::guard('admin')->attempt($user_data) ) 
        {
            return redirect()->route( 'adminSuccessLogin' );
            // if(Auth::user()->admType == 1) {
            //     return redirect()->route( 'adminSuccessLogin' );
            // } else if(Auth::user()->admType == 2) {
            //     return redirect()->route( 'storeSuccessLogin' );
            // }  
        } 
        
        else if( Auth::guard('store')->attempt($user_data) ) 
        {
            return redirect()->route( 'storeSuccessLogin' );
        }

        else 
        {
            \Brian2694\Toastr\Facades\Toastr::error( 'الايميل أو كلمة المرور لا تتطابق مع السجلات!','',["positionClass" => "toast-top-right"] );
            return redirect()->back();
        }

    }

    function adminSuccessLogin()
    {
        return view('admin.dashboard.index');
    }

    function adminLogout()
    {
        Auth::guard('admin')->logout();

        Auth::logout();

        return redirect()->route('front.index');
    }




    //...................................

    // function storeLogin()
    // {
    //     return view('store.account.login');
    // }
    // function storeCheckLogin(Request $request)
    // {
    //     return view('store.dashboard.index');
    //     // $this->validate($request, [
    //     //     'username'           => 'required',
    //     //     'password'        => 'required|alphaNum|min:6',
    //     // ]);
    //     // $user_data = array(
    //     //     'username'           => $request->get('username'),
    //     //     'password'        => $request->get('password'),
    //     // );
    //     // if(Auth::attempt($user_data)) 
    //     // {
    //     //     return redirect()->route('storeSuccessLogin', app()->getLocale());
    //     // }
    //     // else 
    //     // {
    //     //     return back()->with('error', 'Wrong Login Details');
    //     // }
    // }

    function storeSuccessLogin()
    {
        return view('store.dashboard.index');
    }

    function storeLogout()
    {
        Auth::guard('admin')->logout();
        Auth::logout();
        return redirect()->route('front.index');

        // Auth::logout();
        // return redirect()->route('front.index', app()->getLocale());
    }

    //...........................

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

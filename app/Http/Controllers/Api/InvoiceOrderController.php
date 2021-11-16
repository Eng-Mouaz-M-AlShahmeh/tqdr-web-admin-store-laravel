<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\InvoiceOrder;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class InvoiceOrderController extends Controller
{
    protected $admin;
 
    public function __construct()
    {
        $this->admin = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $invoiceOrder = InvoiceOrder::all();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $invoiceOrder
        ], Response::HTTP_OK);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->only(
            'customer_phone',  
            'invoice_id',  
            'store_id', 
        );

        $invoiceOrder = new InvoiceOrder;

        $invoiceOrder->customer_phone = $request->customer_phone;
        $invoiceOrder->invoice_id = $request->invoice_id;
        $invoiceOrder->store_id = $request->store_id;
      
        $invoiceOrder->save();

        return response()->json([
            'success' => true,
            'message' => 'Invoice Order created successfully',
            'data' => $invoiceOrder
        ], Response::HTTP_OK);
    }


    public function show($id)
    {
        $invoiceOrder = InvoiceOrder::find($id);
    
        if (!$invoiceOrder) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Invoice Order not found.'
            ], 400);
        }
    
        return $invoiceOrder;
    }


    public function edit(InvoiceOrder $invoiceOrder)
    {}


    public function update(Request $request, $id)
    {
        $data = $request->only(
            'customer_phone',  
            'invoice_id',  
            'store_id', 
        );

        $invoiceOrder = InvoiceOrder::where('id', $id)->update([
            'customer_phone' => $request->customer_phone,  
            'invoice_id' => $request->invoice_id,  
            'store_id' => $request->store_id, 
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Invoice Order updated successfully',
            'data' => $invoiceOrder
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        InvoiceOrder::where('id',$id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Invoice Order deleted successfully'
        ], Response::HTTP_OK);
    }
}

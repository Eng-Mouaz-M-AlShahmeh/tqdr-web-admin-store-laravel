<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Invoice;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller 
{
    protected $admin;
 
    public function __construct()
    {
        $this->admin = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $invoice = Invoice::all();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $invoice
        ], Response::HTTP_OK);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->only(
            'amount',  
            'remaining_amount',  
            'is_paid', 
            'service_provider_id', 
        );

        $invoice = new Invoice;

        $invoice->amount = $request->amount;
        $invoice->remaining_amount = $request->remaining_amount;
        $invoice->is_paid = $request->is_paid;
        $invoice->service_provider_id = $request->service_provider_id;
      
        $invoice->save();

        return response()->json([
            'success' => true,
            'message' => 'Invoice created successfully',
            'data' => $invoice
        ], Response::HTTP_OK);
    }


    public function show($id)
    {
        $invoice = Invoice::find($id);
    
        if (!$invoice) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Invoice not found.'
            ], 400);
        }
    
        return $invoice;
    }


    public function edit(Invoice $invoice)
    {}


    public function update(Request $request, $id)
    {
        $data = $request->only(
            'amount',  
            'remaining_amount',  
            'is_paid', 
            'service_provider_id', 
        );

        $invoice = Invoice::where('id', $id)->update([
            'amount' => $request->amount,  
            'remaining_amount' => $request->remaining_amount,  
            'is_paid' => $request->is_paid, 
            'service_provider_id' => $request->service_provider_id, 
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Invoice updated successfully',
            'data' => $invoice
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        Invoice::where('id',$id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Invoice deleted successfully'
        ], Response::HTTP_OK);
    }
}

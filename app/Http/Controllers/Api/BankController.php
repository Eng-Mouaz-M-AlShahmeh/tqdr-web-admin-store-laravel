<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Bank;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{ 
    protected $admin;
 
    public function __construct()
    {
        $this->admin = JWTAuth::parseToken()->authenticate();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = Bank::all();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $bank
        ], Response::HTTP_OK);
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
        $data = $request->only(
            'name', 
            'customer_name', 
            'address', 
            'customer_number', 
            'current_account_number', 
            'iban', 
        );

        $bank = new Bank;

        $bank->name = $request->name;
        $bank->customer_name = $request->customer_name;
        $bank->address = $request->address;
        $bank->customer_number = $request->customer_number;
        $bank->current_account_number = $request->current_account_number;
        $bank->iban = $request->iban;
      
        $bank->save();

        return response()->json([
            'success' => true,
            'message' => 'Bank created successfully',
            'data' => $bank
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank = Bank::find($id);
    
        if (!$bank) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Bank not found.'
            ], 400);
        }
    
        return $bank;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only(
            'name', 
            'customer_name', 
            'address', 
            'customer_number', 
            'current_account_number', 
            'iban', 
        );

        $bank = Bank::where('id', $id)->update([
            'name' => $request->name, 
            'customer_name' => $request->customer_name, 
            'address' => $request->address, 
            'customer_number' => $request->customer_number, 
            'current_account_number' => $request->current_account_number, 
            'iban' => $request->iban,  
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Bank updated successfully',
            'data' => $bank
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bank::where('id',$id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Bank deleted successfully'
        ], Response::HTTP_OK);
    }
}

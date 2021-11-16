<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Customer;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;


class CustomerController extends Controller
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
        $customer = Customer::all();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $customer
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
            'username', 
            'password', 
            'first_name', 
            'last_name', 
            'phone', 
            'email', 
            'avatar'
        );

        $customer = new Customer;

        $customer->username = $request->username;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->avatar = $request->avatar;
        $customer->password = bcrypt($request->password);

        $customer->save();

        return response()->json([
            'success' => true,
            'message' => 'Customer created successfully',
            'data' => $customer
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
    
        if (!$customer) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Customer not found.'
            ], 400);
        }
    
        return $customer;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only(
            'username', 
            'password', 
            'first_name', 
            'last_name', 
            'phone', 
            'email', 
            'avatar'
        );

        $customer = Customer::where('id', $id)->update([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'avatar' => $request->avatar,
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Customer updated successfully',
            'data' => $customer
        ], Response::HTTP_OK);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::where('id',$id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Customer deleted successfully'
        ], Response::HTTP_OK);
    }
}

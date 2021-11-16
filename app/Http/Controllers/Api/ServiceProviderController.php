<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;

class ServiceProviderController extends Controller
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
        $serviceProvider = ServiceProvider::all();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $serviceProvider
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
            'tqdr_service_price', 
            'tqdr_service_vat_percentage', 
            'avatar', 
            'profit_percentage', 
            'profit_fixed_amount' 
        );

        $serviceProvider = new ServiceProvider;

        $serviceProvider->username = $request->username;
        $serviceProvider->first_name = $request->first_name;
        $serviceProvider->last_name = $request->last_name;
        $serviceProvider->phone = $request->phone;
        $serviceProvider->email = $request->email;
        $serviceProvider->tqdr_service_price = $request->tqdr_service_price;
        $serviceProvider->tqdr_service_vat_percentage = $request->tqdr_service_vat_percentage;
        $serviceProvider->avatar = $request->avatar;
        $serviceProvider->profit_percentage = $request->profit_percentage;
        $serviceProvider->profit_fixed_amount = $request->profit_fixed_amount;
        $serviceProvider->password = bcrypt($request->password);

        $serviceProvider->save();

        return response()->json([
            'success' => true,
            'message' => 'Service Provider created successfully',
            'data' => $serviceProvider
        ], Response::HTTP_OK);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceProvider = ServiceProvider::find($id);
    
        if (!$serviceProvider) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Service Provider not found.'
            ], 400);
        }
    
        return $serviceProvider;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceProvider  $serviceProvider
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
            'tqdr_service_price', 
            'tqdr_service_vat_percentage', 
            'avatar', 
            'profit_percentage', 
            'profit_fixed_amount' 
        );

        $serviceProvider = ServiceProvider::where('id', $id)->update([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'tqdr_service_price' => $request->tqdr_service_price,
            'tqdr_service_vat_percentage' => $request->tqdr_service_vat_percentage,
            'avatar' => $request->avatar,
            'profit_percentage' => $request->profit_percentage,
            'profit_fixed_amount' => $request->profit_fixed_amount,
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Service Provider updated successfully',
            'data' => $serviceProvider
        ], Response::HTTP_OK);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ServiceProvider::where('id',$id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Service Provider deleted successfully'
        ], Response::HTTP_OK);
    }
}

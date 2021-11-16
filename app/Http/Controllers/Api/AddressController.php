<?php

namespace App\Http\Controllers\Api;
// namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
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
        //
        $address = Address::all();
        // $country = Address::find(1)->country()
        // ->where('title', 'foo')
        // ->first()->iso_2code;

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $address
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
        //
        // Validate data
        $data = $request->only('building_number', 'street_name', 'postal_code', 'longitude', 'latitude', 'zoom', 'store_id', 'country_id', 'city_id', 'nighborhood_id');
        // $validator = Validator::make($data, [
            // 'email' => 'required|email|unique:users',
            // 'name' => 'required|string',
            // 'password' => 'required|string|min:6|max:50'
        // ]);

       // Send failed response if request is not valid
        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->messages()], 200);
        // }

       // Request is valid, create new Address
        $address = new Address;

        $address->building_number = $request->building_number;
        $address->street_name = $request->street_name;
        $address->postal_code = $request->postal_code;
        $address->longitude = $request->longitude;
        $address->latitude = $request->latitude;
        $address->zoom = $request->zoom;
        $address->store_id = $request->store_id;
        $address->country_id = $request->country_id;
        $address->city_id = $request->city_id;
        $address->nighborhood_id = $request->nighborhood_id;

        $address->save();


        // $address = Address::create([
        //     'email' => $request->email,
        //     'name' => $request->name,
        //     'password' => bcrypt($request->password)
        // ]);

       // Address created, return success response
        return response()->json([
            'success' => true,
            'message' => 'Address created successfully',
            'data' => $address
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $address = Address::find($id);
    
        if (!$address) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, address not found.'
            ], 400);
        }
    
        return $address;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // Validate data
        $data = $request->only(
            'building_number', 
            'street_name', 
            'postal_code', 
            'longitude', 
            'latitude', 
            'zoom', 
            'store_id', 
            'country_id', 
            'city_id', 
            'nighborhood_id'
        );
        // $validator = Validator::make($data, [
        //   'email' => 'required|email|unique:users',
        //     'name' => 'required|string',
        //     'password' => 'required|string|min:6|max:50'
        // ]);

        // Send failed response if request is not valid
        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->messages()], 200);
        // }

        // Request is valid, update Address
        $address = Address::where('id', $id)->update([
            // 'email' => $request->email,
            // 'name' => $request->name,
            // 'password' => bcrypt($request->password)
            'building_number' => $request->building_number,
            'street_name' => $request->street_name,
            'postal_code' => $request->postal_code,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'zoom' => $request->zoom,
            'store_id' => $request->store_id,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'nighborhood_id' => $request->nighborhood_id,
        ]);

      // Address updated, return success response
        return response()->json([
            'success' => true,
            'message' => 'Address updated successfully',
            'data' => $address
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Address::where('id',$id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Address deleted successfully'
        ], Response::HTTP_OK);
    }
}

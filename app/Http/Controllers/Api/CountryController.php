<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Country;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller 
{
    protected $admin;
 
    public function __construct()
    {
        $this->admin = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $country = Country::all();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $country
        ], Response::HTTP_OK);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->only(
            'name', 
            'flag', 
            'phone_code', 
            'iso_2code', 
            'iso_3code', 
        );

        $country = new Country;

        $country->name = $request->name;
        $country->flag = $request->flag;
        $country->phone_code = $request->phone_code;
        $country->iso_2code = $request->iso_2code;
        $country->iso_3code = $request->iso_3code;
      
        $country->save();

        return response()->json([
            'success' => true,
            'message' => 'Country created successfully',
            'data' => $country
        ], Response::HTTP_OK);
    }


    public function show($id)
    {
        $country = Country::find($id);
    
        if (!$country) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Country not found.'
            ], 400);
        }
    
        return $country;
    }


    public function edit(Store $store)
    {
        
    }


    public function update(Request $request, $id)
    {
        $data = $request->only(
            'name', 
            'flag', 
            'phone_code', 
            'iso_2code', 
            'iso_3code', 
        );

        $country = Country::where('id', $id)->update([
            'name' => $request->name, 
            'flag' => $request->flag, 
            'phone_code' => $request->phone_code, 
            'iso_2code' => $request->iso_2code, 
            'iso_3code' => $request->iso_3code, 
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Country updated successfully',
            'data' => $country
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        Country::where('id',$id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Country deleted successfully'
        ], Response::HTTP_OK);
    }
}

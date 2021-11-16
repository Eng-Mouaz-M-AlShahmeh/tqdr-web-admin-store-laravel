<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\City;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller 
{
    protected $admin;
 
    public function __construct()
    {
        $this->admin = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $city = City::all();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $city
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
        );

        $city = new City;

        $city->name = $request->name;
      
        $city->save();

        return response()->json([
            'success' => true,
            'message' => 'City created successfully',
            'data' => $city
        ], Response::HTTP_OK);
    }


    public function show($id)
    {
        $city = City::find($id);
    
        if (!$city) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, City not found.'
            ], 400);
        }
    
        return $city;
    }


    public function edit(City $city)
    {}


    public function update(Request $request, $id)
    {
        $data = $request->only(
            'name', 
        );

        $city = City::where('id', $id)->update([
            'name' => $request->name, 
        ]);

        return response()->json([
            'success' => true,
            'message' => 'City updated successfully',
            'data' => $city
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        City::where('id',$id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'City deleted successfully'
        ], Response::HTTP_OK);
    }
}

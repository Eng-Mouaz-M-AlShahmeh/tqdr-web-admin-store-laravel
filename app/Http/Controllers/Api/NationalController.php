<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\National;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class NationalController extends Controller 
{
    protected $admin;
 
    public function __construct()
    {
        $this->admin = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $national = National::all();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $national
        ], Response::HTTP_OK);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->only(
            'national_number',  
            'front_image',  
            'back_image',  
        );

        $national = new National;

        $national->national_number = $request->national_number;
        $national->front_image = $request->front_image;
        $national->back_image = $request->back_image;
      
        $national->save();

        return response()->json([
            'success' => true,
            'message' => 'National created successfully',
            'data' => $national
        ], Response::HTTP_OK);
    }


    public function show($id)
    {
        $national = National::find($id);
    
        if (!$national) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, National not found.'
            ], 400);
        }
    
        return $national;
    }


    public function edit(National $national)
    {}


    public function update(Request $request, $id)
    {
        $data = $request->only(
            'national_number',  
            'front_image',  
            'back_image',  
        );

        $national = National::where('id', $id)->update([
            'national_number' => $request->national_number,  
            'front_image' => $request->front_image,  
            'back_image' => $request->back_image, 
        ]);

        return response()->json([
            'success' => true,
            'message' => 'National updated successfully',
            'data' => $national
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        National::where('id',$id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'National deleted successfully'
        ], Response::HTTP_OK);
    }
}

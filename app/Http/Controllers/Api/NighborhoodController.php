<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Nighborhood;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class NighborhoodController extends Controller 
{
    protected $admin;
 
    public function __construct()
    {
        $this->admin = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $nighborhood = Nighborhood::all();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $nighborhood
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

        $nighborhood = new Nighborhood;

        $nighborhood->name = $request->name;
      
        $nighborhood->save();

        return response()->json([
            'success' => true,
            'message' => 'Nighborhood created successfully',
            'data' => $nighborhood
        ], Response::HTTP_OK);
    }


    public function show($id)
    {
        $nighborhood = Nighborhood::find($id);
    
        if (!$nighborhood) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Nighborhood not found.'
            ], 400);
        }
    
        return $nighborhood;
    }


    public function edit(Nighborhood $nighborhood)
    {}


    public function update(Request $request, $id)
    {
        $data = $request->only(
            'name', 
        );

        $nighborhood = Nighborhood::where('id', $id)->update([
            'name' => $request->name, 
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Nighborhood updated successfully',
            'data' => $nighborhood
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        Nighborhood::where('id',$id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Nighborhood deleted successfully'
        ], Response::HTTP_OK);
    }
}

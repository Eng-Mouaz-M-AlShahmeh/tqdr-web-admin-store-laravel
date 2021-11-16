<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\SocialLinks;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class SocialLinksController extends Controller 
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
        $sociallinks = SocialLinks::all();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $sociallinks
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
            'facebook', 
            'twitter', 
            'instagram', 
            'linkedin', 
            'youtube', 
        );

        $sociallinks = new SocialLinks;

        $sociallinks->facebook = $request->facebook;
        $sociallinks->twitter = $request->twitter;
        $sociallinks->instagram = $request->instagram;
        $sociallinks->linkedin = $request->linkedin;
        $sociallinks->youtube = $request->youtube;
      
        $sociallinks->save();

        return response()->json([
            'success' => true,
            'message' => 'Social Links created successfully',
            'data' => $sociallinks
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialLinks  $sociallinks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sociallinks = SocialLinks::find($id);
    
        if (!$sociallinks) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, SocialLinks not found.'
            ], 400);
        }
    
        return $sociallinks;
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
            'facebook', 
            'twitter', 
            'instagram', 
            'linkedin', 
            'youtube', 
        );

        $sociallinks = SocialLinks::where('id', $id)->update([
            'facebook' => $request->facebook, 
            'twitter' => $request->twitter, 
            'instagram' => $request->instagram, 
            'linkedin' => $request->linkedin, 
            'youtube' => $request->youtube, 
        ]);

        return response()->json([
            'success' => true,
            'message' => 'SocialLinks updated successfully',
            'data' => $sociallinks
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
        SocialLinks::where('id',$id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Social Links deleted successfully'
        ], Response::HTTP_OK);
    }
}

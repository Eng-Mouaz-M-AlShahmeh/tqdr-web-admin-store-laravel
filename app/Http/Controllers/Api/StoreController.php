<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Store;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
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
        $stores = Store::all();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $stores
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
            'store_name', 
            'web_url', 
            'logo', 
            'cover_image', 
            'email',
            'phone',
            'description',
            'bank_id',
            'social_links_id',
            'cr_id',
            'national_id',
        );

        $store = new Store;

        $store->username = $request->username;
        $store->store_name = $request->store_name;
        $store->web_url = $request->web_url;
        $store->phone = $request->phone;
        $store->email = $request->email;
        $store->logo = $request->logo;
        $store->cover_image = $request->cover_image;
        $store->description = $request->description;
        $store->bank_id = $request->bank_id;
        $store->social_links_id = $request->social_links_id;
        $store->cr_id = $request->cr_id;
        $store->national_id = $request->national_id;
        $store->password = bcrypt($request->password);

        $store->save();

        return response()->json([
            'success' => true,
            'message' => 'Store created successfully',
            'data' => $store
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
        $store = Store::find($id);
    
        if (!$store) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Store not found.'
            ], 400);
        }
    
        return $store;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
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
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only(
            'username', 
            'password', 
            'store_name', 
            'web_url', 
            'logo', 
            'cover_image', 
            'email',
            'phone',
            'description',
            'bank_id',
            'social_links_id',
            'cr_id',
            'national_id',
        );

        $store = Store::where('id', $id)->update([
            'username' => $request->username, 
            'password' => bcrypt($request->password), 
            'store_name' => $request->store_name, 
            'web_url' => $request->web_url, 
            'logo' => $request->logo, 
            'cover_image' => $request->cover_image, 
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'bank_id' => $request->bank_id,
            'social_links_id' => $request->social_links_id,
            'cr_id' => $request->cr_id,
            'national_id' => $request->national_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Store updated successfully',
            'data' => $store
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Store::where('id',$id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Store deleted successfully'
        ], Response::HTTP_OK);
    }
}

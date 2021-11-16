<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Admin;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
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
        // return $this->admin->get();
        $adminn = Admin::all();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $adminn
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
        // Validate data
         $data = $request->only('username', 'email', 'phone', 'avatar', 'password');
         $validator = Validator::make($data, [
             'email' => 'required|email|unique:admin',
             'username' => 'required|string',
             'password' => 'required|string|min:6|max:50'
         ]);
 
        // Send failed response if request is not valid
         if ($validator->fails()) {
             return response()->json(['error' => $validator->messages()], 200);
         }
 
        // Request is valid, create new admin
         $adminn = new Admin;
         
         $adminn->username = $request->username;
         $adminn->email = $request->email;
         $adminn->phone = $request->phone;
         $adminn->avatar = $request->avatar;
         $adminn->password = bcrypt($request->password);

         $adminn->save();

         return response()->json([
             'success' => true,
             'message' => 'Admin created successfully',
             'data' => $adminn
         ], Response::HTTP_OK);

        //  $this->admin->create([
        //      'email' => $request->email,
        //      'username' => $request->username,
        //      'password' => bcrypt($request->password)
        //  ]);
 
        // Admin created, return success response
         return response()->json([
             'success' => true,
             'message' => 'Admin created successfully',
             'data' => $adminn
         ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $admin = $this->admin->find($id);
    
        if (!$admin) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, admin not found.'
            ], 400);
        }
    
        return $admin;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // Validate data
          $data = $request->only('name', 'password');
          $validator = Validator::make($data, [
            //   'email' => 'required|email|unique:users',
              'name' => 'required|string',
              'password' => 'required|string|min:6|max:50'
          ]);
  
        // Send failed response if request is not valid
          if ($validator->fails()) {
              return response()->json(['error' => $validator->messages()], 200);
          }
  
        // Request is valid, update admin
          $admin = User::where('id', $id)->update([
            //   'email' => $request->email,
              'name' => $request->name,
              'password' => bcrypt($request->password)
          ]);
  
        // Admin updated, return success response
          return response()->json([
              'success' => true,
              'message' => 'Admin updated successfully',
              'data' => $admin
          ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::where('id',$id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Admin deleted successfully'
        ], Response::HTTP_OK);
    }
}

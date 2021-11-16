<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Notification;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use DateTime;

class NotificationController extends Controller
{
    protected $admin;
 
    public function __construct()
    {
        $this->admin = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $notification = Notification::all();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $notification
        ], Response::HTTP_OK);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->only(
            'title',  
            'details',  
            'account_type', 
            'is_seen',  
            'seen_at', 
            'concerned_actor_id',
        );

        $now = new DateTime();

        $notification = new Notification;

        $notification->title = $request->title;
        $notification->details = $request->details;
        $notification->account_type = $request->account_type;
        $notification->is_seen = $request->is_seen;
        $notification->seen_at = $now;
        $notification->concerned_actor_id = $request->concerned_actor_id;
      
        $notification->save();

        return response()->json([
            'success' => true,
            'message' => 'Notification created successfully',
            'data' => $notification
        ], Response::HTTP_OK);
    }


    public function show($id)
    {
        $notification = Notification::find($id);
    
        if (!$notification) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Notification not found.'
            ], 400);
        }
    
        return $notification;
    }


    public function edit(Notification $notification)
    {}


    public function update(Request $request, $id)
    {
        $data = $request->only(
            'title',  
            'details',  
            'account_type', 
            'is_seen',  
            'seen_at', 
            'concerned_actor_id',
        );

        $now = new DateTime();

        $notification = Notification::where('id', $id)->update([
            'title' => $request->title,  
            'details' => $request->details,  
            'account_type' => $request->account_type, 
            'is_seen' => $request->is_seen,  
            'seen_at' => $now,  
            'concerned_actor_id' => $request->concerned_actor_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Notification updated successfully',
            'data' => $notification
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        Notification::where('id',$id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Notification deleted successfully'
        ], Response::HTTP_OK);
    }
}

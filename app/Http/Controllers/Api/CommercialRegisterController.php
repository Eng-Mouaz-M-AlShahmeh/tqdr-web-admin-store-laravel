<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\CommercialRegister;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use DateTime;

class CommercialRegisterController extends Controller 
{
    protected $admin;
 
    public function __construct()
    {
        $this->admin = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $cr = CommercialRegister::all();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $cr
        ], Response::HTTP_OK);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->only(
            'commercial_name',  
            'commercial_number',  
            'commercial_type',  
            'unified_number_of_facility',  
            'facility_type',  
            'cr_state',  
            'authorized_entity_for_activity',  
            'activity',  
            'netaqat_certificate',  
            'zaqat_certificate',  
            'chamber_of_commerce_subscription',  
            'municipal_license',  
            'expired_at',    
        );

        $now = new DateTime();

        $cr = new CommercialRegister;

        $cr->commercial_name = $request->commercial_name;
        $cr->commercial_number = $request->commercial_number;
        $cr->commercial_type = $request->commercial_type;
        $cr->unified_number_of_facility = $request->unified_number_of_facility;
        $cr->facility_type = $request->facility_type;
        $cr->cr_state = $request->cr_state;
        $cr->authorized_entity_for_activity = $request->authorized_entity_for_activity;
        $cr->activity = $request->activity;
        $cr->netaqat_certificate = $request->netaqat_certificate;
        $cr->zaqat_certificate = $request->zaqat_certificate;
        $cr->chamber_of_commerce_subscription = $request->chamber_of_commerce_subscription;
        $cr->municipal_license = $request->municipal_license;
        $cr->expired_at = $now;     
      
        $cr->save();

        return response()->json([
            'success' => true,
            'message' => 'Commercial Register created successfully',
            'data' => $cr
        ], Response::HTTP_OK);
    }


    public function show($id)
    {
        $cr = CommercialRegister::find($id);
    
        if (!$cr) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Commercial Register not found.'
            ], 400);
        }
    
        return $cr;
    }


    public function edit(CommercialRegister $cr)
    {}


    public function update(Request $request, $id)
    {
        $data = $request->only(
            'commercial_name',  
            'commercial_number',  
            'commercial_type',  
            'unified_number_of_facility',  
            'facility_type',  
            'cr_state',  
            'authorized_entity_for_activity',  
            'activity',  
            'netaqat_certificate',  
            'zaqat_certificate',  
            'chamber_of_commerce_subscription',  
            'municipal_license',  
            'expired_at',  
        );

        $now = new DateTime();

        $cr = CommercialRegister::where('id', $id)->update([
            'commercial_name' => $request->commercial_name,  
            'commercial_number' => $request->commercial_number,  
            'commercial_type' => $request->commercial_type,  
            'unified_number_of_facility' => $request->unified_number_of_facility,  
            'facility_type' => $request->facility_type,  
            'cr_state' => $request->cr_state,  
            'authorized_entity_for_activity' => $request->authorized_entity_for_activity,  
            'activity' => $request->activity,  
            'netaqat_certificate' => $request->netaqat_certificate,  
            'zaqat_certificate' => $request->zaqat_certificate,  
            'chamber_of_commerce_subscription' => $request->chamber_of_commerce_subscription,  
            'municipal_license' => $request->municipal_license,  
            'expired_at' => $now,  
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Commercial Register updated successfully',
            'data' => $cr
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        CommercialRegister::where('id',$id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Commercial Register deleted successfully'
        ], Response::HTTP_OK);
    }
}

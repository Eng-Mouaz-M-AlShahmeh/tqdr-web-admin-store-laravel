<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Setting;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    protected $admin;
 
    public function __construct()
    {
        $this->admin = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $setting = Setting::all();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $setting
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
            'main_dsc',  
            'admin_email',  
            'header_email',  
            'smtp_host',  
            'smtp_port',  
            'email_encription',  
            'smtp_user',  
            'smtp_pass',  
            'api_key',  
            'tqdr_logo',  
            'about',  
            'privacy',  
            'terms',  
            'admin_phone',  
            'admin_periods',  
            'admin_copyright',  
            'admin_twitter',  
            'admin_facebook',  
            'admin_google_plus',  
        );

        $setting = new Setting;

        $setting->title = $request->title;
        $setting->main_dsc = $request->main_dsc;
        $setting->admin_email = $request->admin_email;
        $setting->header_email = $request->header_email;
        $setting->smtp_host = $request->smtp_host;
        $setting->smtp_port = $request->smtp_port;
        $setting->email_encription = $request->email_encription;
        $setting->smtp_user = $request->smtp_user;
        $setting->smtp_pass = $request->smtp_pass;
        $setting->api_key = $request->api_key;
        $setting->tqdr_logo = $request->tqdr_logo;
        $setting->about = $request->about;
        $setting->privacy = $request->privacy;
        $setting->terms = $request->terms;
        $setting->admin_phone = $request->admin_phone;
        $setting->admin_periods = $request->admin_periods;
        $setting->admin_copyright = $request->admin_copyright;
        $setting->admin_twitter = $request->admin_twitter;
        $setting->admin_facebook = $request->admin_facebook;
        $setting->admin_google_plus = $request->admin_google_plus;
        
      
        $setting->save();

        return response()->json([
            'success' => true,
            'message' => 'Setting created successfully',
            'data' => $setting
        ], Response::HTTP_OK);
    }


    public function show($id)
    {
        $setting = Setting::find($id);
    
        if (!$setting) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Setting not found.'
            ], 400);
        }
    
        return $setting;
    }


    public function edit(Setting $setting)
    {}


    public function update(Request $request, $id)
    {
        $data = $request->only(
            'title',  
            'main_dsc',  
            'admin_email',  
            'header_email',  
            'smtp_host',  
            'smtp_port',  
            'email_encription',  
            'smtp_user',  
            'smtp_pass',  
            'api_key',  
            'tqdr_logo',  
            'about',  
            'privacy',  
            'terms',  
            'admin_phone',  
            'admin_periods',  
            'admin_copyright',  
            'admin_twitter',  
            'admin_facebook',  
            'admin_google_plus',  
        );

        $setting = Setting::where('id', $id)->update([
            'title' => $request->title,  
            'main_dsc' => $request->main_dsc,  
            'admin_email' => $request->admin_email,  
            'header_email' => $request->header_email,  
            'smtp_host' => $request->smtp_host,  
            'smtp_port' => $request->smtp_port,  
            'email_encription' => $request->email_encription,  
            'smtp_user' => $request->smtp_user,  
            'smtp_pass' => $request->smtp_pass,  
            'api_key' => $request->api_key,  
            'tqdr_logo' => $request->tqdr_logo,  
            'about' => $request->about,  
            'privacy' => $request->privacy,  
            'terms' => $request->terms,  
            'admin_phone' => $request->admin_phone,  
            'admin_periods' => $request->admin_periods,  
            'admin_copyright' => $request->admin_copyright,  
            'admin_twitter' => $request->admin_twitter,  
            'admin_facebook' => $request->admin_facebook,  
            'admin_google_plus' => $request->admin_google_plus,  
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Setting updated successfully',
            'data' => $setting
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        Setting::where('id',$id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Setting deleted successfully'
        ], Response::HTTP_OK);
    }
}

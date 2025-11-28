<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userRegistration(Request $request){
        try{
            User::create([
           'first_name' => $request->first_name,
           'last_name' => $request->last_name,
           'email' => $request->email,
           'mobile' => $request->mobile,
           'password' => $request->password,
            ]);
            return response()->json([
                'status' => 'success',
                 'message' => 'User Registration successful'
            ], 200);
        }catch(\Throwable $e){

       }
     }


       public function userloginPage(){
        return view('pages.auth.loging-page');
    }

          public function restPasswordPage(){
        return view('pages.auth.reset-pass-page');
    }

           public function sendOtpPage(){
        return view('pages.auth.send-otp-page');
    }

             public function verifyOtpPage(){
        return view('pages.auth.verify-otp-page');
    }

           public function profilePage(){
        return view('pages.dashboard.profile-page');
    }


}

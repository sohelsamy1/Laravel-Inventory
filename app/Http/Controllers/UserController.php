<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\OTPMail;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            return response()->json([
           'status' => 'failed',
           'message' => 'User Registration failed'
            ], 200);

       }
     }


       public function userlogin(Request $request){
        $user_id = User::where(['email' => $request->email, 'password' => $request->password])->select('id')->first();

        if($user_id !== null){
         $token = JWTToken::createToken($request->email, $user_id);
         return response()->json([
                'status' => 'failed',
                 'message' => 'User Login successful'
         ], 200)->cookie('token', $token, time() + 60 * 60 * 24);
        }else{
            return response()->json([
                'status' => 'failed',
                 'message' => 'User Login failed'
            ]);
        }


    }

     public function logout(){
        return response()->json([
            'status' => 'success',
            'message' => 'User Logout successful'
        ])->cookie('token', null, -1);
     }

     public function sendOTP(Request $request){
        $email = $request->email;
        $otp = rand(1000, 9999);
        $count = User::where('email', $email)->count();

        if($count === 1){
            //send otp to the email address
       Mail::to($email)->send(new OTPMail($otp));
       User::where('email', $email)->update(['otp' => $otp]);

          return response()->json([
            'status' => 'success',
            'message' => 'OTP sent successfully'
        ], 200);

        }else{
            return response()->json([
            'status' => 'failed',
            'message' => 'Unable to send OTP'
        ], 200);
      }
     }

    //       public function restPasswordPage(){
    //     return view('pages.auth.reset-pass-page');
    // }

    //        public function sendOtpPage(){
    //     return view('pages.auth.send-otp-page');
    // }

    //          public function verifyOtpPage(){
    //     return view('pages.auth.verify-otp-page');
    // }

    //        public function profilePage(){
    //     return view('pages.dashboard.profile-page');
    // }


}

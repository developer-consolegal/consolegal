<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\EmailTrait;
use App\Models\PasswordReset;
use App\Models\Kyc;
use App\Models\Refer;
use App\Models\wallet_history;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Http\Traits\WalletTrait;

class AuthController extends Controller
{

    public function profile(Request $req)
    {

        $user = getAuthUser($req);

        if (!$user) {
            return responseJson(null, 401, "Unauthenticated request", true);
        }

        return responseJson($user, 200);
    }

    public function deleteAccount(Request $req)
    {
        $user = getAuthUser($req);

        // Delete related data if needed
        // $user->posts()->delete(); etc.

        // $user->delete();

        return response()->json(['message' => 'Account deleted successfully.']);
    }

    public function login(Request $req)
    {

        if ($req->has('phone')) {
            $credentials = $req->only(["phone", "password"]);
            Auth::attempt(['phone' => $credentials['phone'], 'password' => $credentials['password']]);
        }

        if ($req->has("email")) {
            $credentials = $req->only(["email", "password"]);
            Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']]);
        }

        if (Auth::check()) {
            $token = $req->user()->createToken('auth_token')->plainTextToken;
            return responseJson(["user" => $req->user(), "token" => $token], 200, "You have logged in, successfuly");
        }

        return responseJson(null, 401, "Invalid credentials", true);
    }

    public function register(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $formattedErrors = [];

            $message = "";
            $i = 0;
            foreach ($errors as $field => $errorMessages) {
                $formattedErrors[$field] = $errorMessages[0];
                if($i == 0){
                    $message = $errorMessages[0];
                }
                $i++;
            }
            return responseJson(null, 422, $message, true);
        }
        
        $createUser = $req->only(['name', 'email', 'phone', 'password']);
    
        $createUser['referral_id'] = User::generateReferralId();

        if(isset($req->password)){
            $createUser['password'] = Hash::make($req->password);
        }
        
        if (isset($req->ref_id)) {
           $createUser['ref_id'] = $req->ref_id;

           $isRefValid = User::where("referral_id", $req->ref_id)->first();
                      
           if(!$isRefValid){
                return responseJson(null, 500, "Refer Code is not valid", true);           
           }
         }

        // Create the user
        $user = User::create($createUser);


          if (isset($req->ref_id) && $user) {
             $refer_amount = Refer::first()->amount;
             $refer_code = str_replace('UM-CL-00', '', $req->ref_id);
             $update_wallet = WalletTrait::referCredit($refer_amount, "flat", "credit", $refer_code);
          }

        $wallets = new Wallet;
        $wallets->user_id = $user->id;
        $wallets->amount = 0;
        $wallets->status = 1;
        $wallets->save();

        // return user data 

        // confirmation email 
        if ($user) {
            $body = "Dear $user->name, Welcome to the Consolegal family. You may get a call from Consolegal Team within 24hrs.
            ";
            EmailTrait::confirm($user->email, $body, "Account signed up", $user->name, $user->phone);
        }

        // Return a success response
        return responseJson($user, 201, 'User registered successfully', false);
    }

    public function update(Request $req)
    {
        $auth = getAuthUser($req);

        $user = User::find($auth->id);
        if ($user) {
            if ($req->name) {
                $user->name = $req->name;
            }
            if ($req->email) {
                $user->email = $req->email;
            }
            if ($req->phone) {
                $user->phone = $req->phone;
            }
            if ($req->company) {
                $user->company = $req->company;
            }
            if ($req->gst) {
                $user->gst = $req->gst;
            }
            if ($req->password && strlen($req->password) > 0) {
                $user->password = Hash::make($req->password);
            }

            if ($req->hasFile('profile')) {
                $file = $req->file('profile');
                $file_name = time() . 'user.' . $file->extension();
                $path = $file->move(public_path('storage'), $file_name);
                $user->profile = $file_name;
            }

            $user->save();

            // confirmation after account update 
            if ($user) {
                $body = "Dear $user->name, Your profile has been updated. By Consolegal";
                EmailTrait::confirm($user->email, $body, "Profile update", $user->name);
                return responseJson($user, 200, "Profile updated.", false);
            }

            return responseJson($user, 500, "Profile failed to update.", true);
        }

        // Create the user
        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'password' => Hash::make($req->password),
            'referral_id' => User::generateReferralId(),
        ]);

        $wallets = new Wallet;

        $wallets->user_id = $user->id;
        $wallets->amount = 0;
        $wallets->status = 1;
        $wallets->save();

        // return user data 

        // confirmation email 
        if ($user) {
            $body = "Dear $user->name, Welcome to the Consolegal family. You may get a call from Consolegal Team within 24hrs.
            ";
            EmailTrait::confirm($user->email, $body, "Account signed up", $user->name, $user->phone);
        }

        // Return a success response
        return responseJson($user, 201, 'User registered successfully', false);
    }

    public function forgot(Request $req)
    {

        $validator = Validator::make($req->all(), [
            "email" => 'required|email|exists:users,email'
        ]);


        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $formattedErrors = [];

            foreach ($errors as $field => $errorMessages) {
                $formattedErrors[$field] = $errorMessages[0];
            }
            return responseJson(null, 422, $formattedErrors, true);
        }

        $otp = rand(100000, 999999);
        $expiresAt = Carbon::now()->addMinutes(15);
        PasswordReset::updateOrCreate(
            ['email' => $req->email],
            ['token' => $otp, 'expires_at' => $expiresAt]
        );

        $user = User::where("email", $req->email)->first();

        $check = EmailTrait::Otp_send($otp, $user->email, "otp", $user->phone);

        return responseJson(["email" => $req->email], 200, "Password reset OTP has been sent.", false);
    }

    public function verifyOtp(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|email',
            'otp' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $formattedErrors = [];

            foreach ($errors as $field => $errorMessages) {
                $formattedErrors[$field] = $errorMessages[0];
            }
            return responseJson(null, 422, $formattedErrors, true);
        }

        $passwordReset = PasswordReset::where('email', $req->email)->first();

        if (!$passwordReset || $passwordReset->token != $req->otp || Carbon::now() > $passwordReset->expires_at) {
            return responseJson(null, 400, 'Invalid OTP or expired. Please request a new password reset.', true);
        }

        return responseJson(null, 200, 'OTP verified successfuly.', false);
    }


    public function resetPassword(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $formattedErrors = [];

            foreach ($errors as $field => $errorMessages) {
                $formattedErrors[$field] = $errorMessages[0];
            }
            return responseJson(null, 422, $formattedErrors, true);
        }

        $passwordReset = PasswordReset::where('email', $req->email)->first();

        // Update the user's password
        $user = User::where('email', $req->email)->first();
        $user->password = Hash::make($req->password);
        $user->save();

        // Delete the password reset entry
        // $passwordReset->delete();

        return responseJson(null, 200, 'Password reset successfully. You can now login with your new password.', false);
    }
    
    
    
    public function kycget(Request $req)
    {
        $user = getAuthUser($req);
        $create = Kyc::where("user_id", $user->id)->first();
        
        return responseJson($create, 200, '', false);
    }
    
    
    
    public function kyccreate(Request $req)
    {
        try{
            
        $user = getAuthUser($req);
        
        $req->validate([
            "pan"     => 'required',
            "aadhaar" => 'required',
        ],
        [
            'pan.required' => 'Pan is required document',
            'aadhaar.required' => 'Aadhaar is required document',
            ]);
        
        
        $isExist = Kyc::where("user_id", $user->id)->where("user_type","user")->first();
        
        if($isExist){
            
            if ($req->hasfile('pan')) {
            $pan = $req->file('pan');
            $pan_name = time() . 'pan_kyc.' . $pan->extension();
            $pan->move(public_path('storage'), $pan_name);
            $isExist->pan = $pan_name;
        }

        if ($req->hasfile('aadhaar')) {
            $aadhaar = $req->file('aadhaar');
            $aadhaar_name = time() . 'aadhaar_kyc.' . $aadhaar->extension();
            $aadhaar->move(public_path('storage'), $aadhaar_name);
            $isExist->aadhaar = $aadhaar_name;
        }


        if ($req->other_label) {
            $isExist->other_label = $req->other_label;
        }

        if ($req->hasfile('other_doc')) {
            $other_doc = $req->file('other_doc');
            $other_doc_name = time() . 'other_kyc.' . $other_doc->extension();
            $other_doc->move(public_path('storage'), $other_doc_name);
            $isExist->other_doc = $other_doc_name;
         }
         
         $isExist->save();
         return responseJson($isExist, 201, 'Kyc Uploaded Successfuly', false);
        }

        $create = new Kyc;

        $create->user_type = "user";
        $create->user_id = $user->id;

        $pan = $req->file('pan');
        $aadhaar = $req->file('aadhaar');

        $pan_name = time() . 'pan_kyc.' . $pan->extension();
        $aadhaar_name = time() . 'aadhaar_kyc.' . $aadhaar->extension();

        $pan->move(public_path('storage'), $pan_name);
        $aadhaar->move(public_path('storage'), $aadhaar_name);

        $create->pan = $pan_name;
        $create->aadhaar = $aadhaar_name;

        if ($req->other_label) {
            $other_doc = $req->file('other_doc');
            $other_doc_name = time() . 'other_kyc.' . $other_doc->extension();
            $create->other_label = $req->other_label;
            $create->other_doc = $other_doc_name;
        }

        $create->save();
        
        return responseJson($create, 201, 'Kyc Uploaded Successfuly', false);
        
        } catch (ValidationException $e) {
            return responseJson(null, 422, $e->validator->getMessageBag(), true);
        }
    }

    public function kycupdate(Request $req)
    {
        $user = getAuthUser($req);
        $create = Kyc::where("user_id", $user->id)->where("user_type","user")->first();

        if ($req->hasfile('pan')) {
            $pan = $req->file('pan');
            $pan_name = time() . 'pan_kyc.' . $pan->extension();
            $pan->move(public_path('storage'), $pan_name);
            $create->pan = $pan_name;
        }

        if ($req->hasfile('aadhaar')) {
            $aadhaar = $req->file('aadhaar');
            $aadhaar_name = time() . 'aadhaar_kyc.' . $aadhaar->extension();
            $aadhaar->move(public_path('storage'), $aadhaar_name);
            $create->aadhaar = $aadhaar_name;
        }


        if ($req->other_label) {
            $create->other_label = $req->other_label;
        }

        if ($req->hasfile('other_doc')) {
            $other_doc = $req->file('other_doc');
            $other_doc_name = time() . 'other_kyc.' . $other_doc->extension();
            $other_doc->move(public_path('storage'), $other_doc_name);
            $create->other_doc = $other_doc_name;
        }

        $create->save();

        return responseJson(null, 200, 'Kyc Updated Successfuly', false);
    }


    public function kycshow($id){
        $create = Kyc::where($id);
        return responseJson($create, 200, '');
    }
    
    
}

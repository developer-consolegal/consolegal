<?php

use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\PersonalAccessToken;

function responseJson($data = [], $status = 200, $message = "", $error = false, $headers = [], $options = 0)
{
   return response()->json([
      'data' => $data,
      'status' => $status,
      'message' => $message,
      'error' => $error
   ], 200, $headers, $options);
}

function getRequestToken($req)
{
   $token = $req->header('X-Token');
   $token = str_replace("Bearer ", "", $token);

   return $token;
}

function getAuthUser($req)
{
   $token = $req->header('X-Token');
   $token = str_replace("Bearer ", "", $token);

   $personal = new PersonalAccessToken;
   $checkToken = $personal->findToken($token);

   if (!$checkToken) {
      return false;
   }

   $user = $checkToken->tokenable;
   if (!$user) {
      return false;
   }
   return $user;
}

function getUserByToken($token)
{
   $personal = new PersonalAccessToken;
   $checkToken = $personal->findToken($token);

   if (!$checkToken) {
      return false;
   }

   $user = $checkToken->tokenable;
   if (!$user) {
      return false;
   }

   return $user;
}

function isTokenAdmin($token)
{
   $personal = new PersonalAccessToken;
   $checkToken = $personal->findToken($token);

   if (!$checkToken) {
      return false;
   }

   $user = $checkToken->tokenable;
   if (!$user) {
      return false;
   }
   $role = $user->role;

   return ($role == "admin" || $role == "super admin") ? true : false;
}

function isTokenVendor($token)
{
   $user = getUserByToken($token);

   if(!$user){
      return false;
   }
   $role = $user->role;

   return ($role == "vendor") ? true : false;
}

function isApproved($token)
{
   $user = getUserByToken($token);
   $role = $user->approved;

   return $role;
}

function isVendorComplete($token)
{
   $user = getUserByToken($token);
   $role = $user->doc && $user->vendor;

   return $role;
}


function sendErrorReport($e, $message = "")
{
   $errorLog = [
      "error" => $e->getMessage(),
      "file" => $e->getFile(),
      "line number" => $e->getLine(),
      "Date Time" => now(),
   ];

   $html = "";

   // foreach ($errorLog as $key => $value) {
   //    $html .= "<p> $key => $value</p>";
   // }

   // if (config("app.report_mail")) {
   //    Mail::html($html, function ($message) {
   //       $message
   //          ->to(config("app.report_mail"))
   //          ->subject("error found");
   //    });
   // }
}

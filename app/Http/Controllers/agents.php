<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;

use App\Models\agents_model;
use App\Models\Lead;
use App\Models\services;
use App\Models\User;
use App\Models\Kyc;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Http\Traits\EmailTrait;

class agents extends Controller
{
   function login(Request $req)
   {
      if ($req->session()->has('user')) {
         return redirect("/users/dashboard");
      }
      // session(['url.intended' => url()->previous()]);

      return view("agents.agentslogin");
   }



   function login_post(Request $req)
   {

      $validate = $req->validate([
         'password' => 'required | min:6',
         'email' => 'required | email | exists:agents,email'
      ]);

      $users = agents_model::where('email', "$req->email")->first();

      if ($req->password == $users->password) {

         $req->session()->put('agents', $users);
         $req->session()->forget('user');
         $req->session()->forget('frans');
         $req->session()->forget('admin');

         return redirect()->route('agent.dashboard');
      } else {
         return redirect()->back()->with('error', 'incorrect password');
      }
   }
   
   function users(Request $req)
   {
      $agent = $req->session()->get("agents");
      $agent_id = $agent->id;
      
      $query = $req->query('query');
      
      $users = Lead::where(["agent_id" => $agent_id])
      ->where(function ($queryBuilder) use ($query) {
        $queryBuilder->where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('email', 'LIKE', '%' . $query . '%')
            ->orWhere('phone', 'LIKE', '%' . $query . '%');
    })
      ->whereHas("isUser")->orderBy("id", "DESC")->simplePaginate(40);

        // return $users;
      return View("agents.users", compact('users'));
   }

   function leads_all(Request $req)
   {
      $id = $req->session()->get("agents")->id;
      $query = $req->query('query');
      
      
      $data = Lead::with(["service", "orders"])->where("from", "agents")
      ->orderBy("id","DESC")
      ->where("agent_id", $id)
       ->where(function ($queryBuilder) use ($query) {
        $queryBuilder->where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('email', 'LIKE', '%' . $query . '%')
            ->orWhere('phone', 'LIKE', '%' . $query . '%');
    })
      ->simplePaginate(5);

      return view("agents.all_leads", ["leads" => $data]);
   }

   function leads_get($user_id = null)
   {
    //   $lead = Lead::simplePaginate(10);

      $services = services::where("category", "!=", "private")->get();
      
      if (isset($user_id)) {
            $user = User::find($user_id);
            return view("agents.add_leads", compact('user', 'services'));
        }


      return view("agents.add_leads", compact('services'));
   }

   function agent_all(Request $req)
   {

      $key = $req->key ?? '';
      $users = agents_model::where("id", "LIKE", '%' . $key . '%')
         ->orWhere("name", "LIKE", '%' . $key . '%')
         ->orWhere("email", "LIKE", '%' . $key . '%')
         ->orWhere("phone", "LIKE", '%' . $key . '%')
         ->simplePaginate(10);

      return view("all_agents", ["data" => $users]);
   }

   function agent_get()
   {
      return view("add_agents");
   }


   function agent_add(Request $req)
   {
      $agent = new agents_model;

      $agent->name = $req->name;

      if ($agent->phone == $req->phone || $agent->phone == $req->phone) {
         return redirect()->back()->withError("Email && Phone already exist, Try diffrent! ");
      }
      $agent->email = $req->email;
      $agent->phone = $req->phone;
      $agent->company = $req->company ?? '';
      $agent->password = $req->password;

      $agent->save();

      if (!$agent) {
         return redirect()->back()->withError("Failed to add Agent!");
      }

      if ($agent) {
         $user = $agent;
         $body = "Dear $user->name, Welcome to the Consolegal family. You may get a call from Consolegal Team within 24hrs.
         ";
         EmailTrait::confirm($user->email, $body, "Profile update", $user->name, $user->phone);
      }
      return redirect()->back()->withSuccess("New Agent added successfuly!");
   }


function account(Request $req)
   {
      $user = agents_model::find($req->session()->get("agents")->id);
      $kyc = Kyc::where(["user_type" => "agent", "user_id" => $user->id])->first();

      return view("agents.account", ['data' => $user, 'type' => 'user', 'kyc' => $kyc]);
   }

function updateAccount(Request $req)
   {
      try {

         $agents = agents_model::find($req->session()->get("agents")->id);

         if ($agents) {
            if ($req->name) {
               $agents->name = $req->name;
            }
            if ($req->email) {
               $agents->email = $req->email;
            }
            if ($req->phone) {
               $agents->phone = $req->phone;
            }
            if ($req->company) {
               $agents->company_name = $req->company;
            }
            if ($req->gst) {
               $agents->gst = $req->gst;
            }
            if ($req->password) {
               $agents->password = Hash::make($req->password);
            }

            $agents->save();

            if ($agents) {
               $body = "Dear $agents->name, Your profile has been updated. By Consolegal";
               EmailTrait::confirm($agents->email, $body, "Profile update", $agents->name);
              return redirect()->back()->withSuccess("Profile updated successfuly!");
            }
         }
         return redirect()->back()->withError("Failed to fetch account!");
      } catch (\Throwable $th) {
         throw $th;
      }
   }

   function update(Request $req)
   {
      try {

         if ($req->id) {
            $agents = agents_model::find($req->id);
            // $req->session()->put("user", $users);
         } else {
            $agents = agents_model::find($req->session()->get("agents")->id);
         }

         if ($agents) {
            if ($req->name) {
               $agents->name = $req->name;
            }
            if ($req->email) {
               $agents->email = $req->email;
            }
            if ($req->phone) {
               $agents->phone = $req->phone;
            }
            if ($req->company) {
               $agents->company_name = $req->company;
            }
            if ($req->gst) {
               $agents->gst = $req->gst;
            }
            if ($req->password) {
               $agents->password = Hash::make($req->password);
            }

            $agents->save();

            if ($agents) {
               $body = "Dear $agents->name, Your profile has been updated. By Consolegal";
               EmailTrait::confirm($agents->email, $body, "Profile update", $agents->name);
               return ["status" => "success"];
            }
            // $req->session()->put("frans", $frans);
            return back();
         }
         // return ["status" => "failed"];
      } catch (\Throwable $th) {
         throw $th;
      }
   }
}

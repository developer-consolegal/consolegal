<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Traits\EmailTrait;

use Barryvdh\DomPDF\Facade;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

use ZipArchive;
use DB;
use App;
use App\Models\admins;
use App\Models\agents_model;
use App\Models\Blogs;
use App\Models\services;
use App\Models\services_sub_head;
use App\Models\tabs_content;
use App\Models\form_submit;
use App\Models\service_done;
use App\Models\email_subscribe;
use App\Models\Marquee;
use App\Models\WelcomeBanner;
use App\Models\News;
use App\Models\Update;
use App\Models\Frans;
use App\Models\User;
use App\Models\Order;
use App\Models\TeamMember;
use App\Models\Event;
use App\Models\Gallery;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

class webController extends Controller
{
    //

    function index()
    {
        $blogs = Blogs::all();
        $marquee = Marquee::where("active", 1)->get();
        $banner = WelcomeBanner::where("active", 1)->first();
        $news = News::latest()->limit(8)->get();
        $update = Update::latest()->limit(8)->get();

        return view("web.index", compact("blogs", "marquee", "banner", "news", "update"));
    }

    function about()
    {
        $experts = TeamMember::where("is_expert", "1")->get();
        $teams = TeamMember::where("is_expert", "0")->get();
        $gallery = Gallery::orderBy("id", "desc")->limit(10)->get();
        $events = Event::orderBy("id", "desc")->limit(10)->get();

        return view("web.about", compact("experts", "teams", "gallery", "events"));
    }
    
    function partnerWithUs()
    {
        if ($user = Session::has('frans')) {
            $user = Session::get('frans');
        } elseif (Session::has('user')) {
            $user = Session::get('user');
        } elseif (Session::has('agents')) {
            $user = Session::get('agents');
        } else {
            $user = null;
        }
        return view("web.partner-with-us", compact('user'));
    }


    function email_subscribe(Request $req)
    {

        // avoid bot prefill and spam requests
        if (!empty($req->website)) {
            return response()->json(['msg' => 'Invalid form submission.'], 400);
        }

        try {

            $validate = $req->validate([
                'email' => 'required',
            ]);

            $existingEmail = email_subscribe::where('email', $req->email)->first();

            if ($existingEmail) {
                return response()->json('Email is already subscribed.', 400);
                // return back()->withError('Email is already subscribed.');
            }

            $data = new email_subscribe;

            $data->email = $req->email;

            $data->save();

            if (!$data) {
                return $req->email;
            }
            return response()->json('Subscribed');
        } catch (\Throwable $th) {
            return response()->json('Something went wrong!!', 400);
        }
    }

    public function setEnv($key, $value)
    {
        file_put_contents(app()->environmentFilePath(), str_replace(
            $key . '=' . env($value),
            $key . '=' . $value,
            file_get_contents(app()->environmentFilePath())
        ));
    }


    function setting()
    {
        $data = [
            "mail" => config('mail.mailers.smtp.username'),
            "host" => config('mail.mailers.smtp.host'),
            "password" => config('mail.mailers.smtp.password'),
            "port" => config('mail.mailers.smtp.port'),
            "encryption" => config('mail.mailers.smtp.encryption'),
            "mailer" => config('mail.mailers.smtp.transport')
        ];

        $data = json_encode($data);
        $data = json_decode($data);
        return view("settings", compact('data'));
    }
   
    function marquee()
    {
        $data = Marquee::first();

        return view("marquee", compact('data'));
    }
    
    function marquee_set(Request $req, $id)
    {
        $data = Marquee::first();

        // return $req->all();
        $validated = $req->validate([
            'label' => 'required',
            'active' => 'required'
        ]);

        if(isset($id)){
            $data->update($validated);
            return redirect()->route('admin.marquee.index')->with('success', "Marquee changes saved");
        }
        return redirect()->route('admin.marquee.index')->with('success', "Marquee changes saved");
    }

    function setting_set(Request $req)
    {

        $_ENV["MAIL_MAILER"] = $req->transport;
        $_ENV["MAIL_HOST"] = $req->host;
        $_ENV["MAIL_PORT"] = $req->port;
        $_ENV["MAIL_USERNAME"] = $req->username;
        $_ENV["MAIL_FROM_ADDRESS"] = $req->username;
        $_ENV["MAIL_PASSWORD"] = $req->password;
        $_ENV["MAIL_ENCRYPTION"] = $req->encryption;

        $this->refreshConfigCache();

        return redirect()->route("admin.setting.index")->withSuccess("Settings are updated.");
    }


    private function refreshConfigCache()
    {
        // Clear the configuration cache
        $exitCode = Artisan::call('config:clear');


        // Re-cache the configuration
        $exitCode = Artisan::call('config:cache');
    }



    function contact(Request $req)
    {
        try {

            // $req->validate([
            //     'g-recaptcha-response' => 'required'
            // ]);

            if (!$req->input('g-recaptcha-response')) {
                return json_encode(['msg' => "reCAPTCHA verification is required"]);
            }

            // $recaptchaSecret = env('RECAPTCHA_SECRET_KEY');
            // $response = $req->input('g-recaptcha-response');

            // $responsed = Http::post('https://www.google.com/recaptcha/api/siteverify', [
            //     'secret' => $recaptchaSecret,
            //     'response' => $response
            // ]);

            // $responseBody = $responsed->json();

            // if (!$responseBody['success']) {
            //     // return redirect()->back()->withErrors(['captcha' => 'reCAPTCHA verification failed']);
            //     return json_encode(['msg' => "reCAPTCHA verification failed", 'response' => $responseBody]);
            // }

            $save = DB::table('contact')->insert($req->only(['name', 'email', 'phone', 'message']));

            if (!$save) {
                return json_encode(['msg' => "contact form failed to submit."]);
            }


            $body = "Dear $req->name, Thank you for contacting us. You may get a call from Consolegal Team within 24hrs.
            ";

            EmailTrait::confirm($req->email, $body, "Contact Support", $req->name, $req->phone);

            return json_encode(['msg' => "contact form submitted."]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    function service(Request $req, $slug = null)
    {

        if ($slug != null) {

            if ($user = Session::has('frans')) {
                $user = Session::get('frans');
            } elseif (Session::has('user')) {
                $user = Session::get('user');
            } elseif (Session::has('agents')) {
                $user = Session::get('agents');
            } else {
                $user = null;
            }

            $service_all = services::where("category", "!=", "private")->get();

            $service = services::where("slug", $slug)->first();
            $sub_heads  = services_sub_head::where("service_id", $service->id)->get();
            $tabs = tabs_content::where("service_id", $service->id)->get();

            // return ['services' => $service_id, 'sub_head' => $sub_heads, 'tabs' => $tabs];
            return view("web.index2", ['service' => $service, 'services_all' => $service_all, 'sub_head' => $sub_heads, 'tabs' => $tabs, 'user' =>  $user]);
        }
    }

    // function serviceRefresh()
    // {
    //     // Fetch all services
    //     $services = services::all();

    //     // Loop through each service and update the slug
    //     foreach ($services as $service) {
    //         $service->slug = Str::slug($service->name);

    //         // Save the updated slug
    //         $service->save();
    //     }

    //     return response()->json([
    //         'message' => 'Slugs updated successfully!',
    //         'total_updated' => $services->count()
    //     ]);
    // }


    function liveSearch(Request $req)
    {

        $query = $req->search;

        $search = services::where('name', 'like', "%$query%")->get();

        $data = '';

        foreach ($search as $item) {

            $data .= "<li class='py-1'>
                        <a class='btn text-dark' href='/services/$item->name/$item->id'>$item->name</a>
                    </li>";
        }

        if (count($search) < 1) {
            $data = "<li class='py-1'>
                        <a class='btn text-dark' href='javascript:void(0)'>No suggestion found</a>
                    </li>";
        }

        return $data;
    }



    function blogs()
    {
        $blogs = Blogs::all();

        $recent = Blogs::orderBy("id", "desc")->limit(6)->get();

        return view("web.blogs", ['blogs' => $blogs, 'recents' => $recent]);
    }

    function blogs_category(Request $req)
    {
        $data = Blogs::where("tags", $req->tags)->get();

        return $data;
    }


    function blog_view(Request $req, $id)
    {
        $blog_active = Blogs::find($req->id);
        $recent = Blogs::orderBy("id", "desc")->limit(4)->get();

        return view("web.blogread", ['blog' => $blog_active, 'recent' => $recent]);
    }




    function download(Request $req, $id)
    {
        $zip = new ZipArchive;
        // $fileName = public_path('storage') . '/' . time() . '.zip';
        $fileName = time() . '.zip';

        $openFile = public_path($fileName);

        // return $openFile;

        $zip->open($openFile, ZipArchive::CREATE || ZipArchive::OVERWRITE === true);

        $files = form_submit::where("assigned_id", $id)->where("content_type", "file")->get();

        // $files = File::files(public_path('storage'));

        if (count($files) < 1) {
            return "No document uploaded by user wait ";
        }

        $i = 0;
        foreach ($files as $key => $value) {
            $i++;
            $relativeName = basename($value->content);

            $path = asset('storage') . '/' . $relativeName;

            $content = file_get_contents($path);

            $zip->addFromString($relativeName, $content);
        }

        $zip->close();

        return redirect("/$fileName");
    }


    function download_invoice($id)
    {
        $files = service_done::where("order_id", $id)
            ->where("field_name", "invoice")
            ->orderBy("id", "DESC")
            ->first();

        if (!$files) {
            return "No invoice uploaded !!";
        }

        return redirect(asset("storage/$files->field_content"));
    }


    function download_customer(Request $req, $id)
    {

        $zip = new ZipArchive;
        // $fileName = public_path('storage') . '/' . time() . '.zip';
        $fileName = time() . '.zip';

        $openFile = public_path($fileName);

        // return $openFile;


        $zip->open($openFile, ZipArchive::CREATE || ZipArchive::OVERWRITE === true);

        $files = service_done::where("order_id", $id)
            ->where("field_name", "file")
            ->get();

        // $files = File::files(public_path('storage'));

        if (count($files) < 1) {
            return "No document uploaded by user wait ";
        }

        $i = 0;
        foreach ($files as $key => $value) {
            $relativeName = basename($value->field_content);

            $path = asset('storage') . '/' . $relativeName;

            $content = file_get_contents($path);

            $zip->addFromString($relativeName, $content);
        }
        $zip->close();

        return redirect("/$fileName");
    }


    function textpdf(Request $req, $id)
    {

        $data = form_submit::where("content_type", "text")->where("assigned_id", $req->id)->orderBy("id", "desc")->get()->unique('content_label');

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('textpdf', ['data' => $data]);
        // return $pdf->stream();
        return $pdf->download('customer_detail.pdf');
    }


    function download_reciept($id)
    {
        $order = Order::where("id", $id)->first();
        $payment = DB::table('payments')->get();
        $service = services::get();

        $user_type = ($order->user_id) ? "user_id" : "fran_id";

        if ($user_type == "user_id") {
            $user = User::where("id", $order->$user_type)->first();
        } else {
            $user = Frans::where("id", $order->$user_type)->first();
        }

        $date = date('Y h:i:s A');

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('reciept', [
            "order"   => $order,
            "payment" => $payment,
            "service" => $service,
            "user"    => $user,
            "type"    => $user_type
        ])->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled', true]);
        return $pdf->download("invoice_$date.pdf");
        // return $pdf->stream();
    }

    function send_otp(Request $req)
    {
        // $response = Http::post("http://nimbusit.info/api/pushsms.php?user=105331&key=010jBy10g4Xk7oeexNEj&sender=consol&mobile=8587899030&text=hello&entityid=1701163635722697581&templateid=1707163715272695107");

        try {

            // ------------ process to verify otp 
            if ($req->type == "verify") {
                $otp = $req->session()->get("otp");
                $time = $req->session()->get("otp_time");

                if ($time < 1200) {
                    return ["status" => "expire"];
                }
                if ($otp != $req->otp) {
                    return ["status" => "error"];
                } else {
                    return ["status" => "verified"];
                }
            }

            // ------------ process to generate otp 

            $email = $req->email;

            // request type user/fran/agents/admin 
            $type = $req->type;

            // generate otp
            $otp = random_int(0, 999999);
            $otp = str_pad($otp, 6, 0, STR_PAD_LEFT);

            // store in session to verify later 
            $req->session()->put("otp", $otp);
            $req->session()->put("otp_time", time());

            // check email auth for user type 
            $exist = null;
            switch ($type) {
                case 'user':
                    $exist = User::where("email", $email)->first();
                    break;
                case 'agent':
                    $exist = agents_model::where("email", $email)->first();
                    break;
                case 'franchise':
                    $exist = Frans::where("email", $email)->first();
                    break;
                case 'admin':
                    $exist = admins::where("email", $email)->first();
                    break;
            }

            if ($exist != null) {

                // email otp with email trait
                $check = EmailTrait::Otp_send($otp, $email, "otp", $exist->phone);

                if ($check["status"] == "success") {
                    return ["data" => $exist->id, "status" => "success", "email" => $req->email];
                }
                return ["data" => $exist, "status" => "failed", "email" => $req->email];
            }

            // invalid email error return 
            return ["data" => $exist, "status" => "invalid", "email" => $req->email];
        } catch (\Throwable $th) {
            return ["status" => "error"];
        }
    }
}

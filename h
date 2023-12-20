[1mdiff --git a/app/Http/Controllers/Landing_page.php b/app/Http/Controllers/Landing_page.php[m
[1mindex e04d443..dc7e9cb 100644[m
[1m--- a/app/Http/Controllers/Landing_page.php[m
[1m+++ b/app/Http/Controllers/Landing_page.php[m
[36m@@ -62,8 +62,11 @@[m [mpublic function auth(Request $req){[m
             }[m
         }[m
         else if($req->role=="society"){[m
[31m-            $record=Society::where("society_email", $req->email)->where("society_pass",$req->pass)->get();[m
[31m-            if($record->isNotEmpty()){[m
[32m+[m[32m            $record=Society::where("society_email", $req->email)->where("society_pass",$req->pass)->first();[m
[32m+[m[32m            if($record){[m
[32m+[m[32m                $record = json_decode($record);[m
[32m+[m[32m                // echo $record;[m
[32m+[m[32m                // die;[m
             $req->session()->put("user",$record);[m
             return redirect(route('society.home'));[m
             }[m
[36m@@ -72,8 +75,8 @@[m [mpublic function auth(Request $req){[m
             }[m
         }[m
         else if($req->role=="user"){[m
[31m-            $record=student::where("user_email", $req->email)->where("user_pass",$req->pass)->get();[m
[31m-            if($record->isNotEmpty()){[m
[32m+[m[32m            $record=student::where("user_email", $req->email)->where("user_pass",$req->pass)->first();[m
[32m+[m[32m            if($record){[m
             $req->session()->put("student",$record);[m
             return redirect(route('student.home'));[m
             }[m
[36m@@ -83,6 +86,7 @@[m [mpublic function auth(Request $req){[m
         }[m
         else{[m
             // flash meassage[m
[32m+[m[32m            return redirect(route('homepage'))->with("error","Invalid Username and Password");[m
         }[m
     }[m
 }[m
[1mdiff --git a/app/Http/Controllers/Society.php b/app/Http/Controllers/Society.php[m
[1mindex 0f8c08f..28f02c1 100644[m
[1m--- a/app/Http/Controllers/Society.php[m
[1m+++ b/app/Http/Controllers/Society.php[m
[36m@@ -3,6 +3,9 @@[m
 namespace App\Http\Controllers;[m
 [m
 use Illuminate\Http\Request;[m
[32m+[m[32muse App\Models\SocietyEvent;[m
[32m+[m[32muse Carbon\Carbon;[m
[32m+[m
 [m
 class Society extends Controller[m
 {[m
[36m@@ -13,13 +16,64 @@[m [mpublic function member(){[m
         return view('society.member');[m
     }[m
     public function event(){[m
[32m+[m[32m        $record = session()->get("user");[m
[32m+[m[32m    $societyName = $record->society_name;[m
[32m+[m[32m    // echo $societyName;[m
[32m+[m[32m    // die;[m
[32m+[m[32m    $data = SocietyEvent::where('society_name', $societyName)->get();[m
[32m+[m[41m    [m
[32m+[m[32m    // echo $data;[m
[32m+[m[32m        if($data->isNotEmpty()){[m
[32m+[m[32m    // Store the data in the session[m
[32m+[m[32m    session()->put('society_events', $data);;[m
         return view('society.event');[m
[32m+[m[32m        }else{[m
[32m+[m[41m            [m
[32m+[m[32m        }[m
[32m+[m[32m    }[m
[32m+[m[32m    public function certificate(){[m
[32m+[m[32m        return view('society.certificate');[m
     }[m
     public function event_create(){[m
         return view('society.event_create');[m
     }[m
[31m-    public function certificate(){[m
[31m-        return view('society.certificate');[m
[32m+[m[32m    public function event_create_create(Request $req){[m
[32m+[m[41m       [m
[32m+[m[32m        // $req->validate([[m
[32m+[m[32m            // "society_name" => "required|string|max:50",[m
[32m+[m[32m            // "event_name" => "required|string|max:50",[m
[32m+[m[32m            // "event_mode" => "required|string|max:30",[m
[32m+[m[32m            // "event_venue" => "required|string",[m
[32m+[m[32m            // "whatsapp_link" => "required|string",[m
[32m+[m[32m            // "event_datetime" => "required|date_format:Y-m-d H:i:s", // Assuming the format is 'Y-m-d H:i:s'[m
[32m+[m[32m            // "event_duration" => "required|string|max:30",[m
[32m+[m[32m            // "event_reg_end_datetime" => "required|date_format:Y-m-d H:i:s", // Assuming the format is 'Y-m-d H:i:s'[m
[32m+[m[32m            // "event_contact" => "required|string|max:30",[m
[32m+[m[32m            // "event_email" => "required|email|max:50",[m
[32m+[m[32m            // "event_banner" => "nullable|string", // Assuming 'event_banner' is a string[m
[32m+[m[32m            // "event_description" => "required|string",[m
[32m+[m[32m        // ]);[m
[32m+[m[41m        [m
[32m+[m[41m       [m
[32m+[m[32m        $soc=new SocietyEvent();[m
[32m+[m[32m        // print_r( $req->all());die;[m
[32m+[m[32m        $soc_name=$req->session()->get('user');[m
[32m+[m[32m        $soc_name=$soc_name->society_name;[m
[32m+[m[32m        $soc->society_name=$soc_name;[m
[32m+[m[32m        $soc->event_name=$req['event_name'];[m
[32m+[m[32m        $soc->event_mode=$req['event_mode'];[m
[32m+[m[32m        $soc->event_vanue=$req['event_vanue'];[m
[32m+[m[32m        $soc->watsapp_link=$req['watsapp_link'];[m
[32m+[m[32m        $soc->event_datetime = Carbon::parse($req['event_date'])->format('Y-m-d H:i:s');[m
[32m+[m[32m        $soc->event_duration=$req['event_duration'];[m
[32m+[m[32m        $soc->event_reg_end_datetime = Carbon::parse($req['reg_end_datetime'])->format('Y-m-d H:i:s');[m
[32m+[m[32m        $soc->event_contact=$req['event_contact'];[m
[32m+[m[32m        $soc->event_email=$req['event_email'];[m
[32m+[m[32m        // $soc->event_banner=$req['event_banner'];[m
[32m+[m[32m        $soc->event_discription=$req['event_description'];[m
[32m+[m[32m        $soc->save();[m
[32m+[m[32m        // echo 'data add successfully into database ';[m
[32m+[m[32m        return redirect(route('society.event'));[m
     }[m
     public function attendence(){[m
         return view('society.attendence');[m
[1mdiff --git a/app/Http/Controllers/Student.php b/app/Http/Controllers/Student.php[m
[1mindex 4238f81..1b8465f 100644[m
[1m--- a/app/Http/Controllers/Student.php[m
[1m+++ b/app/Http/Controllers/Student.php[m
[36m@@ -3,15 +3,20 @@[m
 namespace App\Http\Controllers;[m
 [m
 use Illuminate\Http\Request;[m
[32m+[m[32muse App\Models\SocietyEvent;[m
 [m
 [m
 class Student extends Controller[m
 {[m
     public function index(){[m
[31m-        return view('student.home');[m
[32m+[m[32m        $event=SocietyEvent::all();[m
[32m+[m[32m        $event=compact('event');[m
[32m+[m[32m        return view('student.home')->with($event);[m
     }[m
     public function event(){[m
[31m-        return view('student.event');[m
[32m+[m[32m        $event=SocietyEvent::all();[m
[32m+[m[32m        $event=compact('event');[m
[32m+[m[32m        return view('student.event')->with($event);[m
     }[m
     public function certificate(){[m
         return view('student.certificate');[m
[1mdiff --git a/app/Http/Kernel.php b/app/Http/Kernel.php[m
[1mindex 494c050..def5ce7 100644[m
[1m--- a/app/Http/Kernel.php[m
[1m+++ b/app/Http/Kernel.php[m
[36m@@ -64,5 +64,7 @@[m [mclass Kernel extends HttpKernel[m
         'signed' => \App\Http\Middleware\ValidateSignature::class,[m
         'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,[m
         'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,[m
[32m+[m[32m        'authuser' => \App\Http\Middleware\AuthUser::class,[m
[32m+[m[32m        'authstudent' => \App\Http\Middleware\AuthStudent::class,[m
     ];[m
 }[m
[1mdiff --git a/app/Models/SocietyEvent.php b/app/Models/SocietyEvent.php[m
[1mindex 10a5814..b561bd2 100644[m
[1m--- a/app/Models/SocietyEvent.php[m
[1m+++ b/app/Models/SocietyEvent.php[m
[36m@@ -8,4 +8,6 @@[m
 class SocietyEvent extends Model[m
 {[m
     use HasFactory;[m
[32m+[m[32m    protected $table='society_events';[m
[32m+[m[32m    protected $primaryKey='event_id';[m
 }[m
[1mdiff --git a/composer.json b/composer.json[m
[1mindex 5f63a85..fe4643c 100644[m
[1m--- a/composer.json[m
[1m+++ b/composer.json[m
[36m@@ -9,7 +9,8 @@[m
         "guzzlehttp/guzzle": "^7.2",[m
         "laravel/framework": "^10.10",[m
         "laravel/sanctum": "^3.3",[m
[31m-        "laravel/tinker": "^2.8"[m
[32m+[m[32m        "laravel/tinker": "^2.8",[m
[32m+[m[32m        "nesbot/carbon": "^2.72"[m
     },[m
     "require-dev": {[m
         "fakerphp/faker": "^1.9.1",[m
[1mdiff --git a/composer.lock b/composer.lock[m
[1mindex 9aa7206..703be8e 100644[m
[1m--- a/composer.lock[m
[1m+++ b/composer.lock[m
[36m@@ -4,7 +4,7 @@[m
         "Read more about it at https://getcomposer.org/doc/01-basic-usage.md#installing-dependencies",[m
         "This file is @generated automatically"[m
     ],[m
[31m-    "content-hash": "5b9b9491cb9ea2680c36d79a7ab063c6",[m
[32m+[m[32m    "content-hash": "47b884b129f79c782d26ec82964b7f24",[m
     "packages": [[m
         {[m
             "name": "brick/math",[m
[36m@@ -61,6 +61,75 @@[m
             ],[m
             "time": "2023-01-15T23:15:59+00:00"[m
         },[m
[32m+[m[32m        {[m
[32m+[m[32m            "name": "carbonphp/carbon-doctrine-types",[m
[32m+[m[32m            "version": "3.1.0",[m
[32m+[m[32m            "source": {[m
[32m+[m[32m                "type": "git",[m
[32m+[m[32m                "url": "https://github.com/CarbonPHP/carbon-doctrine-types.git",[m
[32m+[m[32m                "reference": "a31d3358a2a5d6ae947df1691d1f321418a5f3d5"[m
[32m+[m[32m            },[m
[32m+[m[32m            "dist": {[m
[32m+[m[32m                "type": "zip",[m
[32m+[m[32m                "url": "https://api.github.com/repos/CarbonPHP/carbon-doctrine-types/zipball/a31d3358a2a5d6ae947df1691d1f321418a5f3d5",[m
[32m+[m[32m                "reference": "a31d3358a2a5d6ae947df1691d1f321418a5f3d5",[m
[32m+[m[32m                "shasum": ""[m
[32m+[m[32m            },[m
[32m+[m[32m            "require": {[m
[32m+[m[32m                "php": "^8.1"[m
[32m+[m[32m            },[m
[32m+[m[32m            "conflict": {[m
[32m+[m[32m                "doctrine/dbal": "<4.0.0 || >=5.0.0"[m
[32m+[m[32m            },[m
[32m+[m[32m            "require-dev": {[m
[32m+[m[32m                "doctrine/dbal": "^4.0.0",[m
[32m+[m[32m                "nesbot/carbon": "^2.71.0 || ^3.0.0",[m
[32m+[m[32m                "phpunit/phpunit": "^10.3"[m
[32m+[m[32m            },[m
[32m+[m[32m            "type": "library",[m
[32m+[m[32m            "autoload": {[m
[32m+[m[32m                "psr-4": {[m
[32m+[m[32m                    "Carbon\\Doctrine\\": "src/Carbon/Doctrine/"[m
[32m+[m[32m                }[m
[32m+[m[32m            },[m
[32m+[m[32m            "notification-url": "https://packagist.org/downloads/",[m
[32m+[m[32m            "license": [[m
[32m+[m[32m                "MIT"[m
[32m+[m[32m            ],[m
[32m+[m[32m            "authors": [[m
[32m+[m[32m                {[m
[32m+[m[32m                    "name": "KyleKatarn",[m
[32m+[m[32m                    "email": "kylekatarnls@gmail.com"[m
[32m+[m[32m                }[m
[32m+[m[32m            ],[m
[32m+[m[32m            "description": "Types to use Carbon in Doctrine",[m
[32m+[m[32m            "keywords": [[m
[32m+[m[32m                "carbon",[m
[32m+[m[32m                "date",[m
[32m+[m[32m                "datetime",[m
[32m+[m[32m                "doctrine",[m
[32m+[m[32m                "time"[m
[32m+[m[32m            ],[m
[32m+[m[32m            "support": {[m
[32m+[m[32m                "issues": "https://github.com/CarbonPHP/carbon-doctrine-types/issues",[m
[32m+[m[32m                "source": "https://github.com/CarbonPHP/carbon-doctrine-types/tree/3.1.0"[m
[32m+[m[32m            },[m
[32m+[m[32m            "funding": [[m
[32m+[m[32m                {[m
[32m+[m[32m                    "url": "https://github.com/kylekatarnls",[m
[32m+[m[32m                    "type": "github"[m
[32m+[m[32m                },[m
[32m+[m[32m                {[m
[32m+[m[32m                    "url": "https://opencollective.com/Carbon",[m
[32m+[m[32m                    "type": "open_collective"[m
[32m+[m[32m                },[m
[32m+[m[32m                {[m
[32m+[m[32m                    "url": "https://tidelift.com/funding/github/packagist/nesbot/carbon",[m
[32m+[m[32m                    "type": "tidelift"[m
[32m+[m[32m                }[m
[32m+[m[32m            ],[m
[32m+[m[32m            "time": "2023-12-10T15:33:53+00:00"[m
[32m+[m[32m        },[m
         {[m
             "name": "dflydev/dot-access-data",[m
             "version": "v3.0.2",[m
[36m@@ -1921,19 +1990,20 @@[m
         },[m
         {[m
             "name": "nesbot/carbon",[m
[31m-            "version": "2.71.0",[m
[32m+[m[32m            "version": "2.72.1",[m
             "source": {[m
                 "type": "git",[m
                 "url": "https://github.com/briannesbitt/Carbon.git",[m
[31m-                "reference": "98276233188583f2ff845a0f992a235472d9466a"[m
[32m+[m[32m                "reference": "2b3b3db0a2d0556a177392ff1a3bf5608fa09f78"[m
             },[m
             "dist": {[m
                 "type": "zip",[m
[31m-                "url": "https://api.github.com/repos/briannesbitt/Carbon/zipball/98276233188583f2ff845a0f992a235472d9466a",[m
[31m-                "reference": "98276233188583f2ff845a0f992a235472d9466a",[m
[32m+[m[32m                "url": "https://api.github.com/repos/briannesbitt/Carbon/zipball/2b3b3db0a2d0556a177392ff1a3bf5608fa09f78",[m
[32m+[m[32m                "reference": "2b3b3db0a2d0556a177392ff1a3bf5608fa09f78",[m
                 "shasum": ""[m
             },[m
             "require": {[m
[32m+[m[32m                "carbonphp/carbon-doctrine-types": "*",[m
                 "ext-json": "*",[m
                 "php": "^7.1.8 || ^8.0",[m
                 "psr/clock": "^1.0",[m
[36m@@ -1945,8 +2015,8 @@[m
                 "psr/clock-implementation": "1.0"[m
             },[m
             "require-dev": {[m
[31m-                "doctrine/dbal": "^2.0 || ^3.1.4",[m
[31m-                "doctrine/orm": "^2.7",[m
[32m+[m[32m                "doctrine/dbal": "^2.0 || ^3.1.4 || ^4.0",[m
[32m+[m[32m                "doctrine/orm": "^2.7 || ^3.0",[m
                 "friendsofphp/php-cs-fixer": "^3.0",[m
                 "kylekatarnls/multi-tester": "^2.0",[m
                 "ondrejmirtes/better-reflection": "*",[m
[36m@@ -2023,7 +2093,7 @@[m
                     "type": "tidelift"[m
                 }[m
             ],[m
[31m-            "time": "2023-09-25T11:31:05+00:00"[m
[32m+[m[32m            "time": "2023-12-08T23:47:49+00:00"[m
         },[m
         {[m
             "name": "nette/schema",[m
[1mdiff --git a/database/migrations/2023_11_24_192728_create_society_events_table.php b/database/migrations/2023_11_24_192728_create_society_events_table.php[m
[1mindex dbd5394..f785698 100644[m
[1m--- a/database/migrations/2023_11_24_192728_create_society_events_table.php[m
[1m+++ b/database/migrations/2023_11_24_192728_create_society_events_table.php[m
[36m@@ -12,7 +12,19 @@[m
     public function up(): void[m
     {[m
         Schema::create('society_events', function (Blueprint $table) {[m
[31m-            $table->id();[m
[32m+[m[32m            $table->id("event_id");[m
[32m+[m[32m            $table->string('society_name', 50)->required();[m
[32m+[m[32m            $table->string('event_name', 50)->required();[m
[32m+[m[32m            $table->string('event_mode', 30)->required();[m
[32m+[m[32m            $table->string('event_vanue')->required();[m
[32m+[m[32m            $table->string('watsapp_link')->required();[m
[32m+[m[32m            $table->dateTime('event_datetime')->required();[m
[32m+[m[32m            $table->string('event_duration')->required();[m
[32m+[m[32m            $table->dateTime('event_reg_end_datetime')->required();[m
[32m+[m[32m            $table->string('event_contact', 30)->required();[m
[32m+[m[32m            $table->string('event_email', 50)->required();[m
[32m+[m[32m            $table->string('event_banner')->nullable()->default("banner not upload");[m
[32m+[m[32m            $table->text('event_discription')->required();[m
             $table->timestamps();[m
         });[m
     }[m
[1mdiff --git a/resources/views/admin/layout/header.blade.php b/resources/views/admin/layout/header.blade.php[m
[1mindex f0ae3c8..3075ddc 100644[m
[1m--- a/resources/views/admin/layout/header.blade.php[m
[1m+++ b/resources/views/admin/layout/header.blade.php[m
[36m@@ -259,8 +259,8 @@[m
                 </li>[m
             </ul>[m
             <!-- Login Button -->[m
[31m-            <form class="form-inline my-2 my-lg-0">[m
[31m-                <button class="btn btn-light bg-white btn-sm my-2 mx-4 my-sm-0" type="submit">Log Out</button>[m
[32m+[m[41m            [m
[32m+[m[32m                <a href="{{route("homepage")}}"><button class="btn btn-light bg-white btn-sm my-2 mx-4 my-sm-0" type="submit">Log Out</button></a>[m
             </form>[m
         </div>[m
     </nav>[m
[1mdiff --git a/resources/views/society/event.blade.php b/resources/views/society/event.blade.php[m
[1mindex 349137e..cc81a86 100644[m
[1m--- a/resources/views/society/event.blade.php[m
[1m+++ b/resources/views/society/event.blade.php[m
[36m@@ -2,6 +2,12 @@[m
 @push('title')[m
 @section('main-section')[m
 {{-- <h1>student-event section is under maintainance</h1> --}}[m
[32m+[m[32m{{-- {{print_r($data);}} --}}[m
[32m+[m[32m@php[m
[32m+[m[32m        // Retrieve the data from the session[m
[32m+[m[32m        $data = session()->get('society_events');[m
[32m+[m[32m    @endphp[m
[32m+[m[32m@foreach($data as $d)[m
  <div class="row m-3 border  px-2 py-3  rounded">[m
         <div class="col-md-3 col-sm-12 col-sm-12 d-flex flex-column justify-content-center align-items-center  text-center p-2 ">[m
            {{-- <div class="container " > </div> --}}[m
[36m@@ -15,17 +21,17 @@[m
         <div class="col-md-6 col-sm-12 ">[m
             <div class="row">[m
                 <div class="col  text-center">[m
[31m-                            <h3 ><b>Cyber Security And Ethical Hacking</b> </h3>[m
[32m+[m[32m                            <h3 ><b>{{$d->event_name}}</b> </h3>[m
                     <hr style="border: 1px solid; color:#007bff">[m
                 </div>[m
             </div>[m
             <div class="row">[m
[31m-                <div class="col-md-6 col-sm-12  text-center">Event Mode - Offline</div>[m
[31m-                <div class="col-md-6 col-sm-12  text-center">Event Vanue - Audotorium</div>[m
[31m-                <div class="col-md-6 col-sm-12  text-center">Event Date - 12/03/2023</div>[m
[31m-                <div class="col-md-6 col-sm-12  text-center">Event Duration - 2hrs</div>[m
[31m-                <div class="col-md-6 col-sm-12  text-center">Registration End Date : 15/05/2023</div>[m
[31m-                <div class="col-md-6 col-sm-12 p-1 text-center">WhatsApp link - <a href="">https://create.wa.link/</a></div>[m
[32m+[m[32m                <div class="col-md-6 col-sm-12  text-center">Event Mode - {{$d->event_mode}}</div>[m
[32m+[m[32m                <div class="col-md-6 col-sm-12  text-center">Event Vanue - {{$d->event_vanue}}</div>[m
[32m+[m[32m                <div class="col-md-6 col-sm-12  text-center">Event Date & time - {{$d->event_datetime}}</div>[m
[32m+[m[32m                <div class="col-md-6 col-sm-12  text-center">Event Duration - {{$d->event_duration}}</div>[m
[32m+[m[32m                <div class="col-md-6 col-sm-12  text-center">Registration End Date : {{$d->event_reg_end_datetime}}</div>[m
[32m+[m[32m                <div class="col-md-6 col-sm-12 p-1 text-center">WhatsApp link - <a href=""></a>{{$d->watsapp_link}}</div>[m
                 {{-- <div class="col-md-4 col-sm-12 p-1 text-center"></div> --}}[m
             </div>[m
         </div>[m
[36m@@ -33,9 +39,7 @@[m
         <div class="col-md-3 col-sm-12 d-flex flex-column justify-content-center align-items-center  text-center">[m
             <div class="btn btn-dark rounded custom-btn w-100 my-3 ">Edit</div> [m
             <div class="btn btn-dark rounded custom-btn w-100">Delete</div>[m
[31m-        </div>[m
[31m-        [m
[31m-        [m
[32m+[m[32m        </div>[m[41m   [m
  </div>[m
[31m-[m
[32m+[m[32m@endforeach[m
 @endsection[m
\ No newline at end of file[m
[1mdiff --git a/resources/views/society/event_create.blade.php b/resources/views/society/event_create.blade.php[m
[1mindex 0ae9a62..0c6f963 100644[m
[1m--- a/resources/views/society/event_create.blade.php[m
[1m+++ b/resources/views/society/event_create.blade.php[m
[36m@@ -6,7 +6,7 @@[m
     {{-- <div class="container bg-dark text-white"> --}}[m
         <h3 class="text-center h1 bg-dark text-white p-1 rounded-top">Create Event</h3>[m
     {{-- </div>     --}}[m
[31m-<form action=" " method="post" class="px-4 py-2">[m
[32m+[m[32m<form action="{{route('society.event_create')}} " method="post" class="px-4 py-2">[m
     @csrf[m
     <div class="row ">[m
         <div class="col-md-6 py-2">[m
[36m@@ -19,10 +19,10 @@[m
         </div>[m
         <div class="col-md-6 py-2">[m
             {{-- <div class="col-12 col-sm-12 py-2"> --}}[m
[31m-                <select class="form-select" name="role" form-select aria-label=".form-select-lg example">[m
[32m+[m[32m                <select class="form-select" name="event_mode" form-select aria-label=".form-select-lg example">[m
                     <option selected>Select Event Mode </option>[m
[31m-                    <option value="admin">Online</option>[m
[31m-                    <option value="Society">Offline</option>[m
[32m+[m[32m                    <option value="online">Online</option>[m
[32m+[m[32m                    <option value="offline">Offline</option>[m
                   </select>[m
             {{-- </div> --}}[m
           {{-- <span class="text-danger">[m
[36m@@ -52,7 +52,7 @@[m
       </div>[m
     <div class="row">[m
         <div class="col-md-6 py-2">[m
[31m-          <input type="text" class="form-control" placeholder="Event Date & Time"  name="event_date" value="{{old('event_date')}}">[m
[32m+[m[32m          <input type="datetime-local" class="form-control" placeholder="Event Date & Time"  name="event_date" value="{{old('event_date')}}">[m
           <span class="text-danger">[m
             @error('event_date')[m
             {{$message}}[m
[36m@@ -60,7 +60,7 @@[m
           </span>[m
         </div>[m
         <div class="col-md-6 py-2">[m
[31m-          <input type="text" class="form-control" placeholder="Event Duration" name="event_duration" value="{{old('event_duration')}}">[m
[32m+[m[32m          <input type="time" class="form-control" placeholder="Event Duration" name="event_duration" value="{{old('event_duration')}}">[m
           <span class="text-danger">[m
             @error('event_duration')[m
             {{$message}}[m
[36m@@ -70,17 +70,17 @@[m
       </div>[m
     <div class="row">[m
         <div class="col-md-6 py-2">[m
[31m-          <input type="text" class="form-control" placeholder="Registration Start Date & Time" name="reg_start_time" value="{{old('reg_start_time')}}">[m
[32m+[m[32m          <input type="datetime-local" class="form-control" placeholder="Registration End Date & Time" name="reg_end_datetime" value="{{old('reg_start_time')}}">[m
           <span class="text-danger">[m
[31m-            @error('reg_start_time')[m
[32m+[m[32m            @error('reg_end_datetime')[m
             {{$message}}[m
             @enderror[m
           </span>[m
         </div>[m
         <div class="col-md-6 py-2">[m
[31m-          <input type="text" class="form-control" placeholder="Registration End Date & Time" name="reg_start_time" value="{{old('reg_start_time')}}">[m
[32m+[m[32m          <input type="text" class="form-control" placeholder="Contact" name="event_contact" value="{{old('event_contact')}}">[m
           <span class="text-danger">[m
[31m-            @error('reg_start_time')[m
[32m+[m[32m            @error('event_contact')[m
             {{$message}}[m
             @enderror[m
           </span>[m
[36m@@ -88,23 +88,13 @@[m
       </div>[m
     <div class="row ">[m
         <div class="col-md-6 py-2">[m
[31m-          <input type="text" class="form-control" placeholder="Email" name="event_email" value="{{old('event_name')}}">[m
[32m+[m[32m          <input type="text" class="form-control" placeholder="Email" name="event_email" value="{{old('event_email')}}">[m
           <span class="text-danger">[m
             @error('event_email')[m
             {{$message}}[m
             @enderror[m
           </span>[m
         </div>[m
[31m-        <div class="col-md-6 py-2">[m
[31m-            <input type="text" class="form-control" placeholder="Contact" name="event_contact" value="{{old('event_name')}}">[m
[31m-            <span class="text-danger">[m
[31m-              @error('event_contact')[m
[31m-              {{$message}}[m
[31m-              @enderror[m
[31m-            </span>[m
[31m-          </div>[m
[31m-      </div>[m
[31m-    <div class="row ">[m
         <div class="col-md-6 py-2">[m
           <input type="file" class="form-control" placeholder="Banner" name="event_banner" value="{{old('event_banner')}}">[m
           <span class="text-danger">[m
[36m@@ -114,6 +104,9 @@[m
           </span>[m
         </div>[m
       </div>[m
[32m+[m[32m    {{-- <div class="row "> --}}[m
[32m+[m[41m        [m
[32m+[m[32m      {{-- </div> --}}[m
       <div class="form-group py-2">[m
         <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Event Discription" name="event_description" value="{{old('event_description')}}"></textarea>[m
         <span class="text-danger">[m
[1mdiff --git a/resources/views/society/home.blade.php b/resources/views/society/home.blade.php[m
[1mindex 705cb1a..efc1a3b 100644[m
[1m--- a/resources/views/society/home.blade.php[m
[1m+++ b/resources/views/society/home.blade.php[m
[36m@@ -8,6 +8,7 @@[m
 </div>[m
 @php[m
 $user=Session::get('user');[m
[32m+[m
 @endphp[m
     <div class="row px-3 py-2">[m
         <div class="col-md-4 col-sm-12 ">[m
[36m@@ -19,27 +20,27 @@[m
                 <tbody>[m
                     <tr>[m
                         <td scope="row">Society Name</td>[m
[31m-                        <td>{{$user[0]['society_name']}}</td>[m
[32m+[m[32m                        <td>{{$user->society_name}}</td>[m
                     </tr>[m
                     <tr>[m
                         <td scope="row">Society Head</td>[m
[31m-                        <td>{{$user[0]['society_head']}}</td>[m
[32m+[m[32m                        <td>{{$user->society_head}}</td>[m
                     </tr>[m
                     <tr>[m
                         <td scope="row">Society Conviner</td>[m
[31m-                        <td>{{$user[0]['society_conviner']}}</td>[m
[32m+[m[32m                        <td>{{$user->society_conviner}}</td>[m
                     </tr>[m
                     <tr>[m
                         <td scope="row">Contact</td>[m
[31m-                        <td>{{$user[0]['society_contact']}}</td>[m
[32m+[m[32m                        <td>{{$user->society_contact}}</td>[m
                     </tr>[m
                     <tr>[m
                         <td scope="row">Email</td>[m
[31m-                        <td>{{$user[0]['society_email']}}</td>[m
[32m+[m[32m                        <td>{{$user->society_email}}</td>[m
                     </tr>[m
                     <tr>[m
                         <td scope="row">Discription</td>[m
[31m-                        <td>{{$user[0]['society_description']}}</td>[m
[32m+[m[32m                        <td>{{$user->society_description}}</td>[m
                     </tr>[m
                 </tbody>[m
             </table>[m
[1mdiff --git a/resources/views/student/event.blade.php b/resources/views/student/event.blade.php[m
[1mindex 78f156d..1a2b442 100644[m
[1m--- a/resources/views/student/event.blade.php[m
[1m+++ b/resources/views/student/event.blade.php[m
[36m@@ -3,6 +3,7 @@[m
 <title>student-event</title>[m
 @section('main-section')[m
 {{-- <h1>student-event section is under maintainance</h1> --}}[m
[32m+[m[32m{{-- @foreach ($event as $ev) --}}[m
  <div class="row m-3 border  px-2 py-3  rounded">[m
         <div class="col-md-3 col-sm-12 col-sm-12 d-flex flex-column justify-content-center align-items-center  text-center p-2">[m
            {{-- <div class="container " > </div> --}}[m
[36m@@ -33,9 +34,7 @@[m
         <div class="col-md-3 col-sm-12 d-flex flex-column justify-content-center align-items-center  text-center">[m
             <div class="btn btn-dark rounded custom-btn w-100 my-3 ">Know More</div> [m
             <div class="btn btn-dark rounded custom-btn w-100">Register</div>[m
[31m-        </div>[m
[31m-        [m
[31m-        [m
[32m+[m[32m        </div>[m[41m [m
  </div>[m
[31m-[m
[32m+[m[32m{{-- @endforeach --}}[m
 @endsection[m
\ No newline at end of file[m
[1mdiff --git a/resources/views/student/home.blade.php b/resources/views/student/home.blade.php[m
[1mindex e3abc30..b9ca6af 100644[m
[1m--- a/resources/views/student/home.blade.php[m
[1m+++ b/resources/views/student/home.blade.php[m
[36m@@ -15,31 +15,31 @@[m
                 <tbody>[m
                     <tr>[m
                         <td scope="row">Name</td>[m
[31m-                        <td>{{$student[0]['user_name']}}</td>[m
[32m+[m[32m                        <td>{{$student->user_name}}</td>[m
                     </tr>[m
                     <tr>[m
                         <td scope="row">Branch</td>[m
[31m-                        <td>{{$student[0]['user_branch']}}</td>[m
[32m+[m[32m                        <td>{{$student->user_branch}}</td>[m
                     </tr>[m
                     <tr>[m
                         <td scope="row">Year</td>[m
[31m-                        <td>{{$student[0]['user_year']}}</td>[m
[32m+[m[32m                        <td>{{$student->user_year}}</td>[m
                     </tr>[m
                     <tr>[m
                         <td scope="row">Urn</td>[m
[31m-                        <td>{{$student[0]['user_urn']}}</td>[m
[32m+[m[32m                        <td>{{$student->user_urn}}</td>[m
                     </tr>[m
                     <tr>[m
                         <td scope="row">Crn</td>[m
[31m-                        <td>{{$student[0]['user_crn']}}</td>[m
[32m+[m[32m                        <td>{{$student->user_crn}}</td>[m
                     </tr>[m
                     <tr>[m
                         <td scope="row">Contact</td>[m
[31m-                        <td>{{$student[0]['user_contact']}}</td>[m
[32m+[m[32m                        <td>{{$student->user_contact}}</td>[m
                     </tr>[m
                     <tr>[m
                         <td scope="row">Email</td>[m
[31m-                        <td>{{$student[0]['user_emailc']}}</td>[m
[32m+[m[32m                        <td>{{$student->user_email}}</td>[m
                     </tr>[m
                 </tbody>[m
             </table>[m
[36m@@ -58,12 +58,17 @@[m
                     </tr>[m
                 </thead>[m
                 <tbody>[m
[32m+[m[41m                    [m
[32m+[m[32m                    @foreach ($event as $ev)[m
[32m+[m[41m                        [m
[32m+[m[41m                   [m
                     <tr>[m
[31m-                        <td>Hacking</td>[m
[32m+[m[32m                        <td>{{$ev->event_name}}</td>[m
                         <td>10/05/23</td>[m
                         <td class="d-flex align-item-center justify-content-center"><button type="reset" class="btn w-80  custom-btn py-0 ">Know More</button></td>[m
                     </tr>[m
[31m-                    <tr>[m
[32m+[m[32m                    @endforeach[m
[32m+[m[32m                    {{-- <tr>[m
                         <td>web3</td>[m
                         <td>02/05/23</td>[m
                         <td class="d-flex align-item-center justify-content-center"><button type="reset" class="btn w-80  custom-btn py-0 ">Know More</button></td>[m
[36m@@ -72,7 +77,7 @@[m
                         <td>Hacking</td>[m
                         <td>20/05/23</td>[m
                         <td class="d-flex align-item-center justify-content-center"><button type="reset" class="btn w-80  custom-btn py-0 ">Know More</button></td>[m
[31m-                    </tr>[m
[32m+[m[32m                    </tr> --}}[m
                 </tbody>[m
             </table>[m
         </div>[m
[1mdiff --git a/routes/web.php b/routes/web.php[m
[1mindex 510dccb..a324b72 100644[m
[1m--- a/routes/web.php[m
[1m+++ b/routes/web.php[m
[36m@@ -44,6 +44,7 @@[m
 // admin routes[m
 // we need protect that route using middlewhere use auth and grupt all routes[m
 [m
[32m+[m
 Route::get('/admin',[Admin::class,"index"])->name('admin.home');[m
 Route::get('/admin/society/',[Admin::class,"society"])->name('admin.society');[m
 Route::get('/admin/registration',[Admin::class,"registration"])->name('admin.registration');[m
[36m@@ -51,17 +52,25 @@[m
 Route::get('/admin/society/{id}',[Admin::class,"delete"])->name('admin.society.delete');[m
 [m
 // society routes[m
[32m+[m[32mRoute::middleware(['authuser'])->group(function () {[m
[32m+[m[32m    // Your routes that require the 'authuser' middleware[m
 Route::get('/society',[Society::class,"index"])->name('society.home');  [m
 Route::get('/society/member',[Society::class,"member"])->name('society.member');  [m
 Route::get('/society/event',[Society::class,"event"])->name('society.event');  [m
 Route::get('/society/event_create',[Society::class,"event_create"])->name('society.event_create');  [m
[32m+[m[32mRoute::post('/society/event_create',[Society::class,"event_create_create"])->name('society.event_create');[m[41m  [m
 Route::get('/society/certificate',[Society::class,"certificate"])->name('society.certificate');  [m
 Route::get('/society/attendence',[Society::class,"attendence"])->name('society.attendence');  [m
 Route::get('/society/logout',[Society::class,"logout"])->name('society.logout');[m
[32m+[m[32m});[m
[32m+[m
 [m
 // user/student routes[m
[31m-Route::get('/student',[Student::class,"index"])->name('student.home');[m
[32m+[m[32mRoute::middleware(['authstudent'])->group(function () {[m
[32m+[m[32m    // Your routes that require the 'authstudent' middleware[m
[32m+[m[32m    Route::get('/student',[Student::class,"index"])->name('student.home');[m
 Route::get('/student/event',[Student::class,"event"])->name('student.event');[m
 Route::get('/student/certificate',[Student::class,"certificate"])->name('student.certification');[m
 Route::get('/student/attendence',[Student::class,"attendence"])->name('student.attendence');[m
 Route::get('/student/logout',[Student::class,"logout"])->name('student.logout');[m
[32m+[m[32m});[m

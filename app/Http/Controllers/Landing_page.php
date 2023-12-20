<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use society modal
use App\Models\Society;
use App\Models\student;

class Landing_page extends Controller
{


    // create new user
    public function create(Request $req){
        $req->validate(
        [
            "user_name"=>"required ",
            "user_branch"=>"required",
            "user_urn"=>"required",
            "user_crn"=>"required ",
            "user_year"=>"required ",
            "user_pass"=>"required ",
            "user_email"=>"required | email ",
            "user_contact"=>"required ",
            // "society_logo"=>"required", //pending
            // "society_banner"=>"required", //pending
        ]
        );

    $user=new student;
    $user->user_name=$req['user_name'];
    $user->user_branch=$req['user_branch'];
    $user->user_urn=$req['user_urn'];
    $user->user_crn=$req['user_crn'];
    $user->user_year=$req['user_year'];
    $user->user_pass=$req['user_pass'];
    $user->user_email=$req['user_email'];
    $user->user_contact=$req['user_contact'];
    $user->user_photo=$req['user_photo'];
    $user->save();
    // echo 'data add successfully into database ';
    return redirect(route('homepage'))->with("success","Registration Successfully!");

    }

    // view landing page
    public function homepage(){
        $data=Society::pluck("society_name");
        $data=compact('data');
        return view('landing')->with($data);
    }

    public function auth(Request $req){
        //    echo "<pre>";
        if ($req->role=="admin" ) { 
            if($req->email=="ayushsingh46026@gmail.com" &&$req->pass=="ayush123"){
                return redirect(route('admin.home'));
            }
            else{
                return redirect(route('homepage'))->with("error","wrong credentials.....");
            }
        }
        else if($req->role=="society"){
            $record=Society::where("society_email", $req->email)->where("society_pass",$req->pass)->first();
            if($record){
                $record = json_decode($record);
                // echo $record;
                // die;
            $req->session()->put("user",$record);
            return redirect(route('society.home'));
            }
            else{
                return redirect(route('homepage'))->with("error","Invalid Username and Password");
            }
        }
        else if($req->role=="user"){
            $record=student::where("user_email", $req->email)->where("user_pass",$req->pass)->first();
            if($record){
            $req->session()->put("student",$record);
            return redirect(route('student.home'));
            }
            else{
                return redirect(route('homepage'))->with("error","Invalid Username and Password");
            }
        }
        else{
            // flash meassage
            return redirect(route('homepage'))->with("error","Invalid Username and Password");
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Landing_page extends Controller
{
    // view landing page
    public function homepage(Request $req){
        // $req->validate(
        //     [
        //         "society_name"=>"required ",
        //         "society_head"=>"required",
        //         "society_conviner"=>"required",
        //         "society_contact"=>"required ",
        //         "society_email"=>"required | email ",
        //         "society_logo"=>"required",
        //         "society_banner"=>"required",
        //         "society_description"=>"required"
        //     ]
        //     );
        return view('landing');
    }
}

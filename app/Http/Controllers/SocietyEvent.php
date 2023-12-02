<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocietyEvent extends Controller
{
    // index
    public function index(){
        echo 'you are reach on society home page';
        // return view('home');
    }
    public function create_event(){
        echo 'you are reach on society event creation page';
        // return view('');
    }
    public function show_event(){
        echo 'you are reach on society event show page';
        // return view('');
    }
    public function show_user(){
        echo 'you are reach on society user show page';
        // return view('');
    }
    public function generate_certificate(){
        echo 'you are reach on society event generate certificate';
        // return view('');
    }
    public function attendence(){
        echo 'you are reach on society event mark attendence';
        // return view('');
    }
}

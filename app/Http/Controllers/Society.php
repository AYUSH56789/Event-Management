<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Society extends Controller
{
    public function index(){
        return view('society.home');
    }
    public function member(){
        return view('society.member');
    }
    public function event(){
        return view('society.event');
    }
    public function certificate(){
        return view('society.certificate');
    }
    public function attendence(){
        return view('society.attendence');
    }
}

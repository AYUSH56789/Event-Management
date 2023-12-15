<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Student extends Controller
{
    public function index(){
        return view('student.home');
    }
    public function event(){
        return view('student.event');
    }
    public function certificate(){
        return view('student.certificate');
    }
    public function attendence(){
        return view('student.attendence');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocietyEvent;


class Student extends Controller
{
    public function index(){
        $event=SocietyEvent::all();
        $event=compact('event');
        return view('student.home')->with($event);
    }
    public function event(){
        $event=SocietyEvent::all();
        $event=compact('event');
        return view('student.event')->with($event);
    }
    public function certificate(){
        return view('student.certificate');
    }
    public function attendence(){
        return view('student.attendence');
    }
    public function logout(Request $req){      
        $req->session()->forget("student");
        return redirect(route('homepage'));
    }
}

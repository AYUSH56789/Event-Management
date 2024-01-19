<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocietyEvent;
use App\Models\User_Event_Reg;


class Student extends Controller
{
    public function index(Request $req){
        // Retrieve the student ID from the session
        $studentId =  $req->session()->get('student.user_id');

        // Check if the student ID is available
        if (!$studentId) {
            // Handle the case where the student ID is not available in the session
            return redirect()->route('login')->with('error', 'Student ID not found in session.');
        }

        // Retrieve the user_event_reg data along with related student and event data
        $data = User_Event_Reg::with(['student', 'event'])
            ->where('user_id', $studentId)
            ->get();

            // print_r($eventData);

        // return view('your.view', compact('eventData'));
        return view('student.home',compact('data'));
        
    }
    public function event_reg(Request $req)
{
    // Get user_id from the session
    $user_id = $req->session()->get('student.user_id');

    // Get event_id from the request
    $event_id = $req->input('event_id');

    // Check if the user is already registered for the event
    $existingRegistration = User_Event_Reg::where('user_id', $user_id)
        ->where('event_id', $event_id)
        ->first();

    if ($existingRegistration) {
        // User is already registered for the event, you can handle this case
        // For example, you can redirect the user back with a message
        return redirect()->back()->with('error', 'You are already registered for this event.');
    }

    // User is not registered for the event, proceed with registration
    $event_reg = new User_Event_Reg();
    $event_reg->user_id = $user_id;
    $event_reg->event_id = $event_id;
    $event_reg->save();

    // Redirect the user with a success message
    return redirect(route('student.event'))->with('msg', 'Registered Successfully!');
}
    public function event(){
        $event=SocietyEvent::all();
        $event=compact('event');
        return view('student.event')->with($event);
    }
    public function certificate(){
        return view('student.certificate');
    }
    public function attendence(Request $req){
        // Retrieve the student ID from the session
        $studentId =  $req->session()->get('student.user_id');

        // Check if the student ID is available
        if (!$studentId) {
            // Handle the case where the student ID is not available in the session
            return redirect()->route('login')->with('error', 'Student ID not found in session.');
        }

        // Retrieve the user_event_reg data along with related student and event data
        $data = User_Event_Reg::with(['student', 'event'])
            ->where('user_id', $studentId)
            ->get();

            // print_r($eventData);

        // return view('your.view', compact('eventData'));
        return view('student.attendence',compact('data'));
    }
    public function logout(Request $req){      
        $req->session()->forget("student");
        return redirect(route('homepage'));
    }
}

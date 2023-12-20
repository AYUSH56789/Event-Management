<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocietyEvent;
use Carbon\Carbon;


class Society extends Controller
{
    public function index(){
        return view('society.home');
    }
    public function member(){
        return view('society.member');
    }
    public function event(){
        $record = session()->get("user");
    $societyName = $record->society_name;
    // echo $societyName;
    // die;
    $data = SocietyEvent::where('society_name', $societyName)->get();
    
    // echo $data;
        if($data->isNotEmpty()){
    // Store the data in the session
    session()->put('society_events', $data);;
        return view('society.event');
        }else{
            
        }
    }
    public function certificate(){
        return view('society.certificate');
    }
    public function event_create(){
        return view('society.event_create');
    }
    public function event_create_create(Request $req){
       
        // $req->validate([
            // "society_name" => "required|string|max:50",
            // "event_name" => "required|string|max:50",
            // "event_mode" => "required|string|max:30",
            // "event_venue" => "required|string",
            // "whatsapp_link" => "required|string",
            // "event_datetime" => "required|date_format:Y-m-d H:i:s", // Assuming the format is 'Y-m-d H:i:s'
            // "event_duration" => "required|string|max:30",
            // "event_reg_end_datetime" => "required|date_format:Y-m-d H:i:s", // Assuming the format is 'Y-m-d H:i:s'
            // "event_contact" => "required|string|max:30",
            // "event_email" => "required|email|max:50",
            // "event_banner" => "nullable|string", // Assuming 'event_banner' is a string
            // "event_description" => "required|string",
        // ]);
        
       
        $soc=new SocietyEvent();
        // print_r( $req->all());die;
        $soc_name=$req->session()->get('user');
        $soc_name=$soc_name->society_name;
        $soc->society_name=$soc_name;
        $soc->event_name=$req['event_name'];
        $soc->event_mode=$req['event_mode'];
        $soc->event_vanue=$req['event_vanue'];
        $soc->watsapp_link=$req['watsapp_link'];
        $soc->event_datetime = Carbon::parse($req['event_date'])->format('Y-m-d H:i:s');
        $soc->event_duration=$req['event_duration'];
        $soc->event_reg_end_datetime = Carbon::parse($req['reg_end_datetime'])->format('Y-m-d H:i:s');
        $soc->event_contact=$req['event_contact'];
        $soc->event_email=$req['event_email'];
        // $soc->event_banner=$req['event_banner'];
        $soc->event_discription=$req['event_description'];
        $soc->save();
        // echo 'data add successfully into database ';
        return redirect(route('society.event'));
    }
    public function attendence(){
        return view('society.attendence');
    }
    public function logout(Request $req){
        $req->session()->forget("user");
        return redirect(route('homepage'));
    }
}

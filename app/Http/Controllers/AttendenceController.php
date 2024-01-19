<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QRCodeServiceForAttendence;
use App\Models\Attendance;
use App\Models\IsAttendenceActivate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AttendenceController extends Controller
{
    // public function index(Request $req){
    //     // echo "reach";
    //     return view('society.attendence');
    //     // return view('attendence');
    // }
    // public function attendence(Request $req){
    // $student=new Attendance();


    // $student->student_name=$req->input("name");
    // $student->student_urn=$req->input("urn");
    // $student->save();
    // echo "your attendence is mark";
    // return view('attendence');
    // }

    public function generate(QRCodeServiceForAttendence $qrCodeService)
    {
        $data=IsAttendenceActivate::all();
        print_r($data);die;
        // Retrieve the selected event ID from the form
    $eventId = request('event_id');
    $societyId = session()->get('society_id');
    $existingActiveAttendance = IsAttendenceActivate::where('society_id', $societyId)
    ->where('is_active', true)
    ->exists();

if ($existingActiveAttendance) {
    return redirect()->back()->with('error', 'Deactivate your current attendance before activating another event.');
}
    // Ensure a valid event ID is selected
    if (!$eventId) {
        return redirect()->back()->with('error', 'Please select an event before generating the QR code.');
    }

    // check if row is created than update the value not create
    IsAttendenceActivate::where('event_id', $eventId)
        ->where('is_active', false)
        ->update(['is_active' => true]);

    // Check if attendance is not already active for the event
    if (!IsAttendenceActivate::where('event_id', $eventId)->where('is_active', true)->exists()) {
        // Create a new IsActiveAttendence record with is_active set to true
        IsAttendenceActivate::create([
            'event_id' => $eventId,
            'is_active' => true,
        ]);
    }

    // Combine the unique code and event ID as an associative array
    $data = encrypt(serialize(['uuid' => Str::uuid(), 'event_id' => $eventId]));

    // Generate QR code as response
    $response = $qrCodeService->generateQRCode($data);

    // Pass the content along with the selected event ID to the view
    return view("society.attendence")->with([
        'content' => $response->getContent(),
        'eventId' => $eventId, // Pass the selected event ID to the view
    ]);
    }


    public function deactivate(Request $request)
    {
        $eventId = request('event_id');
        // Retrieve the unique code from the request
        $uniqueCode = $request->input('unique_code');

        // Implement your logic to deactivate the QR code
        // You may update the database or session based on your application logic
        // For example: DB::table('qr_codes')->where('code', $uniqueCode)->update(['active' => false]);
        IsAttendenceActivate::where('event_id', $eventId)->update(['is_active' => false]);

        // Redirect back to the attendance form
        return redirect()->route('society.attendence')->with('msg', 'Attendence deactivated successfully');
    }
}

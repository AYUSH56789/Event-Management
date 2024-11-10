<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QRCodeServiceForAttendence;
use App\Models\Attendance;
use App\Models\IsAttendenceActivate;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class AttendenceController extends Controller
{
    public function processQRCode(Request $request)
    {
        try {
            // Retrieve the JSON data from the request body
            $jsonData = $request->json()->all();

            // Access the 'content' property from $jsonData
            $content = $jsonData['content'];
            $decryptedData = Crypt::decrypt($content);

            // Deserialize the data
            $deserializedData = unserialize($decryptedData);

            // Extract the event ID
            $eventId = $deserializedData['event_id'];
             
            // For example, you can return a response indicating success along with the content
            return response()->json(['status' => 'success', 'data' => $eventId]);
        } catch (\Exception $e) {
            // If an exception occurs, return a response indicating failure
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function generate(QRCodeServiceForAttendence $qrCodeService)
    {
        $data = IsAttendenceActivate::all();
        // print_r($data);
        // Retrieve the selected event ID from the form
        $eventId = request('event_id');
        // $societyId = session()->get('society_id');
        // $existingActiveAttendance = IsAttendenceActivate::where('society_id', $societyId)
        // ->where('is_active', true)
        // ->exists();

        // if ($existingActiveAttendance) {
        //     return redirect()->back()->with('error', 'Deactivate your current attendance before activating another event.');
        // }
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

<?php

namespace App\Http\Controllers;

// use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Attendence;
use App\Models\SocietyEvent;
use Illuminate\Support\Facades\DB;
use PDF;

class CertificateController extends Controller
{
    public function index(Request $request)
    {
    $form=false;
    $societyId = session()->get("user")->society_id;
    $eventIds = Attendence::whereHas('event', function ($query) use ($societyId) {
        $query->where('society_id', $societyId);
    })->pluck('event_id')->unique();
    
    $data = SocietyEvent::whereIn('event_id', $eventIds)->get()->toArray();
    $certificates = null;
    $selectedEventId = $request->input('event_id');
    // echo $selectedEventId;die;
    if ($selectedEventId) {
        $certificates = DB::table('certificates')
        ->join('students', 'certificates.user_id', '=', 'students.user_id')
        ->join('society_events', 'certificates.event_id', '=', 'society_events.event_id')
        ->join('societies', 'society_events.society_id', '=', 'societies.society_id')
        ->select(
            'certificates.certificate_id',
            'students.user_name',
            'students.user_urn',
            'societies.society_id',
            )
            ->where('societies.society_id', session()->get("user")->society_id)
            ->where('society_events.event_id', $selectedEventId)
            ->get();
            
            if ($certificates->count() > 0) {
                // $data = SocietyEvent::where('event_id', $selectedEventId)->get()->toArray();
                return view('Society.certificate', compact('certificates', 'data','form'));
            } else {
                $certificates = null;
                $form=true;
            return view('Society.certificate',compact('certificates', 'data','form'));
        }
    }
    return view('Society.certificate', compact('certificates', 'data','form'));
}
    // public function showForm()
    // {
    //     return view('certificate.form');
    // }

    public function generateCertificate(Request $request)
    {
        
        $student = DB::table('attendences')
        ->join('students', 'attendences.user_id', '=', 'students.user_id')
        ->join('society_events', 'attendences.event_id', '=', 'society_events.event_id')
        ->join('societies', 'society_events.society_id', '=', 'societies.society_id')
        ->select(
            'students.user_id',
            'students.user_name',
            'students.user_urn',
            'society_events.event_id',
            'society_events.event_name',   
        )
        ->where('societies.society_id', session()->get("user")->society_id)
        ->get();

        // CHECK->No attendance records, display a message and return to the view
        if ($student->count() === 0) {
            return redirect(route('society.certificate'))->with('warning', 'No attendance records available. Cannot generate certificates without attendance.');
         }
        // VALIurn IMAGE
        $request->validate([
            'certificate_image' => 'required|image|mimes:jpg|max:5120',
            'signature_image' => 'required|image|mimes:jpg|max:5120',
            'signature_x1' => 'required|numeric',
            'signature_y1' => 'required|numeric',
            'signature_x2' => 'required|numeric',
            'signature_y2' => 'required|numeric',
            'name_x1' => 'required|numeric',
            'name_y1' => 'required|numeric',
            'name_x2' => 'required|numeric',
            'name_y2' => 'required|numeric',
            'name_font' => 'required|string',
            'name_font_size' => 'required|string',
            'name_red' => 'required|numeric',
            'name_green' => 'required|numeric',
            'name_blue' => 'required|numeric',
            'urn_x1' => 'required|numeric',
            'urn_y1' => 'required|numeric',
            'urn_x2' => 'required|numeric',
            'urn_y2' => 'required|numeric',
            'urn_font' => 'required|string',
            'urn_font_size' => 'required|string',
            'urn_red' => 'required|numeric',
            'urn_green' => 'required|numeric',
            'urn_blue' => 'required|numeric',
            'barcode_x1' => 'required|numeric',
            'barcode_y1' => 'required|numeric',
            'barcode_x2' => 'required|numeric',
            'barcode_y2' => 'required|numeric',
            'barcode_size' => 'required|numeric',
        ]);
         // Access form inputs
         echo "reach";
         $certificateImage = $request->file('certificate_image');
         $signatureImage = $request->file('signature_image');
         
         // Access coordinates for signature
         $signatureX1 = $request->input('signature_x1');
         $signatureY1 = $request->input('signature_y1');
    $signatureX2 = $request->input('signature_x2');
    $signatureY2 = $request->input('signature_y2');

    // Access coordinates for name
    $nameX1 = $request->input('name_x1');
    $nameY1 = $request->input('name_y1');
    $nameX2 = $request->input('name_x2');
    $nameY2 = $request->input('name_y2');
    // echo "name";
    // echo $nameX1,
    // $nameY1,
    // $nameX2.
    // $nameY2;

    // Access coordinates for urn
    $urnX1 = $request->input('urn_x1');
    $urnY1 = $request->input('urn_y1');
    $urnX2 = $request->input('urn_x2');
    $urnY2 = $request->input('urn_y2');
    // echo "urn";
    // echo $urnX1,
    // $urnY1,
    // $urnX2.
    // $urnY2;

    // Access coordinates for barcode
    $barcodeX1 = $request->input('barcode_x1');
    $barcodeY1 = $request->input('barcode_y1');
    $barcodeX2 = $request->input('barcode_x2');
    $barcodeY2 = $request->input('barcode_y2');
    // echo "barcode";
    // echo $barcodeX1,
    // $barcodeY1,
    // $barcodeX2.
    // $barcodeY2;
    // die;
        $certificatesGenerated = false;
        $certificateImage = $request->file('certificate_image');
        $imageName = 'certificate.' . $certificateImage->extension();
        // $certificateImage->move(public_path('certificates'), $imageName);

        // $students = certificate::all();
        // echo "reach";
        // $students=compact('students');
        // print_r($student);die;
        foreach ($student as $student) {
            $existingCertificate = Certificate::where('user_id', $student->user_id)
            ->where('event_id', $student->event_id)
            ->first();
            if ($existingCertificate) {
                // If a certificate already exists, skip the generation process for this student and event
                continue;
            }

            $font = public_path("fonts/ARIAL.TTF");
            $image = imagecreatefromjpeg(public_path("certificates/{$imageName}"));
            $nameColor = imagecolorallocate($image, $request->input('name_red') , $request->input('name_green'), $request->input('name_blue'));
            $urnColor = imagecolorallocate($image, $request->input('urn_red') , $request->input('urn_green'), $request->input('urn_blue'));
            $name = $student->user_name;
            $urn = $student->user_urn; // Adjust this according to your actual attribute

            // Upurnd coordinates based on image map for urn
            $x1_name = $nameX1;
            $y1_name = $nameY1;
            $x2_name = $nameX2;
            $y2_name = $nameY2;
            $name_fontSize = $request->input('name_font_size');

            // Calculate the width and height of the urn text
            $nameWidth = $x2_name - $x1_name;
            $nameHeight = $y2_name - $y1_name;

            // Calculate the starting position for the urn to center it
            $startXName = $x1_name + ($nameWidth - imagettfbbox($name_fontSize, 0, $font, $name)[4]) / 2;
            $startYName = $y2_name;

            // Write the urn
            imagettftext($image, $name_fontSize, 0, $startXName, $startYName, $nameColor, $font, $name);

            // Upurnd coordinates based on image map for name
            $x1_urn = $urnX1;
            $y1_urn = $urnY1;
            $x2_urn = $urnX2;
            $y2_urn = $urnY2;
            $urn_fontSize = $request->input('urn_font_size');

            // Calculate the width and height of the name text
            $urnWidth = $x2_urn - $x1_urn;
            $urnHeight = $y2_urn - $y1_urn;

            // Calculate the starting position for the name to center it
            $startXurn = $x1_urn + ($urnWidth - imagettfbbox($urn_fontSize, 0, $font, $urn)[4]) / 2;
            $startYurn = $y2_urn;

            // Write the name
            imagettftext($image, $urn_fontSize, 0, $startXurn, $startYurn, $urnColor, $font, $urn);

            // Generate a unique certificate number
        $certificateNumber = $this->generateUniqueCertificateNumber();

            // Generate QR Code
    $qrCodeService = app('App\Services\QRCodeServiceForCertificate');
    $qrCodeData = "{$student->user_name} {$certificateNumber}";
    $qrCodeImageString = $qrCodeService->generateQRCode($qrCodeData,$request->input('barcode_size'));

    // Proceed only if the QR code image string is not empty
    if (empty($qrCodeImageString)) {
        continue;
    }

    $qrCodeImage = imagecreatefromstring($qrCodeImageString);

    // Coordinates for placing the QR code
    $x_position = $barcodeX1;
    $y_position = $barcodeY1;

    // Merge the QR code onto the certificate image
    imagecopy($image, $qrCodeImage, $x_position, $y_position, 0, 0, imagesx($qrCodeImage), imagesy($qrCodeImage));


    
            imagejpeg($image, public_path("certificates/{$name}.jpg"));
            
            // $pdf = new FpdfTpl("L", "in", [11.7, 8.27]);
            // $pdf->AddPage();
            // $pdf->Image(public_path("certificates/{$name}.jpg"), 0, 0, 11.7, 8.27);
            $certificatePath = "certificates/{$name}.jpg"; // Path to save the PDF
            // $pdf->Output(public_path($pdfPath), "F");
            imagedestroy($image);

            // Store the generated certificate in the database
            $certificate = new Certificate();
            $certificate->user_id = $student->user_id;
            $certificate->event_id = $student->event_id;
            $certificate->certificate_number = $certificateNumber;//write code here;
            $certificate->certificate_file = $certificatePath;
            $certificate->save();

            $certificatesGenerated = true;
            // echo "Certificate is generated and stored for {$name}<br>";
        }

        if ($certificatesGenerated) {
            return redirect(route('society.certificate'))->with('success', 'Certificates generated successfully.');
        } else {
            return redirect(route('society.certificate'))->with('info', 'Certificates for all students in this event have already been generated.');
        }
    }
    // Function to generate a unique certificate number
private function generateUniqueCertificateNumber()
{
    // Use a combination of user_urn, timestamp, and a random component
    $timestamp = now()->format('YmdHis');
    $randomComponent = mt_rand(1000, 9999);

    return "{$timestamp}{$randomComponent}";
}


    public function downloadCertificate($id)
    {
        $certificate = Certificate::findOrFail($id);

        // Provide the certificate file for download
        return response()->download(public_path($certificate->certificate_file));
    }
}
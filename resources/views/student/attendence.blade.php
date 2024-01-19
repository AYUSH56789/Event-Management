@extends('student.layout.main')
@push('title')
    <title>student-attendance</title>
@endpush

@section('main-section')
    <div class="container text-center">
        <p class="text-danger m-2">You Are Either not Register for any Event Or Attendance is not activated by Event Management!</p>

        <div class="conatiner m-3 p-3 border rounded">

            <form class="p-0 m-0" action="{{ route('society.generate-qrcode') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row text-center ">
                    <div class="col px-4 py-2">
                        <select class="form-select" name="event_id" aria-label=".form-select-lg example">
                            <option value="">Select Event</option>
                            @foreach($data as $registration)
                                <option value="{{ $registration->event->event_id }}">
                                    {{ $registration->event->event_name }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('society')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>
        </div>
        </form>
        </div>
        <div class="row text-center ">
            <div class="col px-1 py-2">
                <!-- QR Code Scanner Section -->
                <button id="scanButton" type="submit" class="  custom-btn  mx-3 p-1 w-50">Mark Attendence</button>
        <div id="qrScanner" class="m-4">
            <video id="video-preview"></video>
        </div>
        {{-- <button  class="btn btn-primary m-2">Scan QR Code</button> --}}
                {{-- <button type="submit" class="  custom-btn  mx-3 p-1 w-50">Activate Attendence</button> --}}
            </div>
        </div>
        <!-- QR Code Scanner Section -->
        {{-- <div id="qrScanner" class="m-4"> --}}
            {{-- <video id="video-preview"></video> --}}
        {{-- </div> --}}
        {{-- <button  class="btn btn-primary m-2">Scan QR Code</button> --}}
        {{-- <button id="scanButton" type="submit" class="  custom-btn  mx-3 p-1 w-50">Mark Attendence</button> --}}

    </div>

    <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Elements
            const videoPreview = document.getElementById('video-preview');
            const qrScanner = new Instascan.Scanner({ video: videoPreview });
            const scanButton = document.getElementById('scanButton');

            // Event listener for the scan button
            scanButton.addEventListener('click', function () {
                // Start scanning
                Instascan.Camera.getCameras().then(function (cameras) {
                    if (cameras.length > 0) {
                        qrScanner.start(cameras[0]);
                    } else {
                        console.error('No cameras found.');
                    }
                }).catch(function (error) {
                    console.error(error);
                });
            });

            // Event listener for QR code detection
            qrScanner.addListener('scan', function (content) {
                // Add the student's ID to an array or perform any necessary action
                console.log('Scanned QR Code:', content);

                // Stop scanning after successful detection
                qrScanner.stop();
            });
        });
    </script>
@endsection
